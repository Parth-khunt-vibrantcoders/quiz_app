var Landingpage = function(){
    var question = function(){
        $("body").on('change', '.answer-btn', function(){
            var value = $(this).val();
            var question_no = $(this).attr('data-question');
            var correct_ans = $("#question"+question_no).val();
            if(correct_ans == value){
                $(this).closest('.answerui').addClass('right-ans');
            }else{
                $(this).closest('.answerui').addClass('wrong-ans');
            }
            var correct_ans_id =  '#question'+question_no+correct_ans;
            $(correct_ans_id).addClass('right-ans');
        });
    }

    return {
        init:function(){
            question();
        }
    }
}();
