@extends('layouts.main-dash')

@section('title', 'Confirm')

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
                                    <h1 class="h4 text-gray-900 mb-4">Confirm Password</h1>
                                    <p class="text-gray-700 mb-4e">
                                        Please confirm your password before continuing.
                                    </p>
                                </div>
                                <form class="user" method="POST" action="{{ route('password.confirm') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autofocus autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Confirm Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
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
