@extends('layouts.main-dash')

@section('title', 'Verify')

@section('body-class', 'bg-gradient-primary')

@section('content')
<div class="container">

    <div class="row d-flex justify-content-center">
        <div class="logo mt-5">
            <a href="/">
                <img src="/img/logo.png" alt="">
            </a>
        </div>
    </div>
    <!-- Outer Row -->
    <div class="row d-flex justify-content-center">
        <div class="col" style="max-width: 600px;">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Verify Your Email Address</h1>
                                    <p class="text-gray-700 mb-4">
                                        Before proceeding, please check your email for a verification link.<br>
                                        If you did not receive the email
                                    </p>
                                </div>
                                <form class="user" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        click here to request another
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            A fresh verification link has been sent to your email address.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
