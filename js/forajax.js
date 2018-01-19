var formValidate = false; //Flag for check start animation after click register button

$('#ajaxbtn').on('mousedown', function(e) {
    
    e.preventDefault();
    console.log("Mouse Down = " + ajax_data);
    $.ajax({
        type: "POST",
        url: "https://speedyhunt.com/dashboard/view/front/controller1.php",
        data: $("#signup-modal-form").serialize(),
        success: function(data) {
            //Please Set validate function
            console.log("ajax data = " + data);
            formValidate = true;
            $("#ajaxbtn").trigger("click"); //start animation
        },
        error: function(xhr, error) {
            console.log("ajax error = " + error);
            // formValidate = true;
            // console.log(data);
            // $("#ajaxbtn").trigger("click"); // start animation

        },
    });
})