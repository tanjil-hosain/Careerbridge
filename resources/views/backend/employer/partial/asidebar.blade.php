<aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('') }}assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Career<span class="text-info">Bridge</span> </h4>
                </div>
                <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li class="{{ request()->routeIs('employer.dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('employer.dashboard') }}">
                        <div class="parent-icon"><i class="bi bi-file-earmark-code"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('employer.company.index') && !request()->routeIs('employer.account.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('employer.company.index') }}">
                        <div class="parent-icon"><i class="bi bi-file-earmark-code"></i>
                        </div>
                        <div class="menu-title">Company Profile</div>
                    </a>
                </li>

                <li class="{{ request()->routeIs('employer.jobs.*') ? 'mm-active' : '' }}">
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Job Management</div>
                    </a>
                    <ul>
                        <li class="{{ request()->routeIs('employer.jobs.index') ? 'mm-active' : '' }}"> 
                            <a href="{{ route('employer.jobs.index') }}"><i class="bi bi-arrow-right-short"></i>All Jobs</a>
                        </li>
                        <li class="{{ request()->routeIs('employer.jobs.create') ? 'mm-active' : '' }}"> 
                            <a href="{{ route('employer.jobs.create') }}"><i class="bi bi-arrow-right-short"></i>Post New Jobs</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('employer.subscription.*') ? 'mm-active' : '' }}">
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Subcription </div>
                    </a>
                    <ul>
                        <li class="{{ request()->routeIs('employer.subscription.plans') ? 'mm-active' : '' }}"> 
                            <a href="{{ route('employer.subscription.plans') }}"><i class="bi bi-arrow-right-short"></i>Subscription Plan</a>
                        </li>
                        <li class="{{ request()->routeIs('employer.subscription.my') ? 'mm-active' : '' }}">
                            <a href="{{ route('employer.subscription.my') }}">
                                <i class="bi bi-arrow-right-short"></i>
                                My Subscription
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('employer.account.*') ? 'mm-active' : '' }}">
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Account</div>
                    </a>
                    <ul>
                        <li class="{{ request()->routeIs('employer.company.index') ? 'mm-active' : '' }}"> 
                            <a href="{{ route('employer.company.index') }}"><i class="bi bi-arrow-right-short"></i>My Profile</a>
                        </li>
                        <li> 
                            <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>Logout</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-headset"></i>
                        </div>
                        <div class="menu-title">Support</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </aside>