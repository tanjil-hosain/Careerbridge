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
                <li>
                    <a href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-file-earmark-code"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Job Management</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.categories.index') }}"><i class="bi bi-arrow-right-short"></i>
                                Categories</a>
                        </li>
                        <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>All Jobs</a>
                        </li>
                        <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>Pending Jobs</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">User Managment</div>
                    </a>
                    <ul>
                        <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Job Seekers</a>
                        </li>
                        <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>Employers</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Company Managment</div>
                    </a>
                    <ul>
                        <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Companies</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Application Managment</div>
                    </a>
                    <ul>
                        <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>All Applications</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Account</div>
                    </a>
                    <ul>
                        <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>My Profile</a>
                        </li>
                        <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>Logout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.plans.index')}}">
                        <div class="parent-icon"><i class="bi bi-arrow-right-short"></i>
                        </div>
                        <div class="menu-title">Plans</div>
                    </a>
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
