@extends('layouts.main-dash')

@section('title', 'Admin-Edit-Category')

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
                    <h1 class="h3 mb-2 text-gray-800">Edit Category</h1>

                    <!-- form data -->
                    <div class="d-flex justify-content-center">
                        <div class="card shadow mb-4" style="max-width: 400px;">
                            <div class="card-body row mt-3 mb-1-2 mx-3">
                                <div class="col">
                                    <form method="post" action="{{ route('admin.updateCategory', $category->id) }}">
                                        @csrf
                                        @method('put')
                                        <div class="form-group row">
                                            <input type="text" name="name" class="form-control bg-light" placeholder="Edit category" autocomplete="off" value="{{ $category->name }}">
                                        </div>
                                        <!-- show error if exists -->
                                        @error('name')
                                        @php
                                            alert('', "$message", 'error');
                                        @endphp
                                        @enderror
                                        <div class="form-group row mt-5">
                                            <div class="col">
                                                <a href="{{ route('admin.categories') }}" class="btn btn-secondary btn-sm">Cancel</a>
                                            </div>
                                            <div class="col d-flex justify-content-end">
                                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
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
