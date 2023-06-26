@extends('layouts.main')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Our Team</h2>
                        <div class="bt-option">
                            <a href="{{ route('index') }}">Home</a>
                            <span>Our team</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Team Section Begin -->
    <section class="team-section team-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span>Our Team</span>
                            <h2>TRAIN WITH EXPERTS</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($trainers as $trainer)
                    <div class="col-lg-4 col-sm-6">
                        <div class="ts-item set-bg" data-setbg="/profile_imgs/{{ $trainer->photo_name }}">
                            <div class="ts_text">
                                <h4>{{ $trainer->name }}</h4>
                                <span>Gym Trainer</span>
                                <div class="tt_social">
                                    @if(isset($trainer->facebook))
                                        <a href="{{ $trainer->facebook }}"><i class="fa fa-facebook"></i></a>
                                    @endif
                                    @if(isset($trainer->twitter))
                                        <a href="{{ $trainer->twitter }}"><i class="fa fa-twitter"></i></a>
                                    @endif
                                    @if(isset($trainer->youtube))
                                        <a href="{{ $trainer->youtube }}"><i class="fa fa-youtube-play"></i></a>
                                    @endif
                                    @if(isset($trainer->instagram))
                                        <a href="{{ $trainer->instagram }}"><i class="fa fa-instagram"></i></a>
                                    @endif
                                    <a href="{{ $trainer->email }}"><i class="fa  fa-envelope-o"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Team Section End -->
@endsection
