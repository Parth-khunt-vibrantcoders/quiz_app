var Question = function(){

    var que_ans = function (){
        var form = $('#landing-page-question');
        var rules = {
            // email: {required: true,email:true},
            // password: {required: true},
        };

        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    return {
        init:function(){
            que_ans();
        }
    }
}();
