<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - logo -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">GYM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - classes -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('trainer.classes') }}">
            <i class="fas fa-fw fa-school"></i>
            <span>Your Classes</span></a>
    </li>

    <!-- Nav Item - messages -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('trainer.classes') }}">
            <i class="fas fa-fw fa-comment"></i>
            <span>Messages</span></a>
    </li>

    <!-- Nav Item - settings -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('trainer.profile') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Settings</span></a>
    </li>

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
{{--           aria-expanded="true" aria-controls="collapseTwo">--}}
{{--            <i class="fas fa-fw fa-users"></i>--}}
{{--            <span>Users</span>--}}
{{--        </a>--}}
{{--        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item" href="{{ route('admin.users') }}">All</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
