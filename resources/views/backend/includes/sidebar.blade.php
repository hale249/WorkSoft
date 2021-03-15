<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/" target="_blank">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(\Request::is('/')) active @endif">
        <a class="nav-link" href="{{ route('backend.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang('menus.backend.main_menu.dashboard')</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        @lang('menus.backend.main_menu.system')
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if(\Request::is('users') || \Request::is('users/*')) active @endif">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-user-management" aria-expanded="true" aria-controls="menu-user-management">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('menus.backend.main_menu.users.title')</span>
        </a>
        <div id="menu-user-management" class="collapse @if(\Request::is('users') || \Request::is('admin/users/*')) show @endif" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(\Request::is('users')) active @endif" href="{{ route('backend.users.index') }}">@lang('menus.backend.main_menu.users.list_all')</a>
                <a class="collapse-item @if(\Request::is('users/create')) active @endif" href="{{ route('backend.users.create') }}">@lang('menus.backend.main_menu.users.create')</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if(\Request::is('categories') || \Request::is('categories/*')) active @endif">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-category-management" aria-expanded="true" aria-controls="menu-category-management">
            <i class="fas fa-fw fa-users"></i>
            <span>Danh mục</span>
        </a>
        <div id="menu-category-management" class="collapse @if(\Request::is('categories') || \Request::is('categories/*')) show @endif" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(\Request::is('categories')) active @endif" href="{{ route('backend.category.index') }}">Danh mục</a>
                <a class="collapse-item @if(\Request::is('categories/create')) active @endif" href="{{ route('backend.category.create') }}">Tạo danh mục</a>
            </div>
        </div>
    </li>

{{--
    <li class="nav-item @if(\Request::is('admin/products') || \Request::is('admin/products/*')) active @endif">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-product-management" aria-expanded="true" aria-controls="menu-product-management">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('menus.backend.main_menu.product.title')</span>
        </a>
        <div id="menu-product-management" class="collapse @if(\Request::is('admin/products') || \Request::is('admin/products/*')) show @endif" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(\Request::is('admin/products')) active @endif" href="{{ route('backend.product.index') }}">@lang('menus.backend.main_menu.product.list_all')</a>
                <a class="collapse-item @if(\Request::is('admin/products/create')) active @endif" href="{{ route('backend.product.create') }}">@lang('menus.backend.main_menu.product.create')</a>
            </div>
        </div>
    </li>
--}}

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-meeting-management" aria-expanded="true" aria-controls="menu-meeting-management">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('Lập lịch')</span>
        </a>
        <div id="menu-meeting-management" class="collapse @if(\Request::is('admin/meetings') || \Request::is('admin/meetings/*')) show @endif" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(\Request::is('admin/meetings')) active @endif" href="{{ route('backend.meetings.index') }}">@lang('Danh sách lập lịch')</a>
                <a class="collapse-item @if(\Request::is('admin/meetings/create')) active @endif" href="{{ route('backend.meetings.create') }}">@lang('Tạo lập lịch')</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu-project-management" aria-expanded="true" aria-controls="menu-project-management">
            <i class="fas fa-fw fa-users"></i>
            <span>@lang('Công việc')</span>
        </a>
        <div id="menu-project-management" class="collapse @if(\Request::is('projects') || \Request::is('projects/*')) show @endif" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(\Request::is('project')) active @endif" href="{{ route('backend.projects.index') }}">@lang('Danh sách công việc')</a>
                <a class="collapse-item @if(\Request::is('project/create')) active @endif" href="{{ route('backend.projects.create') }}">@lang('Tạo công việc')</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
