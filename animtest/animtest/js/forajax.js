


$('#ajaxbtn').on('mousedown', function(e) {
    e.preventDefault();
    var post_data = $("#signup-modal-form").serialize();
    console.log("Mouse Down");
      if(formValidate === false){
          fnames = $("#lead_first_name").val();
          lnames = $("#lead_last_name").val();
          emaila = $('#lead_email').val();
          passw  = $('#lead_password').val();
        $.ajax({
            type :'POST',
            data : post_data,
            url: "https://speedyhunt.com/dashboard/view/front/controller.php", 
            success: function(result){
                var jsonData = $.parseJSON(result);//parse JSON
                console.log(jsonData['type']);
                if (jsonData['type'] === 'success'){
                    formValidate = true;
                    $("#lead_first_name").val(fnames);
                    $('#lead_last_name').val(lnames);
                    $('#lead_email').val(emaila);
                    $('#lead_password').val(passw);
                    $("#ajaxbtn").trigger("click");
                }
            },
            error: function(error){ }
        });
      }
})