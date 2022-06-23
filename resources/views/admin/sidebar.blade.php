<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.home') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
               <img src="" alt="">
              </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin Panel</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @can('role-list')
            <li class="menu-item {{  request()->routeIs('admin.users.index') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fas fa-users"></i>
                    <div data-i18n="Analytics"> Foydalanuvchilar </div>
                </a>
            </li>
            <li class="menu-item {{  request()->routeIs('admin.roles.index') ? 'active' : '' }}">
                <a href="{{ route('admin.roles.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fas fa-user-shield"></i>
                    <div data-i18n="Analytics"> Rollarni boshqarish </div>
                </a>
            </li>
        @endcan
        @can('category-list')
            <li class="menu-item {{  request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                <a href="{{ route('admin.categories.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fas fa-users"></i>
                    <div data-i18n="Analytics"> Kategoriyalar </div>
                </a>
            </li>
        @endcan
        @can('category-list')
            <li class="menu-item {{  request()->routeIs('admin.sizes.index') ? 'active' : '' }}">
                <a href="{{ route('admin.sizes.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fas fa-users"></i>
                    <div data-i18n="Analytics"> O'lchamlar </div>
                </a>
            </li>
        @endcan
        @can('category-list')
            <li class="menu-item {{  request()->routeIs('admin.warehouses.index') ? 'active' : '' }}">
                <a href="{{ route('admin.warehouses.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fas fa-users"></i>
                    <div data-i18n="Analytics"> Omborxona </div>
                </a>
            </li>
        @endcan


{{--        @can('category-list')--}}
{{--            <li class="menu-item {{  request()->routeIs('admin.shelf.index') ? 'active' : '' }}">--}}
{{--                <a href="{{ route('admin.shelf.index') }}" class="menu-link">--}}
{{--                    <i class="menu-icon tf-icons fas fa-users"></i>--}}
{{--                    <div data-i18n="Analytics"> Tokchalar </div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

        @can('category-list')
            <li class="menu-item {{  request()->routeIs('admin.products.index') ? 'active' : '' }}">
                <a href="{{ route('admin.products.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons fas fa-users"></i>
                    <div data-i18n="Analytics"> Mahsulotlar </div>
                </a>
            </li>
        @endcan
    </ul>
</aside>
