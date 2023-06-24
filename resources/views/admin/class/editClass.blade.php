@extends('layouts.main-dash')

@section('title', 'Admin-Edit-Class')

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
                    <h1 class="h3 mb-2 text-gray-800">Edit Class</h1>

                    <!-- form -->
                    <div class="row d-flex justify-content-center">
                        <div class="col" style="max-width: 600px;">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">

                                        <div class="col">
                                            <div class="p-5">
                                                <form class="user" method="POST" action="{{ route('admin.updateClass', $course->id) }}">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <select name="category_id" class="form-control form-control-sm" required>
                                                            <option selected disabled>Select Category</option>
                                                            @foreach($categories as $number => $category)
                                                                <option value="{{ $category->id }}" @selected(old('category_id', $category->id == $course->category_id) == $category->id)>{{ ++$number . '-' . $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        @php
                                                            alert('', "$message", 'error');
                                                        @endphp
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="user_id" class="form-control form-control-sm" required>
                                                            <option selected disabled>Select Trainer</option>
                                                            @foreach($trainers as $number => $trainer)
                                                                <option value="{{ $trainer->id }}" @selected(old('user_id', $trainer->id == $course->user_id) == $trainer->id)>{{ ++$number . '-' . $trainer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('user_id')
                                                        @php
                                                            alert('', "$message", 'error');
                                                        @endphp
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Class Name" name="name" value="{{ old('name', $course->name) }}" required autocomplete="off">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="number" placeholder="Sessions Per Week" id="sessions_per_week" class="form-control form-control-user @error('sessions_per_week') is-invalid @enderror" name="sessions_per_week" min="1" value="{{ old('sessions_per_week', $course->sessions_per_week) }}" required>
                                                            @error('sessions_per_week')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- end permission part -->
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <a href="{{ route('admin.classes') }}" class="btn btn-secondary btn-user">Cancel</a>
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
