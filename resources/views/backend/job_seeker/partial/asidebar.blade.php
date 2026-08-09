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
                <li class="{{ request()->routeIs('job_seeker.dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('job_seeker.dashboard') }}">
                        <div class="parent-icon"><i class="bi bi-file-earmark-code"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('job_seeker.profile.*') ? 'mm-active' : '' }}">
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-file-earmark-code"></i>
                        </div>
                        <div class="menu-title">My Profile</div>
                    </a>
                    <ul>
                        <li class="{{ request()->routeIs('job_seeker.profile.index') ? 'mm-active' : '' }}"> 
                            <a href="{{ route('job_seeker.profile.index') }}"><i class="bi bi-arrow-right-short"></i>Profile Overview</a>
                        </li>
                        <li class="{{ request()->routeIs('job_seeker.profile.edit') ? 'mm-active' : '' }}"> 
                            <a href=""><i class="bi bi-arrow-right-short"></i>Edit Profile</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('job_seeker.jobs.*') ? 'mm-active' : '' }}">
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Jobs</div>
                    </a>
                    <ul>
                        <li class="{{ request()->routeIs('job_seeker.jobs.browse') ? 'mm-active' : '' }}"> 
                            <a href=""><i class="bi bi-arrow-right-short"></i> Browse Jobs</a>
                        </li>
                        <li class="{{ request()->routeIs('job_seeker.jobs.saved') ? 'mm-active' : '' }}"> 
                            <a href=""><i class="bi bi-arrow-right-short"></i> Saved Jobs</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('job_seeker.subscription.*') ? 'mm-active' : '' }}">
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Subcription</div>
                    </a>
                    <ul>
                        <li class="{{ request()->routeIs('job_seeker.subscription.plans') ? 'mm-active' : '' }}"> 
                            <a href="{{ route('job_seeker.subscription.plans') }}"><i class="bi bi-arrow-right-short"></i> Subscription Plan </a>
                        </li>
                        <li class="{{ request()->routeIs('job_seeker.subscription.my') ? 'mm-active' : '' }}">
                            <a href="{{ route('job_seeker.subscription.my') }}">
                                <i class="bi bi-arrow-right-short"></i>
                                My Subscription
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('job_seeker.application.*') ? 'mm-active' : '' }}">
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Applications</div>
                    </a>
                    <ul>
                        <li class="{{ request()->routeIs('job_seeker.application.index') ? 'mm-active' : '' }}"> 
                            <a href="{{ route('job_seeker.application.index') }}"><i class="bi bi-arrow-right-short"></i>My Application</a>
                        </li>
                        <li class="{{ request()->routeIs('job_seeker.application.status') ? 'mm-active' : '' }}"> 
                            <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i> Application Status</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('job_seeker.account.*') ? 'mm-active' : '' }}">
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Account</div>
                    </a>
                    <ul>
                        <li class="{{ request()->routeIs('job_seeker.account.password') ? 'mm-active' : '' }}"> 
                            <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Change Password</a>
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