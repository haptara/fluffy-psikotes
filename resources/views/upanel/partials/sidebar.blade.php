<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('upanel.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo" width="42">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">FLUFFY</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item {{ request()->is('upanel/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('upanel.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('upanel/tes*') ? 'active' : '' }}">
            <a href="{{ route('upanel.tes') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-file'></i>
                <div class="text-truncate" data-i18n="Tes">Tes</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-check"></i>
                <div data-i18n="Hasil">Hasil</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Psikotes">Psikotes</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="DISC">DISC</div>
                    </a>
                </li>
            </ul>
        </li>


        {{-- <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="menu-link text-danger">
                    <i class="menu-icon tf-icons bx bx-log-out"></i>
                    <div class="text-truncate" data-i18n="Logout">Logout</div>
                </button>
            </form>
        </li> --}}
    </ul>
</aside>
