var Dashboard = function(){
    var dash = function(){
        var dataArr = {};
        var columnWidth = { "width": "5%", "targets": 0 };
        var arrList = {
            'pageLength': 5,
            'tableID': '#adsense-users-list',
            'ajaxURL': baseurl + "admin/my-dashboard-ajaxcall",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSortingApply': [0, 1, 4],
            'noSearchApply': [0, 1, 4],
            'defaultSortColumn': [0],
            'defaultSortOrder': 'DESC',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);
    }
    var edit_profile = function (){

        var form = $('#edit-profile');
        var rules = {
            editId: {required: true},
            first_name: {required: true},
            last_name: {required: true},
            email: {required: true,email:true},
        };

        var message = {
            email :{
                required : "Please enter your  address",
                email: "Please enter valid email address"
            },
            editId : {
                required : "Please enter password"
            },
            first_name : {
                required : "Please enter first name"
            },
            last_name : {
                required : "Please enter last name"
            },
        }
        handleFormValidateWithMsg(form, rules,message, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    var ch_password = function (){
        var form = $('#change-password');
        var rules = {
            editId: {required: true},
            old_password: {required: true},
            new_password: {required: true},
            confirm_password: {required: true,equalTo: "#new_password"},

        };

        var message = {
            confirm_password :{
                required : "Please enter confirm passwords",
                email: "Confirm password must be equal to password"
            },
            editId : {
                required : "Please enter edit Id"
            },
            old_password : {
                required : "Please enter old password"
            },
            new_password : {
                required : "Please enter new password"
            },
        }
        handleFormValidateWithMsg(form, rules,message, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }

    return {
        init:function(){
            dash();
        },
        edit:function(){
            edit_profile();
        },
        changepassword : function(){
            ch_password();
        },
    }
}();
