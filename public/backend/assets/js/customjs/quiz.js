var Quiz = function(){
    var list = function(){
        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'pageLength': 5,
            'tableID': '#quiz-master',
            'ajaxURL': baseurl + "quiz/admin-quiz-ajaxcall",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSortingApply': [0],
            'noSearchApply': [0],
            'defaultSortColumn': [0],
            'defaultSortOrder': 'DESC',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);
    }

    var add_quiz = function(){
        $('.select2').select2();
        $('#time').timepicker()

        var form = $('#add-quiz');
        var rules = {
            image: {required: true},
            quiz_type: {required: true},
            quiz_category: {required: true},
            name: {required: true},
            fee: {required: true},
            prize: {required: true},
            time: {required: true},
            status: {required: true},
        };

        var message = {
            image :{
                required : "Please select quiz image"
            },
            quiz_type :{
                required : "Please select quiz type"
            },
            quiz_category :{
                required : "Please select quiz category"
            },
            name :{
                required : "Please select quiz name"
            },
            fee :{
                required : "Please select quiz entry fee"
            },
            prize :{
                required : "Please select quiz winning prize"
            },
            time :{
                required : "Please select quiz winner announcement time"
            },
            status : {
                required : "Please select status"
            }
        }
        handleFormValidateWithMsg(form, rules,message, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    var edit_quiz = function(){
        $('.select2').select2();
    }
    return{
        init:function(){
            list();
        },
        add:function(){
            add_quiz();
        },
        edit:function(){
            edit_quiz();
        }
    }
}();
