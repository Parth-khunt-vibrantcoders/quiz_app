
@extends('frontend.layouts.layout')
@section('section')
<section>
    <div class="container">
        <div class="score-main">
            <div class="result-title">
                <h4>Result</h4>
            </div>
            <div class="git-icon">
                <img src="{{ asset('public/uploads/resultpages/'.$result_page_image['image']) }}">
            </div>
            <div class="congratulations-title">
                <h4>Congratulations!</h4>
            </div>
            <div class="score-box-main">
                <p>Your Score</p>
                <h3><span>{{ $score }}</span> / 500</h3>
                <p>Earned Coins</p>
                <span class="span-text"><i class="fas fa-coins"></i> {{ $coins }}</span>
                <div class="quiz-category text-center weight-bold" >
                    <span class="mr-8 cursor-pointer prize-list show-prize-list">View Prize List</span> ·
                    <a class="quiz-category link-anchor" href="{{ route('quiz-rules', ['id' => $adid ])}}" target="_blank"><span class="ml-8 cursor-pointer">Rules</span></a>
                </div>


                <div class=" hidden" id="prize-list-table">
                    <table>
                        <thead>
                        <tr>
                            <th class="text-left">Score</th>
                            <th class="text-right">Winning Coin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">00 - 20</td>
                            <td class="text-right">10 Coins</td>
                        </tr>

                        <tr>
                            <td class="text-left">21 - 50</td>
                            <td class="text-right">30 Coins</td>
                        </tr>

                        <tr>
                            <td class="text-left">51 - 100</td>
                            <td class="text-right">40 Coins</td>
                        </tr>

                        <tr>
                            <td class="text-left">100 - 200</td>
                            <td class="text-right">50 Coins</td>
                        </tr>

                        <tr>
                            <td class="text-left">201 - 300</td>
                            <td class="text-right">70 Coins</td>
                        </tr>

                        <tr>
                            <td class="text-left">300 - 400</td>
                            <td class="text-right">80 Coins</td>
                        </tr>

                        <tr>
                            <td class="text-left">300 - 400</td>
                            <td class="text-right">90 Coins</td>
                        </tr>

                        <tr>
                            <td class="text-left">500+</td>
                            <td class="text-right">100 Coins</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
