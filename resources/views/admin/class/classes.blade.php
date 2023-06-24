@extends('layouts.main-dash')

@section('title', 'Admin-Classes')

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
                    <h1 class="h3 mb-2 text-gray-800">Classes</h1>

                    <!-- Table data -->
                    <div class="card shadow mb-4">
                        <div class="row card-header py-3 mx-0">

                            <!-- Search Dropdown (Visible Only XS) -->
                            <div class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                     aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search" action="">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control bg-light border-0 small"
                                                   placeholder="Search..." aria-label="Search"
                                                   aria-describedby="basic-addon2" autocomplete="off">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- search bar -->
                            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control bg-light small" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Members</th>
                                        <th>Trainer</th>
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
                                        <th>Trainer</th>
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
                                            <td>{{ $course->user->name }}</td>
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
                                                    <div class="col">
                                                        <form method="post" action="{{ route('admin.deleteClass', $course->id) }}">
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
                        <!-- end card body -->
                        <div class="card-footer">
{{--                            {{ $courses->render() }}--}}
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
