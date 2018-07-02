<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
            <a href="{{ action('Administrators\Systems\DashboardController@index') }}" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-line-graph"></i>
                        <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                Dashboard
                                            </span>
                        <span class="m-menu__link-badge">
                                                <span class="m-badge m-badge--danger">
                                                    2
                                                </span>
                        </span>
                        </span>
                        </span>
                    </a>
        </li>
        <li class="m-menu__section">
            <h4 class="m-menu__section-text">
                Module
            </h4>
            <i class="m-menu__section-icon flaticon-more-v3"></i>
        </li>
        {{-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="#" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon flaticon-users"></i>
                        <span class="m-menu__link-text">
                                        User
                                    </span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{ action('Administrators\Users\UserController@index') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                    <span class="m-menu__link-text">
                                                    Danh sách
                                                </span>
                                </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="#" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon flaticon-settings-1"></i>
                        <span class="m-menu__link-text">
                                        System
                                    </span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{ action('Administrators\Systems\BranchController@index') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                    <span class="m-menu__link-text">
                                                    Chi nhánh
                                                </span>
                                </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{ action('Administrators\Systems\DepartmentController@index') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                    <span class="m-menu__link-text">
                                                    Phòng ban
                                                </span>
                                </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{ action('Administrators\Systems\PositionController@index') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                    <span class="m-menu__link-text">
                                                    Chức vụ
                                                </span>
                                </a>
                    </li>
                </ul>
            </div>
        </li> --}}
    </ul>
</div>