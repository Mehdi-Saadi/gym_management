@extends('layouts.main-dash')

@section('title', 'Admin-Edit-User')

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
                @include('admin.layouts.topbar', ['user_name' => auth()->user()->name, 'user_photo' => auth()->user()->photo_name])
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
                                                    @if(isset($user_photo)) <img class="img-profile rounded-circle" src="{{ $user_photo }}"> @endif
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
                                                            <input type="number" placeholder="Age" id="age" class="form-control form-control-user" name="age" min="0" max="100" value="@if(isset($user->age)) {{ old('age', $user->age) }} @else {{ old('age') }} @endif" required>
                                                        </div>
                                                        <div class="col-sm-6">
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
                                                            </div>
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
                                                    <div class="form-group">
                                                        <div class="mb-3">
                                                            <label for="photo" class="form-label">Choose a profile image:</label>
                                                            <input class="form-control form-control-sm" type="file" name="photo" id="photo">
                                                        </div>
                                                    </div>
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
            @include('admin.layouts.footer')
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
    @include('admin.layouts.logout-modal')
@endsection
