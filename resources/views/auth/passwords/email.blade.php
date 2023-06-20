@extends('layouts.main-dash')

@section('title', 'Register')

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
                                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Send Password Reset Link
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
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
