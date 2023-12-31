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
                    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>

                    <!-- user data -->
                    <div class="row d-flex justify-content-center">
                        <div class="col" style="max-width: 600px;">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">

                                        <div class="col">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">User Data</h1>
                                                </div>
                                                <form class="user" method="POST" action="{{ route('admin.updateUser', $user->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <!-- profile photo -->
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
                                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="number" placeholder="Age" id="age" class="form-control form-control-user @error('age') is-invalid @enderror" name="age" min="10" max="100" value="@if(isset($user->age)){{ old('age', $user->age) }}@endif" required>
                                                            @error('age')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="number" placeholder="Experience" id="experience" class="form-control form-control-user @error('experience') is-invalid @enderror" name="experience" max="100" value="@if(isset($user->experience)){{ old('experience', $user->experience) }}@endif" required>
                                                            @error('experience')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row d-flex justify-content-center">
                                                        <div class="mt-2">
                                                            <label for="male" class="form-check-label mr-4">Male</label>
                                                            <input type="radio" class="form-check-input" id="male" name="gender" value="1"
                                                                @php
                                                                    if(isset($user->gender)) {
                                                                        if ($user->gender === 1)
                                                                            echo 'checked';
                                                                    }
                                                                @endphp>
                                                            <label for="female" class="form-check-label mr-4">Female</label>
                                                            <input type="radio" class="form-check-input" id="female" name="gender" value="0"
                                                                @php
                                                                    if(isset($user->gender)) {
                                                                        if ($user->gender === 0)
                                                                            echo 'checked';
                                                                    }
                                                                @endphp>
                                                            <!-- show gender error -->
                                                            @error('gender')
                                                            @php
                                                                alert('', "$message", 'error');
                                                            @endphp
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control form-control-user" id="password-confirm" placeholder="Repeat Password" name="password_confirmation">
                                                        </div>
                                                    </div>
                                                    <!-- permission part -->
                                                    <div class="form-group row">
                                                        <div class="col-md-3">
                                                            <span class="fw-bolder">Permissions:</span><br>
                                                        </div>
                                                        <div class="col-md-3 row">
                                                            <label class="form-check-label mr-2" for="admin">
                                                                Admin
                                                            </label>
                                                            <input type="checkbox" class="form-check" id="admin" name="admin" @checked(old('admin', $user->is_admin))>
                                                        </div>
                                                        <div class="col-md-3 row">
                                                            <label class="form-check-label mr-2" for="trainer">
                                                                Trainer
                                                            </label>
                                                            <input type="checkbox" class="form-check" id="trainer" name="trainer" @checked(old('trainer', $user->is_trainer))>
                                                        </div>
                                                        <div class="col-md-3 row">
                                                            <label class="form-check-label mr-2" for="writer">
                                                                Writer
                                                            </label>
                                                            <input type="checkbox" class="form-check" id="writer" name="writer" @checked(old('writer', $user->is_writer))>
                                                        </div>
                                                    </div>
                                                    <!-- end permission part -->
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <a href="{{ route('admin.users') }}" class="btn btn-secondary btn-user">Cancel</a>
                                                        </div>
                                                        <div class="col">
                                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                                Save
                                                            </button>
                                                        </div>
                                                    </div>
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
