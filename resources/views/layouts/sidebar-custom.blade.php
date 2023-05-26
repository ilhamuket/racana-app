<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Data_Kontingen')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('koncab-report') }}" key="t-default">@lang('translation.Data_Koncab')</a></li>
                        <li><a href="{{ route('konda-report') }}" key="t-saas">@lang('translation.Data_Konda')</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Data_Panitia')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index" key="t-default">@lang('translation.Penyelenggara')</a></li>
                        <li><a href="dashboard-saas" key="t-saas">@lang('translation.Pelaksana')</a></li>
                    </ul>
                </li>

                @if(Gate::check('manage user settings'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-group"></i>
                            <span key="t-account-setting">Kelola Akun</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if(Gate::check('manage users'))
                            <li><a href="{{ route('user.index') }}" key="t-user">Pengguna</a></li>
                            @endif
                            @if(Gate::check('manage roles'))
                            <li><a href="{{ route('role.index') }}" key="t-role">Otoritas</a></li>
                            @endif
                            @if(Gate::check('manage permissions'))
                            <li><a href="{{ route('permission.index') }}" key="t-permission">Izin</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
