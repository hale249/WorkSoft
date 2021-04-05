<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/" target="_blank">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('favicon.ico') }}">
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(\Request::is('/')) active @endif">
        <a class="nav-link" href="{{ route('backend.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang('Tổng quan')</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        @lang('Hệ thống')
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-meeting-management" aria-expanded="true"
           aria-controls="menu-meeting-management">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('Lập lịch')</span>
        </a>
        <div id="menu-meeting-management"
             class="collapse @if(\Request::is('meeting') || \Request::is('meeting/*')) show @endif"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(\Request::is('meeting')) active @endif"
                   href="{{ route('backend.meeting.index') }}">@lang('Danh sách lập lịch')</a>
                @if(\App\Helpers\Helper::checkRole(\Illuminate\Support\Facades\Auth::user()))
                <a class="collapse-item @if(\Request::is('meeting/create')) active @endif"
                   href="{{ route('backend.meeting.create') }}">@lang('Tạo lập lịch')</a>
                    @endif
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-project-management" aria-expanded="true"
           aria-controls="menu-project-management">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('Công việc')</span>
        </a>
        <div id="menu-project-management"
             class="collapse @if(\Request::is('jobs') || \Request::is('jobs/*')) show @endif"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(\Request::is('jobs')) active @endif"
                   href="{{ route('backend.jobs.index') }}">@lang('Danh sách công việc')</a>
                @if(\App\Helpers\Helper::checkRole(\Illuminate\Support\Facades\Auth::user()))
                <a class="collapse-item @if(\Request::is('jobs/create')) active @endif"
                   href="{{ route('backend.jobs.create') }}">@lang('Tạo công việc')</a>
                @endif
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        @lang('Cài đặt')
    </div>
    @if(\App\Helpers\Helper::checkRole(\Illuminate\Support\Facades\Auth::user()))

        <li class="nav-item @if(\Request::is('categories') || \Request::is('categories/*')) active @endif">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-category-management"
               aria-expanded="true"
               aria-controls="menu-category-management">
                <i class="fas fa-fw fa-users"></i>
                <span>Danh mục</span>
            </a>
            <div id="menu-category-management"
                 class="collapse @if(\Request::is('category') || \Request::is('category/*')) show @endif"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @if(\Request::is('category')) active @endif"
                       href="{{ route('backend.category.index') }}">Danh mục</a>
                    <a class="collapse-item @if(\Request::is('category/create')) active @endif"
                       href="{{ route('backend.category.create') }}">Tạo danh mục</a>
                </div>
            </div>
        </li>
    @endif
    @if(\App\Helpers\Helper::checkRole(\Illuminate\Support\Facades\Auth::user()))

        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-status-management"
               aria-expanded="true"
               aria-controls="menu-permission-management">
                <i class="fas fa-fw fa-users"></i>
                <span>@lang('Quản lý trạng thái')</span>
            </a>
            <div id="menu-status-management"
                 class="collapse @if(\Request::is('status') || \Request::is('status/*')) show @endif"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @if(\Request::is('status')) active @endif"
                       href="{{ route('backend.status.index') }}">@lang('Danh sách trạng thái')</a>
                    <a class="collapse-item @if(\Request::is('status/create')) active @endif"
                       href="{{ route('backend.status.create') }}">@lang('Tạo trạng thái')</a>
                </div>
            </div>
        </li>
    @endif

    @if(\App\Helpers\Helper::checkRole(\Illuminate\Support\Facades\Auth::user()))

    <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item @if(\Request::is('users') || \Request::is('users/*')) active @endif">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-user-management" aria-expanded="true"
               aria-controls="menu-user-management">
                <i class="fas fa-fw fa-users"></i>
                <span>@lang('Người dùng')</span>
            </a>
            <div id="menu-user-management"
                 class="collapse @if(\Request::is('users') || \Request::is('admin/users/*')) show @endif"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @if(\Request::is('users')) active @endif"
                       href="{{ route('backend.users.index') }}">@lang('Người dùng')</a>
                    <a class="collapse-item @if(\Request::is('users/create')) active @endif"
                       href="{{ route('backend.users.create') }}">@lang('Tạo mới người dùng')</a>
                </div>
            </div>
        </li>
    @endif
    @if(\App\Helpers\Helper::checkRole(\Illuminate\Support\Facades\Auth::user()))
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-role-management" aria-expanded="true"
               aria-controls="menu-role-management">
                <i class="fas fa-fw fa-users"></i>
                <span>@lang('Quản lý quyền')</span>
            </a>
            <div id="menu-role-management"
                 class="collapse @if(\Request::is('roles') || \Request::is('roles/*')) show @endif"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @if(\Request::is('roles')) active @endif"
                       href="{{ route('backend.roles.index') }}">@lang('Danh sách quyền')</a>
                </div>
            </div>
        </li>
    @endif

    @if(\App\Helpers\Helper::checkRole(\Illuminate\Support\Facades\Auth::user()))
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-permission-management"
               aria-expanded="true" aria-controls="menu-permission-management">
                <i class="fas fa-fw fa-users"></i>
                <span>@lang('Quản lý vai trò')</span>
            </a>
            <div id="menu-permission-management"
                 class="collapse @if(\Request::is('permissions') || \Request::is('permissions/*')) show @endif"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @if(\Request::is('permissions')) active @endif"
                       href="{{ route('backend.permissions.index') }}">@lang('Danh sách vai trò')</a>
                    <a class="collapse-item @if(\Request::is('permissions/create')) active @endif"
                       href="{{ route('backend.permissions.create') }}">@lang('Tạo vai trò')</a>
                </div>
            </div>
        </li>
@endif

<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
