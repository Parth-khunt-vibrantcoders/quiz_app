@extends('frontend.layouts.layout')
@section('section')
@php
$data = [];

if (!empty(Auth()->guard('users')->user())) {
   $data = Auth()->guard('users')->user();
}

@endphp
<section>
    <div class="container">
        <div class="quiz-list-main">
            <div class="quiz-list-box">
                <div class="quiz-list-box-content" style="width: 100% !important">
                    <div class="box-img">
                        <div class="list-img">
                            <img src="{{ asset('public/uploads/quiz/'.$quiz_details[0]['image']) }}">
                        </div>
                    </div>
                    <div class="box-content">
                        <span>{{ $quiz_details[0]['quiz_category']}}</span>
                        <h4>{{ $quiz_details[0]['name']}} <i class="fas fa-coins"></i> {{ $quiz_details[0]['prize']}}</h4>
                    </div>
                    <ul>
                        <li>You've got 90 seconds to answer all questions</li>
                        <li>Answer as many questions as you can</li>
                        <li>Entry fee </li>
                    </ul>
                </div>
                <div class="quiz-list-box-footer">


                    <div class="play-btn full-btn">
                        <div class=" text-center " style="margin-bottom: 15px !important;color: var(--text-color);">Join now to save the coins you win! 👇</div>

                        @if(empty($data))
                            <a href="{{ route('sign-in', ['id' => $adid])}}">
                                <button type="button">Login Now</button>
                            </a>
                        @else
                            <a href="{{ route('play-contest', [$quiz_details[0]['slug'], 'id='.$adid])}}">
                                <button type="button">Play Now</button>
                            </a>
                        @endif
                        @if(empty($data))
                            <div class=" text-center " style="color: var(--text-color); font-weight: bold !important ;margin-top: 15px !important; font-size: 12px !important">OR</div>

                            <br>
                            <a href="{{ route('play-contest', [$quiz_details[0]['slug'], 'id='.$adid])}}">
                                <div class=" text-center ">
                                    <span class="guest-btn" >Play as Guest</span>
                                </div>
                            </a>

                        @endif


                    </div>
                </div>
            </div>

            <div class="quiz-category text-center weight-bold" >
                <span class="mr-8 cursor-pointer prize-list show-prize-list">View Prize List</span> ·
                <a class="quiz-category link-anchor" href="{{ route('quiz-rules', ['id' => $adid ])}}" target="_blank"><span class="ml-8 cursor-pointer">Rules</span></a>
            </div>


            <div class=" hidden" id="prize-list-table">
                <table>
                    <thead>
                    <tr>
                        <th>Score</th>
                        <th class="text-right">Winning Coin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>00 - 20</td>
                        <td class="text-right">10 Coins</td>
                    </tr>

                    <tr>
                        <td>21 - 50</td>
                        <td class="text-right">30 Coins</td>
                    </tr>

                    <tr>
                        <td>51 - 100</td>
                        <td class="text-right">40 Coins</td>
                    </tr>

                    <tr>
                        <td>100 - 200</td>
                        <td class="text-right">50 Coins</td>
                    </tr>

                    <tr>
                        <td>201 - 300</td>
                        <td class="text-right">70 Coins</td>
                    </tr>

                    <tr>
                        <td>300 - 400</td>
                        <td class="text-right">80 Coins</td>
                    </tr>

                    <tr>
                        <td>300 - 400</td>
                        <td class="text-right">90 Coins</td>
                    </tr>

                    <tr>
                        <td>500+</td>
                        <td class="text-right">100 Coins</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
