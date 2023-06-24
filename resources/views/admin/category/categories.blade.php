@extends('layouts.main-dash')

@section('title', 'Admin-Categories')

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
                    <h1 class="h3 mb-2 text-gray-800">Categories</h1>

                    <!-- Table data -->
                    <div class="card shadow mb-4">
                        <div class="row card-header py-3 mx-0">

                            <!-- Search bar -->
                            @include('layouts.searchbar-dash')
                            <!-- end Search bar -->

                            <div class="col-md d-flex justify-content-end">
                                <form class="d-sm-inline-block form-inline ml-auto mr-md-3 my-2 my-md-0 mw-100" method="post" action="{{ route('admin.addCategory') }}">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control bg-light small" placeholder="New category" autocomplete="off">
                                        <!-- show error if exists -->
                                        @error('name')
                                        @php
                                            alert('', "$message", 'error');
                                        @endphp
                                        @enderror
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Name</th>
                                        <th style="width: 300px; min-width: 180px">More</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Number</th>
                                        <th>Name</th>
                                        <th style="width: 300px; min-width: 180px">More</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($categories as $number => $category)
                                        <tr>
                                            <td>{{ ++$number }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td style="width: 300px; min-width: 180px">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('admin.editCategory', $category->id) }}" class="btn btn-secondary btn-sm">Change</a>
                                                    </div>
                                                    <div class="col">
                                                        <form method="post" action="{{ route('admin.deleteCategory', $category->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $categories->render() }}
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
