@extends('layouts.main-dash')

@section('title', 'Your-Classes')

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
                    <h1 class="h3 mb-2 text-gray-800">Your Classes</h1>

                    <!-- Table data -->
                    <div class="card shadow mb-4">
                        <div class="row card-header py-3 mx-0">

                            <!-- Search bar -->
                            @include('layouts.searchbar-dash')
                            <!-- end Search bar -->

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Members</th>
                                        <th>Category</th>
                                        <th>Sessions per week</th>
                                        <th>Info</th>
                                        <th>More</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Members</th>
                                        <th>Category</th>
                                        <th>Sessions per week</th>
                                        <th>Info</th>
                                        <th>More</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($courses as $course)
                                        <tr>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->members->count() }}</td>
                                            <td>{{ $course->category->name }}</td>
                                            <td>{{ $course->sessions_per_week }}</td>
                                            <td>{{ $course->info }}</td>
                                            <td style="width: 300px; min-width: 180px">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('admin.infoClass', $course->id) }}" class="btn btn-info btn-sm">More</a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{ route('admin.editClass', $course->id) }}" class="btn btn-secondary btn-sm">Change</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card body -->
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
