@extends('layouts.main-dash')

@section('title', 'Admin-Edit-User')

@section('profile_style')
    <style>
        .profile-pic-div{
            height: 8rem;
            width: 8rem;
        }
        #uploadBtn{
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
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
                    <h1 class="h3 mb-2 text-gray-800">New Class</h1>

                    <!-- form -->
                    <div class="row d-flex justify-content-center">
                        <div class="col" style="max-width: 600px;">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">

                                        <div class="col">
                                            <div class="p-5">
                                                <form class="user" method="POST" action="{{ route('admin.addClass') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- class photo -->
                                                    <div class="form-group d-flex justify-content-center">
                                                        <div class="profile-pic-div rounded-circle overflow-hidden border border-secondary">
                                                            <input type="file" name="photo" id="file" class="d-none">
                                                            <label for="file" id="uploadBtn">
                                                                <img src="@if(isset($user->photo_name)) {{ '/profile_imgs/' . $user->photo_name }} @else /profile_select/image.svg @endif" id="photo" class="w-100 h-100">
                                                            </label>
                                                            @error('photo')
                                                            @php
                                                                alert('', "$message", 'error');
                                                            @endphp
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Class Name" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <!-- end permission part -->
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        Save
                                                    </button>
                                                </form>
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
