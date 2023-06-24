@extends('layouts.main-dash')

@section('title', 'Profile')

@section('profile_style')
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <style>
        .profile-pic-div{
            height: 8rem;
            width: 8rem;
        }
    </style>
@endsection

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('trainer.layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.topbar-dash', ['user_name' => auth()->user()->name, 'user_photo' => auth()->user()->photo_name])
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Your Profile</h1>

                    <!-- user data -->
                    <div class="row d-flex justify-content-center">
                        <div class="col" style="max-width: 600px;">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">

                                        <div class="col">
                                            <div class="p-5">
                                                <!-- profile photo -->
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="profile-pic-div rounded-circle overflow-hidden border border-secondary">
                                                        <img src="@if(isset($user->photo_name)) {{ '/profile_imgs/' . $user->photo_name }} @else /profile_select/image.svg @endif" id="photo" class="w-100 h-100">
                                                    </div>
                                                </div>

                                                <div class="row p-4">
                                                    <div class="col-md-6 mb-2">
                                                        <span style="font-weight: bolder">Name:</span> {{ $user->name }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="font-weight: bolder">Experience:</span> {{ $user->experience }} years
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="row p-4">
                                                    <div class="col-md-6 mb-2">
                                                        <span style="font-weight: bolder">Age:</span> {{ $user->age }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if(isset($user->instagram) || isset($user->twitter) || isset($user->facebook) || isset($user->youtube))
                                                            <div class="row">
                                                                <div class="col">
                                                                    <span style="font-weight: bolder">Links:</span>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="canvas-social">
                                                                        @if(isset($user->instagram))
                                                                            <a href="{{ $user->instagram }}"><i class="fa fa-instagram"></i></a>
                                                                        @endif
                                                                        @if(isset($user->twitter))
                                                                            <a href="{{ $user->twitter }}"><i class="fa fa-twitter"></i></a>
                                                                        @endif
                                                                        @if(isset($user->facebook))
                                                                            <a href="{{ $user->facebook }}"><i class="fa fa-facebook"></i></a>
                                                                        @endif
                                                                        @if(isset($user->youtube))
                                                                            <a href="{{ $user->youtube }}"><i class="fa fa-youtube-play"></i></a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <hr>

                                                @if(isset($user->info))
                                                    <div class="row p-4">
                                                        <span style="font-weight: bolder">About:</span> <br>
                                                        {{ $user->info }}
                                                    </div>

                                                    <hr>
                                                @endif

                                                <a href="{{ route('trainer.editProfile') }}" class="btn btn-primary btn-user btn-block">Change Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer-dash')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('layouts.logout-modal-dash')
@endsection

@section('profile_script')
    <script src="/profile_select/app.js"></script>
@endsection
