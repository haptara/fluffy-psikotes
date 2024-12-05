<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo" width="42">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">FLUFFY</span>
        </a>

        {{-- <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a> --}}
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-md align-middle"></i>
        </a>

    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 hide-scroll-mobile">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('fpanel/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div class="text-truncate" data-i18n="Dashboards">
                    Dashboard
                </div>
            </a>
        </li>

        <!-- Setting -->
        <li class="menu-item {{ request()->is('fpanel/setting*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div class="text-truncate" data-i18n="Setting">Setting</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('fpanel/setting/loker_posisi') ? 'active' : '' }}">
                    <a href="{{ route('fpanel.setting.loker_posisi') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Collapsed menu">
                            Loker Posisi
                        </div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('fpanel/setting/kategori_soal') ? 'active' : '' }}">
                    <a href="{{ route('fpanel.setting.kategori_soal') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Collapsed menu">
                            Set. Kategori Soal
                        </div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('fpanel/setting/group_soal') ? 'active' : '' }}">
                    <a href="{{ route('fpanel.setting.group_soal') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Collapsed menu">
                            Group Soal
                        </div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Apps & Pages">Apps</span>
        </li>
        <li class="menu-item {{ request()->is('fpanel/peserta') ? 'active' : '' }}">
            <a href="{{ route('fpanel.peserta') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div class="text-truncate" data-i18n="Front Pages">
                    Peserta
                </div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('fpanel/soal*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div class="text-truncate" data-i18n="Soal">
                    Soal
                </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('fpanel/soal/psikotes*') ? 'active' : '' }}">
                    <a href="{{ route('fpanel.soal.psikotes') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Psikotes">Psikotes</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('fpanel/soal/disc*') ? 'active' : '' }}">
                    <a href="{{ route('fpanel.soal.disc') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="DISC">
                            DISC
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('fpanel/hasil*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div class="text-truncate" data-i18n="Wizard Examples">
                    Hasil
                </div>
            </a>
            <ul class="menu-sub">
                {{-- <li class="menu-item">
                    <a href="wizard-ex-checkout.html" class="menu-link">
                        <div class="text-truncate" data-i18n="Checkout">
                            ALL
                        </div>
                    </a>
                </li> --}}
                <li class="menu-item {{ request()->is('fpanel/hasil/psikotes*') ? 'active    ' : '' }} ">
                    <a href="{{ route('fpanel.hasil.psikotes') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Psikotes">
                            Psikotes
                        </div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('fpanel/hasil/disc*') ? 'active    ' : '' }}">
                    <a href="{{ route('fpanel.hasil.disc') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Create Deal">
                            DISC
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Misc">Misc</span>
        </li>
        <li class="menu-item {{ request()->is('fpanel/user*') ? 'active' : '' }}">
            <a href="{{ route('fpanel.user') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div class="text-truncate" data-i18n="Users">
                    User
                </div>
            </a>
        </li>
        <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="javascript:void(0);" class="menu-link" onclick="this.closest('form').submit()">
                    <i class='menu-icon tf-icons bx bx-log-out'></i>
                    <div class="text-truncate" data-i18n="Logout">Logout</div>
                </a>
            </form>
        </li>
    </ul>
</aside>
