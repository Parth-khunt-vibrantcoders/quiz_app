var Question = function(){

    var list = function (){
        // question-answer
        var dataArr = {};
        var columnWidth = [{ "width": "5%", "targets": 0 }, { "width": "5%", "targets": 2 }];
        var arrList = {
            'pageLength': 5,
            'tableID': '#question-answer',
            'ajaxURL': baseurl + "landing-page/landing-page-question-ajaxcall",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSortingApply': [0,2],
            'noSearchApply': [0,2],
            'defaultSortColumn': [0],
            'defaultSortOrder': 'DESC',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);
    }
    return {
        init:function(){
            list();
        }
    }
}();
