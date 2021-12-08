@extends('frontend.layouts.layout')
@section('section')
<section>
					<div class="container">
						<div class="quiz-list-tab">
							<ul class="nav">
                                @php
                                    $i = 0 ;
                                @endphp
                                @foreach ($quiz_type as $qt_key => $qt_val)
                                    <li style="width: {{ 100 / count($quiz_type) }}% !important">
                                        <a class="{{ $i == 0 ? 'active' : '' }}" data-toggle="tab" href="#quiz_type{{ $qt_val['id'] }}">{{ $qt_val['name'] }}</a>
                                    </li>
                                    @php
                                        $i++ ;
                                    @endphp
                                @endforeach
							</ul>
						</div>

						<div class="tab-content">
                            @foreach ($quiz_type as $qt_key => $qt_val)
                                <div id="quiz_type{{ $qt_val['id'] }}" class="tab-pane in active">
                                    <div class="quiz-list-main">

                                        @foreach ($qt_val['quiz'] as $quiz_key => $quiz_val)
                                            <div class="quiz-list-box">
                                                <div class="quiz-list-box-head">
                                                    <span class="live">Live</span>
                                                    <p>{{ number_format(rand(0, 99999)) }} users playing</p>
                                                </div>
                                                <div class="quiz-list-box-content">
                                                    <div class="box-img">
                                                        <div class="list-img">
                                                            <img src="{{ asset('public/frontend/images/sport.png') }}">
                                                        </div>
                                                    </div>
                                                    <div class="box-content">
                                                        <span>{{ $quiz_val['name'] }}</span>
                                                        <h4>{{ $quiz_val['quiz_app'] }} <i class="fas fa-coins"></i> {{ $quiz_val['prize'] }}</h4>
                                                        <p>Winner announcement @ {{ date("h:i A", strtotime($quiz_val['time'])) }}</p>
                                                    </div>
                                                </div>
                                                <div class="quiz-list-box-footer">
                                                    <span>ENTRY FEE <i class="fas fa-coins"></i> {{ $quiz_val['fee'] }}</span>
                                                    <div class="play-btn">
                                                        <a href="{{ route('join-contest', [ $quiz_val['slug'], 'id' => $adid ] )}}">
                                                            <button type="button">Play</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                        @endforeach

						</div>
					</div>
				</section>
@endsection
