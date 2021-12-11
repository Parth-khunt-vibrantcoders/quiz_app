var Joincontest = function(){
    var list = function(){

        $("body").on('click', '.show-prize-list', function(){
            $('.prize-list').removeClass('show-prize-list');
            $('.prize-list').addClass('hide-prize-list');
            $('#prize-list-table').removeClass('hidden');
            $('.prize-list').text('Hide Prize List');
        });

        $("body").on('click', '.hide-prize-list', function(){
            $('.prize-list').removeClass('hide-prize-list');
            $('.prize-list').addClass('show-prize-list');
            $('#prize-list-table').addClass('hidden');
            $('.prize-list').text('View Prize List');
        });

        $("body").on('change', '.answer-btn', function(){
            var value = $(this).val();
            var adid = $("#adid").val();
            var scoretext = parseInt($("#score-text").val());
            var question_no = $(this).attr('data-question');
            var correct_ans = $("#question"+question_no).val();

            if(correct_ans == value){
                scoretext = parseInt(scoretext) + 20;
                $(this).closest('.answerui').addClass('right-ans');
            }else{
                scoretext = parseInt(scoretext) - 20;
                $(this).closest('.answerui').addClass('wrong-ans');
            }

            var correct_ans_id =  'right_answer'+question_no;
            $(".score-text").text(parseInt(scoretext));
            $("#score-text").val(parseInt(scoretext));
            $("#"+correct_ans_id).closest('.answerui').addClass('right-ans');

            if(question_no != 25){
                setTimeout(function() {
                    $("#question_answer"+question_no).delay(1000).addClass('hidden');
                    $("#question_answer"+ parseInt(parseInt(question_no)+1)).delay(1000).removeClass('hidden');
                }, 1000);
            }else{

                setTimeout(function() {
                    window.location.href = baseurl + "quiz-start?id=" + adid;
                }, 1000);
            }

        });
    }
    return {
        init:function(){
            list();
        }
    }
}();
