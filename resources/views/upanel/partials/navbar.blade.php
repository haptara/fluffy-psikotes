<!-- Navbar: Start -->
<nav class="layout-navbar shadow-none py-0">
    <div class="container">
        <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-8">
            <!-- Menu logo wrapper: Start -->
            <div class="navbar-brand app-brand demo d-flex py-0 me-4 me-xl-8">
                <!-- Mobile menu toggle: Start-->
                {{-- <button class="navbar-toggler border-0 px-0 me-4" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="tf-icons bx bx-menu bx-lg align-middle text-heading fw-medium"></i>
                    </button> --}}
                <!-- Mobile menu toggle: End-->
                <a href="#" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img src="{{ asset('assets/img/fluffy-logo.png') }}" alt="" width="150">
                    </span>
                </a>
            </div>
            <!-- Menu logo wrapper: End -->
            <!-- Menu wrapper: Start -->
            {{-- <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                    <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl p-2"
                        type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="tf-icons bx bx-x bx-lg"></i>
                    </button>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-medium" aria-current="page"
                                href="landing-page.html#landingHero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="landing-page.html#landingFeatures">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="landing-page.html#landingTeam">Team</a>
                        </li>
                    </ul>
                </div> --}}
            <div class="landing-menu-overlay d-lg-none"></div>
            <!-- Menu wrapper: End -->
            <!-- Toolbar: Start -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                {{-- <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);"><i class="tf-icons navbar-icon bx bx-user"></i>
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }} </a>
                    </li> --}}
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online d-flex align-items-center justify-content-center text-white bg-primary rounded-circle"
                            style="width: 30px; height: 30px; font-size: 14px;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online d-flex align-items-center justify-content-center text-white bg-primary rounded-circle"
                                            style="width: 40px; height: 40px; font-size: 14px;">
                                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{ auth()->user()->name }}</span>
                                        <small class="text-muted">{{ auth()->user()->email }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Log Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
            <!-- Toolbar: End -->
        </div>
    </div>
</nav>
<!-- Navbar: End -->
