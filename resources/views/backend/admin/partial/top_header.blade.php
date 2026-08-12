<header class="top-header">
    <nav class="navbar navbar-expand">

        {{-- Mobile Menu --}}
        <div class="mobile-toggle-icon d-xl-none">
            <i class="bi bi-list"></i>
        </div>

        {{-- Left Navigation --}}
        <div class="top-navbar d-none d-xl-block">
            <ul class="navbar-nav align-items-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="bi bi-house-door me-1"></i>
                        Home
                    </a>
                </li>

            </ul>
        </div>


        {{-- Search --}}
        <div class="search-toggle-icon d-xl-none ms-auto">
            <i class="bi bi-search"></i>
        </div>

        <form class="searchbar d-none d-xl-flex ms-auto">
            <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
                <i class="bi bi-search"></i>
            </div>

            <input
                class="form-control"
                type="text"
                placeholder="Search jobs..."
            >

            <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon">
                <i class="bi bi-x-lg"></i>
            </div>
        </form>


        {{-- Right Side --}}
        <div class="top-navbar-right ms-3">

            <ul class="navbar-nav align-items-center">

                {{-- Notifications --}}
                <li class="nav-item dropdown dropdown-large">

                    <a
                        class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                        href="#"
                        data-bs-toggle="dropdown"
                    >
                        <i class="bi bi-bell fs-5"></i>

                        <span class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle">
                            0
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <div class="dropdown-header">
                                Notifications
                            </div>
                        </li>

                        <li>
                            <div class="text-center text-muted py-3">
                                <i class="bi bi-bell-slash fs-4 d-block mb-2"></i>
                                No new notifications
                            </div>
                        </li>

                    </ul>

                </li>


                {{-- User --}}
                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                        href="#"
                        data-bs-toggle="dropdown"
                    >

                        <div class="user-setting d-flex align-items-center gap-2">

                            <img
                                src="{{ asset('assets/images/avatars/avatar-1.png') }}"
                                class="user-img"
                                alt="User"
                            >

                            <div class="user-name d-none d-sm-block">
                                {{ Auth::user()->name }}
                            </div>

                        </div>

                    </a>


                    <ul class="dropdown-menu dropdown-menu-end">

                        {{-- User Info --}}
                        <li>

                            <div class="dropdown-item">

                                <div class="d-flex align-items-center">

                                    <img
                                        src="{{ asset('assets/images/avatars/avatar-1.png') }}"
                                        alt="User"
                                        class="rounded-circle"
                                        width="50"
                                        height="50"
                                    >

                                    <div class="ms-3">

                                        <h6 class="mb-0">
                                            {{ Auth::user()->name }}
                                        </h6>

                                        <small class="text-secondary">
                                            {{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        {{-- Dashboard --}}
                        <li>

                            <a
                                class="dropdown-item"
                                href="{{ url('/dashboard') }}"
                            >

                                <div class="d-flex align-items-center">

                                    <div class="setting-icon">
                                        <i class="bi bi-speedometer2"></i>
                                    </div>

                                    <div class="setting-text ms-3">
                                        <span>Dashboard</span>
                                    </div>

                                </div>

                            </a>

                        </li>


                        {{-- Home --}}
                        <li>

                            <a
                                class="dropdown-item"
                                href="{{ url('/') }}"
                            >

                                <div class="d-flex align-items-center">

                                    <div class="setting-icon">
                                        <i class="bi bi-house-door"></i>
                                    </div>

                                    <div class="setting-text ms-3">
                                        <span>Home</span>
                                    </div>

                                </div>

                            </a>

                        </li>


                        {{-- Profile --}}
                        <li>

                            <a
                                class="dropdown-item"
                                href="{{route('job_seeker.profile.index')}}"
                            >

                                <div class="d-flex align-items-center">

                                    <div class="setting-icon">
                                        <i class="bi bi-person"></i>
                                    </div>

                                    <div class="setting-text ms-3">
                                        <span>My Profile</span>
                                    </div>

                                </div>

                            </a>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        {{-- Logout --}}
                        <li>

                            <form
                                action="{{ route('logout') }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item"
                                >

                                    <div class="d-flex align-items-center">

                                        <div class="setting-icon">
                                            <i class="bi bi-box-arrow-right"></i>
                                        </div>

                                        <div class="setting-text ms-3">
                                            <span>Logout</span>
                                        </div>

                                    </div>

                                </button>

                            </form>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </nav>
</header>