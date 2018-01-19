var formValidate = false; //Flag for check start animation after click register button



$('#ajaxbtn').on('mousedown', function(e) {

    console.log("Mouse Down");

    //e.preventDefault();



    $.ajax({

        type: "POST",

        url: "http://speedyhunt.com/dashboard/view/front/controller.php",

        data: $("#signup-modal-form").serialize(),

        success: function(data) {

            //Please Set validate function



            formValidate = true;

            $("#ajaxbtn").trigger("click"); //start animation

        },

        error: function(xhr, error) {

            console.log(error);

            // formValidate = true;

            // console.log(data);

            // $("#ajaxbtn").trigger("click"); // start animation



        },

    });

})