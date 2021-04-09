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
        <a class="nav-link" href="{{ route('dashboard.index') }}">
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

    <li class="nav-item @if(\Request::is('meeting') || \Request::is('meeting/*')) active @endif">
        <a class="nav-link" href="{{ route('meeting.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('Lập lịch')</span>
        </a>
    </li>

    <li class="nav-item @if(\Request::is('jobs') || \Request::is('jobs/*')) active @endif">
        <a class="nav-link" href="{{ route('jobs.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('Công việc')</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        @lang('Cài đặt')
    </div>
    <li class="nav-item @if(\Request::is('categories') || \Request::is('categories/*')) active @endif">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Danh mục</span>
        </a>
    </li>

    <li class="nav-item @if(\Request::is('statuses') || \Request::is('statuses/*')) active @endif">
        <a class="nav-link" href="{{ route('status.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('Quản lý trạng thái')</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if(\Request::is('users') || \Request::is('users/*')) active @endif">
        <a class="nav-link" href="{{ route('users.index') }}"
           aria-controls="menu-user-management">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('Người dùng')</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
