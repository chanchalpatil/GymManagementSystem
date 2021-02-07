var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() { alert("submitted!"); }
    });

    $().ready(function() {
        // validate the trainer form when it is submitted
        $("#TrainerForm").validate();

        // validate trainer form on keyup and submit
        $("#TrainerForm").validate({
            rules: {
                firstname: "required",
                lastname: "required",
               
                email: {
                    required: true,
                    email: true
                },
                
                
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                email: "Please enter a valid email address",
                
            }
        });

       

        
    });


}();