var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() { alert("submitted!"); }
    });

    $().ready(function() {
        // validate the member form when it is submitted
        $("#MemberForm").validate();

        // validate member form on keyup and submit
        $("#MemberForm").validate({
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