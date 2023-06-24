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
                    <h1 class="h3 mb-2 text-gray-800">Edit Profile</h1>

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
                                                <form class="user" method="POST" action="{{ route('trainer.updateProfile', $user->id) }}" enctype="multipart/form-data">
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
                                                        <label for="name" class="form-label ml-2">Name:</label>
                                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="form-label ml-2">Email:</label>
                                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="age" class="form-label ml-2">Age:</label>
                                                            <input type="number" placeholder="Age" id="age" class="form-control form-control-user @error('age') is-invalid @enderror" name="age" min="10" max="100" value="@if(isset($user->age)){{ old('age', $user->age) }}@endif" required>
                                                            @error('age')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="experience" class="form-label ml-2">Experience:</label>
                                                            <input type="number" placeholder="Experience" id="experience" class="form-control form-control-user @error('experience') is-invalid @enderror" name="experience" max="100" value="@if(isset($user->experience)){{ old('experience', $user->experience) }}@endif" required>
                                                            @error('experience')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <textarea name="info" placeholder="About You..." class="form-control">{{ old('info', $user->info) }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="instagram" class="form-label ml-2">Instagram:</label>
                                                        <input type="text" class="form-control form-control-user @error('instagram') is-invalid @enderror" id="instagram" placeholder="Instagram Address(can be empty)..." name="instagram" value="{{ old('instagram', $user->instagram) }}" autocomplete="off">
                                                        @error('instagram')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="twitter" class="form-label ml-2">Twitter:</label>
                                                        <input type="text" class="form-control form-control-user @error('twitter') is-invalid @enderror" id="twitter" placeholder="Twitter Address(can be empty)..." name="twitter" value="{{ old('twitter', $user->twitter) }}" autocomplete="off">
                                                        @error('twitter')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="facebook" class="form-label ml-2">Facebook:</label>
                                                        <input type="text" class="form-control form-control-user @error('facebook') is-invalid @enderror" id="facebook" placeholder="Facebook Address(can be empty)..." name="facebook" value="{{ old('facebook', $user->facebook) }}" autocomplete="off">
                                                        @error('facebook')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="youtube" class="form-label ml-2">YouTube:</label>
                                                        <input type="text" class="form-control form-control-user @error('youtube') is-invalid @enderror" id="youtube" placeholder="YouTube Address(can be empty)..." name="youtube" value="{{ old('youtube', $user->youtube) }}" autocomplete="off">
                                                        @error('youtube')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <label for="password" class="form-label ml-3">If you want change your pass: (can be empty)</label>
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
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <a href="{{ route('trainer.profile') }}" class="btn btn-secondary btn-user">Cancel</a>
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
