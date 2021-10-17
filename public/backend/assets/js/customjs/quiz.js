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
