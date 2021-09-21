var Dashboard = function(){

    var edit_profile = function (){
        var form = $('#edit-profile');
        var rules = {
            editId: {required: true},
            first_name: {required: true},
            last_name: {required: true},
            email: {required: true,email:true},
        };

        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }

    return {
        edit:function(){
            edit_profile();
        }
    }
}();
