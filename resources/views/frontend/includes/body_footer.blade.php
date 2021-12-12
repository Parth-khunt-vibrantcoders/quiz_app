<div class="desktop">
    <div class="desktop-inner">
        <div class="">
            <img src="{{ asset('public/frontend/images/man-getting.jpg') }}">
        </div>
        <div class="desktop-logo">
            <img src="{{ asset('public/frontend/images/desktop-logo.png') }}">
            <p>Play Quiz, <b>Win Coins !</b></p>
        </div>
    </div>
</div>
<div class="menu-close"></div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">

        <!-- Modal Header -->


        <!-- Modal body -->
        <div class="modal-body">
            <div class="container">
                <div class="score-main">
                   <div class="git-icon">
                      <img src="{{ asset('public/frontend/images/oops.png') }}">
                   </div>
                   <div class="congratulations-title">
                    <h4 class="quiz-category">You don't have enough coins to play this Quiz. Play other Quizzes and earn coins.</h4>
                   </div>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer play-btn">
            <button type="button"  data-dismiss="modal">Okay</button>
        </div>

        </div>
    </div>
</div>
