var Register = function(){

    var register_check = function(){
        var form = $('#register-form');
        var rules = {
            email: {required: true,email:true},
            password: {required: true},
            confirm_password: {required: true, equalTo: "#password"},
        };

        var message = {
            email :{
                required : "Please enter your email.",
                email: "Please enter valid email."
            },
            password : {
                required : "Please enter password."
            },
            confirm_password : {
                required : "Please enter password.",
                equalTo: "Password and confirmn password not match."
            }
        }
        handleFormValidateWithMsg(form, rules,message, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    return {
        init:function(){
            register_check();
        }
    }
}();
