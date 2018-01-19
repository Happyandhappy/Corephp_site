(function(root, $, _, amplify, H) {
    "use strict";
    var fr = {},
        store = amplify.store,
        storage;
    var dataSourceDeps = {};
    fr.dataSourceDeps = dataSourceDeps;
    var templates = {};
    fr.templates = templates;
    var interceptJQueryOnEvents = function() {
        var origOn = $.fn.on;
        $.fn.on = function() {
            var $selectedElems = $(this);
            if (arguments.length <= 2 && this.selector) {
                if ($selectedElems.data('fr-click') || $selectedElems.data('fr-store')) {
                    return origOn.call($("body"), arguments[0], this.selector, arguments[1]);
                }
            }
            if (arguments.length > 2) {
                var hasFRClick = $selectedElems.find("[data-fr-click]").length > 0,
                    hasFRSubmit = $selectedElems.find("[data-fr-store]").length > 0;
                if (hasFRClick) {
                    return origOn.apply($("body"), arguments);
                }
            }
            return origOn.apply(this, arguments);
        };
    };
    Handlebars.registerHelper("escape", function(value) {
        return this[value];
    });
    var cleanCurlyBraceVals = function(data) {
        if (data === null) return null;
        var rgx = /\{*?\}/,
            cleanData = {};
        _.forEach(data, function(val, key) {
            if (_.isString(val) && rgx.test(val)) {
                cleanData[key] = "";
            } else {
                cleanData[key] = val;
            }
        });
        return cleanData;
    };
    var patchAmplifyEventSupport = function() {
        var origStore = store;
        $.event.trigger({ type: 'storageChange' });
        amplify.store = function() {
            var result, key = arguments[0],
                val = arguments[1],
                argsLen = arguments.length,
                storageData = { dataSource: key, data: val };
            if (argsLen === 1) {
                result = origStore(key);
            } else if (argsLen === 2) {
                result = origStore(key, cleanCurlyBraceVals(val));
                $(document).trigger('storageChange', storageData);
            } else {
                result = origStore.apply(this, arguments);
            }
            return result;
        };
        store = amplify.store;
    };
    var escapeHandlebarsSquareBrackets = function(html) {
        var escaped = html.replace(/{{(\w.+?)\[(\w.+?)\]}}/gi, "{{escape '$1[$2]'}}");
        return escaped;
    };
    var template = function(markup, data, elemId) {
        markup = escapeHandlebarsSquareBrackets(markup);
        if (!templates[elemId]) { templates[elemId] = H.compile(markup); }
        return templates[elemId](data);
    };
    fr._parseQueryArgs = function(query) {
        if (!query) { return null; }
        var args = _.chain(query.split('&')).map(function(params) {
            var p = params.split('=');
            var key = p[0];
            var val = window.decodeURIComponent(p[1] || "");
            val = val.replace(/\/+$/g, "");
            val = val.replace(/\+/g, " ");
            return [key, val];
        }).object().value();
        return args;
    };
    fr._checkQueryStringDeps = function(queryArgs) {
        var $meta = $("meta[data-fr-query]"),
            dataSource = $meta.data('fr-query');
        if ($meta.length === 0) return false;
        if (!queryArgs) { store(dataSource, ""); }
        return dataSource;
    };
    fr._choosePossibleSelectOption = function($boundElem) {
        var $selects = $boundElem.find("select");
        $.each($selects, function(idx, select) {
            var selectVal = select.getAttribute('value');
            if (selectVal) {
                $(select).val(selectVal);
            }
        });
    };
    fr._storeQueryArgs = function(queryString) {
        var args = fr._parseQueryArgs(queryString),
            dataSource = fr._checkQueryStringDeps(args);
        if (args && args.frstore) {
            store(args.frstore, args);
        } else if (args && dataSource) {
            store(dataSource, args);
        } else {
            store("query", args);
        }
        storage = store();
    };
    fr._collectDataSourceElems = function() {
        return $("[data-fr-store]");
    };
    fr._collectBoundedElems = function() {
        return $("[data-fr-bind]");
    };
    fr._mergeDataSources = function(dataSources, storage) {
        var data = {};
        _.forEach(dataSources, function(ds) {
            _.forEach(storage[ds], function(val, prop) {
                if (data[prop]) {
                    data[ds + '_' + prop] = val;
                } else {
                    data[prop] = val;
                }
            });
        });
        data._framerida_original_datasources = dataSources;
        return data;
    };
    fr._insertData = function($boundElems, dataSource, storage) {
        var data = {},
            dataSources = dataSource.split(' '),
            multipleDataSources = dataSources.length > 1;
        if (multipleDataSources) {
            data = fr._mergeDataSources(dataSources, storage);
        } else {
            data = storage[dataSource] || {};
        }
        $boundElems.each(function(idx, boundElem) {
            var $boundElem = $(boundElem),
                $boundElemClone = $boundElem.clone(),
                $eachStubElems = $boundElemClone.find("[data-fr-each]"),
                uid = _.uniqueId(),
                collectionName, repeatedHtml, html;
            if ($eachStubElems.length > 0) {
                $eachStubElems.each(function(idx, eachStubElem) {
                    var $eachStubElem = $(eachStubElem),
                        $eachStubParent = $eachStubElem.parent(),
                        stubId = _.uniqueId(),
                        mappingFunction = $eachStubElem.data("fr-map"),
                        sortingFunction = $eachStubElem.data("fr-sort"),
                        repeatedTpl, ds, dataPath;
                    collectionName = $eachStubElem.data('fr-each');
                    $eachStubElem.removeAttr('data-fr-each');
                    if (mappingFunction) {
                        data[collectionName] = _.map(data[collectionName], function(item, idx) {
                            var instance = new root[mappingFunction](item);
                            instance._framerida_index = idx;
                            return instance;
                        });
                        $eachStubParent.attr('data-fr-mapped', mappingFunction);
                    }
                    if (sortingFunction) {
                        var sortFn = root[sortingFunction];
                        if (sortFn) { data[collectionName] = sortFn(data[collectionName]); }
                        $eachStubParent.attr('data-fr-sorted', sortingFunction);
                    }
                    if (multipleDataSources) {
                        for (ds in dataSources) {
                            var dataSourceName = dataSources[ds] || "",
                                storageData = storage[dataSourceName] || {};
                            if (storageData[collectionName]) { dataSource = dataSources[ds]; break; }
                        }
                    }
                    $eachStubParent.attr('data-fr-template', stubId);
                    $eachStubParent.attr('data-fr-bound', dataSource);
                    $eachStubParent.attr('data-fr-iterated', collectionName);
                    dataPath = dataSource + '.' + collectionName + '[{{_framerida_index}}]';
                    $eachStubElem.attr('data-fr-bound', dataPath);
                    repeatedHtml = "{{#each " + collectionName + "}}";
                    repeatedHtml += $eachStubElem[0].outerHTML;
                    repeatedHtml += "{{/each}}";
                    repeatedHtml = escapeHandlebarsSquareBrackets(repeatedHtml);
                    repeatedTpl = H.compile(repeatedHtml);
                    templates[stubId] = repeatedTpl;
                    repeatedHtml = repeatedTpl(data);
                    $eachStubElem.replaceWith(repeatedHtml);
                });
            }
            if (data._framerida_mapped) {
                var originalDataSources = data._framerida_original_datasources,
                    originalFrameridaClick = data._framerida_click;
                if (originalFrameridaClick) {
                    originalFrameridaClick = originalFrameridaClick.split(' ')[1];
                }
                data = new root[data._framerida_mapped](data);
                if (originalFrameridaClick && originalDataSources) {
                    _.forEach(originalDataSources, function(originalDs) {
                        if (originalDs === originalFrameridaClick) return;
                        var dsData = store()[originalDs];
                        _.forEach(dsData, function(val, prop) {
                            var propName = prop;
                            if (data[prop]) { propName = originalDs + "_" + prop; }
                            data[propName] = val;
                        });
                    });
                }
            }
            if (!$boundElem.attr('data-fr-id')) {
                $boundElem.attr('data-fr-id', uid);
                html = template($boundElemClone.html(), data, uid);
            } else { html = templates[$boundElem.attr('data-fr-id')](data); }
            $boundElem.html(html);
            fr._choosePossibleSelectOption($boundElem);
        });
    };
    fr._transformFormData = function(data) {
        var result = {};
        _.forEach(data, function(obj) { result[obj.name] = obj.value; });
        return result;
    };
    fr._storeDataSourceDeps = function($boundElems) {
        $boundElems.each(function(idx, boundElem) {
            var $boundElem = $(boundElem),
                dataSource = $boundElem.data('fr-bind');
            if (!dataSourceDeps[dataSource]) {
                dataSourceDeps[dataSource] = [];
            }
            dataSourceDeps[dataSource].push($boundElem);
        });
    };
    fr._bindDataSourceHandlers = function() {
        $('body').on('submit', "[data-fr-store]", function(evt) {
            if ($(this).find('.error, .invalid').length) { return; }
            var formVals = $(this).serializeArray(),
                storageKey = $(this).data('fr-store');
            formVals = fr._transformFormData(formVals);
            store(storageKey, formVals);
        });
    };
    fr._renderEachStubs = function(dataSource) {
        _.forEach(dataSourceDeps[dataSource], function(boundElem) {
            var $iteratedElems = $(boundElem).find('[data-fr-iterated]'),
                mappingFunction = $iteratedElems.data('fr-mapped'),
                sortingFunction = $iteratedElems.data('fr-sorted'),
                collectionName = $iteratedElems.data('fr-iterated');
            if ($iteratedElems.length > 0) {
                var boundTo = $iteratedElems.data('fr-bound');
                $iteratedElems.each(function(idx, iteratedElem) {
                    var $iteratedElem = $(iteratedElem),
                        elemId = $iteratedElem.data('fr-template'),
                        data = fr._mergeDataSources(boundTo.split(' '), store()),
                        newHtml;
                    if (mappingFunction) {
                        data[collectionName] = _.map(data[collectionName], function(item, idx) {
                            var inst = new root[mappingFunction](item);
                            inst._framerida_index = idx;
                            return inst;
                        });
                    }
                    if (sortingFunction) {
                        var sortFn = root[sortingFunction];
                        if (sortFn) {
                            data[collectionName] = sortFn(data[collectionName]);
                        }
                    }
                    newHtml = templates[elemId](data);
                    $iteratedElem.html(newHtml);
                });
            }
        });
    };
    fr.dataFromDataPath = function(dataPathString) {
        var dataPathRgx = /(\w.*)\.(\w+)\[(\d+)\]/g,
            rgxResults = dataPathRgx.exec(dataPathString),
            storage = store(),
            boundData;
        if (!rgxResults || rgxResults.length < 4) {
            throw new Error("Invalid dataPath structure: " + dataPathString);
        }
        var boundDataSource = rgxResults[1],
            collectionName = rgxResults[2],
            collectionIdx = rgxResults[3];
        var boundDataSources = boundDataSource.split(' ');
        if (boundDataSources.length > 1) {
            for (var i = 0; i < boundDataSources.length; i++) {
                var boundDs = boundDataSources[i];
                if (storage[boundDs] && storage[boundDs][collectionName]) {
                    boundDataSource = boundDs;
                    break;
                }
            }
            if (boundDataSource.split(' ').length > 1) {
                return {};
            }
        }
        boundData = storage[boundDataSource][collectionName][collectionIdx];
        return boundData;
    };
    fr._attachClickHandlers = function() {
        $("body").on("click", "[data-fr-click]", function(evt) {
            var dataPath = $(this).data("fr-bound"),
                actionStr = $(this).data("fr-click"),
                mapped = $(this).data("fr-map"),
                actionSplit, action, targetStorage, boundData;
            if (actionStr) {
                actionSplit = actionStr.split(' ');
                action = actionSplit[0];
                targetStorage = actionSplit[1];
                if (!action || !targetStorage) { throw new Error("Invalid action: " + actionStr); }
            }
            if (action === 'store') {
                boundData = fr.dataFromDataPath(dataPath);
                if (mapped) {
                    boundData._framerida_mapped = mapped;
                    boundData._framerida_boundTo = dataPath;
                    boundData._framerida_click = actionStr;
                }
                store(targetStorage, boundData);
            }
        });
    };
    var initialize = function() {
        patchAmplifyEventSupport();
        storage = store();
        var queryString = window.location.search.substring(1);
        fr._storeQueryArgs(queryString);
        var $dataSourceElems = fr._collectDataSourceElems(),
            $boundElems = fr._collectBoundedElems();
        fr._bindDataSourceHandlers();
        fr._storeDataSourceDeps($boundElems);
        _.forEach(dataSourceDeps, function(boundElems, dataSource) {
            fr._insertData($(boundElems), dataSource, storage);
        });
        $(document).on('storageChange', function(evt, data) {
            var dataSource = data.dataSource,
                boundElemsColl = {};
            _.forEach(dataSourceDeps, function(val, ds) {
                if (_.contains(ds.split(' '), dataSource)) {
                    boundElemsColl[ds] = dataSourceDeps[ds];
                }
            });
            _.forEach(boundElemsColl, function(boundElems, ds) {
                fr._insertData($(boundElems), ds, store());
                fr._renderEachStubs(ds);
            });
        });
        fr._attachClickHandlers();
        interceptJQueryOnEvents();
        $("body").removeClass("hide");
    };
    initialize();
    root.framerida = fr;
}(window, jQuery, _, amplify, Handlebars));