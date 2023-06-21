@extends('layouts.main-dash')

@section('title', 'Admin-Users')

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
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>

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
                                                   aria-describedby="basic-addon2">
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
                                    <input type="text" name="search" class="form-control bg-light small" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>


                            <div class="row mt-1">
                                <form action="">
                                    <input type="hidden" name="admin" value="1">
                                    <button class="btn btn-success btn-sm ml-1" type="submit">
                                        Admins
                                    </button>
                                </form>

                                <form action="">
                                    <input type="hidden" name="trainer" value="1">
                                    <button class="btn btn-primary btn-sm ml-1" type="submit">
                                        Trainers
                                    </button>
                                </form>

                                <form action="">
                                    <input type="hidden" name="writer" value="1">
                                    <button class="btn btn-info btn-sm ml-1 mr-4" type="submit">
                                        Writers
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Class</th>
                                        <th>Joined At</th>
                                        <th>Permission</th>
                                        <th>More</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Class</th>
                                        <th>Joined At</th>
                                        <th>Permission</th>
                                        <th>More</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                @if(isset($user->photo_name))
                                                    <img class="img-profile rounded-circle" src="{{ $user->photo_name }}" alt="user image">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if(isset($user->age))
                                                    {{ $user->age }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($user->gender))
                                                    {{ $user->gender }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                -
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                @if($user->is_admin === 1)
                                                    <span class="btn btn-success btn-sm">Admin</span>
                                                @elseif($user->is_trainer === 1)
                                                    <span class="btn btn-primary btn-sm">Trainer</span>
                                                @elseif($user->is_writer === 1)
                                                    <span class="btn btn-info btn-sm">Writer</span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td style="width: 300px; min-width: 180px">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-secondary btn-sm">Change</a>
                                                    </div>
                                                    <div class="col">
                                                        <form method="post" action="{{ route('admin.deleteUser', $user->id) }}">
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
                            {{ $users->render() }}
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
