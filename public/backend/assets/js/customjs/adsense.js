var Adsense = function(){
    var list = function(){
        alert("List");
    }

    var add_adsense = function(){

        var form = $('#add-adsense');
        var rules = {

            name: {required: true},
            mo_no: {required: true},
            pan_no: {required: true},
            doj: {required: true},
            adseanse_script: {required: true},
        };

        var message = {

            name : {
                required : "Please enter name"
            },
            mo_no : {
                required : "Please enter mobile number"
            },
            pan_no : {
                required : "Please enter PAN card number"
            },
            doj : {
                required : "Please enter date of joining"
            },
            adseanse_script : {
                required : "Please enter adseanse script"
            },
        }
        handleFormValidateWithMsg(form, rules,message, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }

    var edit_adsense = function(){
        alert("Hello");
    }

    return {
        init:function(){
            list();
        },
        add:function(){
            add_adsense();
        },
        edit:function(){
            edit_adsense();
        }
    }
}();
