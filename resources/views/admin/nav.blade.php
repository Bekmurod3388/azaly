<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
>
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ">
            <li class="nav-item navbar-dropdown  dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                        <img src="{{ asset('/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle"/>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="{{ asset('/assets/img/avatars/1.png') }}" alt
                                             class="w-px-40 h-auto rounded-circle"/>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span
                                        class="fw-semibold d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                                    <small class="text-muted">
                                        @foreach(\Illuminate\Support\Facades\Auth::user()->getRoleNames() as $v)
                                            {{ $v }}
                                        @endforeach
                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item"
                           href="{{ route('admin.users.show', \Illuminate\Support\Facades\Auth::id()) }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle"> Mening profilim </span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                           href="{{ route('admin.users.edit', \Illuminate\Support\Facades\Auth::id()) }}">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle"> Sozlamalar </span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-75" style="background-color: transparent; border: none">
                                <i class="bx bx-power-off me-2"></i> Chiqish
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

{{--<nav--}}
{{--    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"--}}
{{--    id="layout-navbar"--}}
{{-->--}}
{{--    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">--}}
{{--        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">--}}
{{--            <i class="bx bx-menu bx-sm"></i>--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">--}}
{{--        <ul class="navbar-nav flex-row align-items-center justify-content-around w-100">--}}
{{--            <div class="d-flex justify-content-around align-items-center" style="width: 90%;">--}}
{{--                @can('role-list')--}}
{{--                    <li class="menu-item">--}}
{{--                        <a href="{{ route('admin.users.index') }}" class="menu-link {{  request()->routeIs('admin.users.index') ? 'active' : 'text-black' }}">--}}
{{--                            <i class="menu-icon tf-icons fas fa-users"></i>--}}
{{--                            <div data-i18n="Analytics">Users Management</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="menu-item">--}}
{{--                        <a href="{{ route('admin.roles.index') }}" class="menu-link {{  request()->routeIs('admin.roles.index') ? 'active' : 'text-black' }}">--}}
{{--                            <i class="menu-icon tf-icons fas fa-user-shield"></i>--}}
{{--                            <div data-i18n="Analytics">Role Management</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('category-list')--}}
{{--                    <li class="menu-item">--}}
{{--                        <a href="{{ route('admin.categories.index') }}" class="menu-link {{  request()->routeIs('admin.categories.index') ? 'active' : 'text-black' }}">--}}
{{--                            <i class="menu-icon tf-icons fas fa-users"></i>--}}
{{--                            <div data-i18n="Analytics">Categories</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('category-list')--}}
{{--                    <li class="menu-item">--}}
{{--                        <a href="{{ route('admin.sizes.index') }}" class="menu-link {{  request()->routeIs('admin.sizes.index') ? 'active' : 'text-black' }}">--}}
{{--                            <i class="menu-icon tf-icons fas fa-users"></i>--}}
{{--                            <div data-i18n="Analytics">Sizes</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('category-list')--}}
{{--                    <li class="menu-item">--}}
{{--                        <a href="{{ route('admin.warehouses.index') }}" class="menu-link {{  request()->routeIs('admin.warehouses.index') ? 'active' : 'text-black' }}">--}}
{{--                            <i class="menu-icon tf-icons fas fa-users"></i>--}}
{{--                            <div data-i18n="Analytics">WareHouse</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('category-list')--}}
{{--                    <li class="menu-item">--}}
{{--                        <a href="{{ route('admin.shelf.index') }}" class="menu-link {{  request()->routeIs('admin.shelf.index') ? 'active' : 'text-black' }}">--}}
{{--                            <i class="menu-icon tf-icons fas fa-users"></i>--}}
{{--                            <div data-i18n="Analytics">Shelf</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                @can('category-list')--}}
{{--                    <li class="menu-item">--}}
{{--                        <a href="{{ route('admin.products.index') }}" class="menu-link {{  request()->routeIs('admin.products.index') ? 'active' : 'text-black' }}">--}}
{{--                            <i class="menu-icon tf-icons fas fa-users"></i>--}}
{{--                            <div data-i18n="Analytics">Products</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--            </div>--}}
{{--            <li class="nav-item navbar-dropdown dropdown-user dropdown" style="width: 10%">--}}
{{--                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">--}}
{{--                    <div class="avatar">--}}
{{--                        <img src="{{ asset('/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle"/>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu dropdown-menu-end">--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="#">--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="flex-shrink-0 me-3">--}}
{{--                                    <div class="avatar">--}}
{{--                                        <img src="{{ asset('/assets/img/avatars/1.png') }}" alt--}}
{{--                                             class="w-px-40 h-auto rounded-circle"/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <span--}}
{{--                                        class="fw-semibold d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>--}}
{{--                                    <small class="text-muted">--}}
{{--                                        @foreach(\Illuminate\Support\Facades\Auth::user()->getRoleNames() as $v)--}}
{{--                                            {{ $v }}--}}
{{--                                        @endforeach--}}
{{--                                    </small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="#">--}}
{{--                            <i class="bx bx-user me-2"></i>--}}
{{--                            <span class="align-middle">My Profile</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="#">--}}
{{--                            <i class="bx bx-cog me-2"></i>--}}
{{--                            <span class="align-middle">Settings</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <form action="{{ route('logout') }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="w-75" style="background-color: transparent; border: none">--}}
{{--                                <i class="bx bx-power-off me-2"></i>Chiqish--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}
