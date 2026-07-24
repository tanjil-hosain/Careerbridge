import React from 'react'

export default function Header() {
    return (
        <>
            <div>
                <header className="header sticky-bar">
                    <div className="container">
                        <div className="main-header">
                            <div className="header-left">
                                <div className="header-logo">
                                    <a href="index.html" className="d-flex"><img alt="jobhub" src="{{ asset('') }}assets/imgs/theme/jobhub-logo.svg" /></a>
                                </div>
                                <div className="header-nav">
                                    <nav className="nav-main-menu d-none d-xl-block">
                                        <ul className="main-menu">
                                            <li className="has-children">
                                                <a className="active" href="index.html">Home</a>
                                                <ul className="sub-menu">
                                                    <li><a href="index.html">Home 1</a></li>
                                                    <li><a href="index-2.html">Home 2</a></li>
                                                    <li><a href="index-3.html">Home 3</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="job-grid.html">Browse Jobs</a>
                                                <ul className="sub-menu">
                                                    <li><a href="job-grid.html">Job Grid</a></li>
                                                    <li><a href="job-grid-2.html">Job Grid 2</a></li>
                                                    <li><a href="job-list.html">Job List</a></li>
                                                    <li className="hr"><span /></li>
                                                    <li><a href="job-single.html">Job Single 01</a></li>
                                                    <li><a href="job-single-2.html">Job Single 02</a></li>
                                                    <li><a href="job-single-3.html">Job Single 03</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="employers-grid.html">Employers</a>
                                                <ul className="sub-menu">
                                                    <li><a href="employers-grid.html">Employers Grid</a></li>
                                                    <li><a href="employers-grid-2.html">Employers Grid 2</a></li>
                                                    <li><a href="employers-list.html">Employers List</a></li>
                                                    <li className="hr"><span /></li>
                                                    <li><a href="employers-single.html">Employers Single 01</a></li>
                                                    <li><a href="employers-single-2.html">Employers Single 02</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="candidates-grid.html">Candidates</a>
                                                <ul className="sub-menu">
                                                    <li><a href="candidates-grid.html">Candidates Grid</a></li>
                                                    <li><a href="candidates-grid-2.html">Candidates Grid 2</a></li>
                                                    <li><a href="candidates-list.html">Candidates List</a></li>
                                                    <li className="hr"><span /></li>
                                                    <li><a href="candidates-single.html">Candidates Single 01</a></li>
                                                    <li><a href="candidates-single-2.html">Candidates Single 02</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="#">Blog</a>
                                                <ul className="sub-menu">
                                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                                    <li><a href="blog-grid-2.html">Blog Grid Sidebar</a></li>
                                                    <li><a href="blog-list.html">Blog List</a></li>
                                                    <li className="hr"><span /></li>
                                                    <li><a href="blog-single.html">Blog Single 01</a></li>
                                                    <li><a href="blog-single-2.html">Blog Single 02</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="#">Pages</a>
                                                <ul className="sub-menu">
                                                    <li><a href="page-about.html">About Us</a></li>
                                                    <li><a href="page-service.html">Our Services</a></li>
                                                    <li><a href="page-pricing.html">Pricing Plan</a></li>
                                                    <li><a href="pages-faqs.html">FAQs</a></li>
                                                    <li><a href="page-contact.html">Contact Us</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div className="burger-icon burger-icon-white">
                                        <span className="burger-icon-top" />
                                        <span className="burger-icon-mid" />
                                        <span className="burger-icon-bottom" />
                                    </div>
                                </div>
                            </div>
                            <div className="header-right">
                                <div className="block-signin">
                                    @guest
                                    <a href="{{ route('login') }}" className="btn btn-default btn-shadow ml-40 hover-up">
                                        Sign In
                                    </a>
                                    @endguest
                                    @auth
                                    @php
                                    $dashboardRoute = match (auth()-&gt;user()-&gt;role) {'{'}
                                    'admin' =&gt; route('admin.dashboard'),
                                    'employer' =&gt; route('employer.dashboard'),
                                    'job_seeker' =&gt; route('job_seeker.dashboard'),
                                    default =&gt; '#',
                                    {'}'};
                                    @endphp
                                    <a href="{{ $dashboardRoute }}" className="btn btn-default btn-shadow ml-40 hover-up">
                                        Dashboard
                                    </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div className="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
                    <div className="mobile-header-wrapper-inner">
                        <div className="mobile-header-top">
                            <div className="user-account">
                                <img src="{{ asset('') }}assets/imgs/avatar/ava_1.png" alt="jobhub" />
                                <div className="content">
                                    <h6 className="user-name">Howdy, <span className="text-brand">AliThemes</span></h6>
                                    <p className="font-xs text-muted">You have 2 new messages</p>
                                </div>
                            </div>
                            <div className="burger-icon burger-icon-white">
                                <span className="burger-icon-top" />
                                <span className="burger-icon-mid" />
                                <span className="burger-icon-bottom" />
                            </div>
                        </div>
                        <div className="mobile-header-content-area">
                            <div className="perfect-scroll">
                                <div className="mobile-search mobile-header-border mb-30">
                                    <form action="#">
                                        <input type="text" placeholder="Search for items…" />
                                        <i className="fi-rr-search" />
                                    </form>
                                </div>
                                <div className="mobile-menu-wrap mobile-header-border">
                                    {/* mobile menu start */}
                                    <nav>
                                        <ul className="mobile-menu font-heading">
                                            <li className="has-children">
                                                <a className="active" href="index.html">Home</a>
                                                <ul className="sub-menu">
                                                    <li><a href="index.html">Home 1</a></li>
                                                    <li><a href="index-2.html">Home 2</a></li>
                                                    <li><a href="index-3.html">Home 3</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="job-grid.html">Browse Jobs</a>
                                                <ul className="sub-menu">
                                                    <li><a href="job-grid.html">Job Grid</a></li>
                                                    <li><a href="job-grid-2.html">Job Grid 2</a></li>
                                                    <li><a href="job-list.html">Job List</a></li>
                                                    <li className="hr"><span /></li>
                                                    <li><a href="job-single.html">Job Single 01</a></li>
                                                    <li><a href="job-single-2.html">Job Single 02</a></li>
                                                    <li><a href="job-single-3.html">Job Single 03</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="employers-grid.html">Employers</a>
                                                <ul className="sub-menu">
                                                    <li><a href="employers-grid.html">Employers Grid</a></li>
                                                    <li><a href="employers-grid-2.html">Employers Grid 2</a></li>
                                                    <li><a href="employers-list.html">Employers List</a></li>
                                                    <li className="hr"><span /></li>
                                                    <li><a href="employers-single.html">Employers Single 01</a></li>
                                                    <li><a href="employers-single-2.html">Employers Single 02</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="candidates-grid.html">Candidates</a>
                                                <ul className="sub-menu">
                                                    <li><a href="candidates-grid.html">Candidates Grid</a></li>
                                                    <li><a href="candidates-grid-2.html">Candidates Grid 2</a></li>
                                                    <li><a href="candidates-list.html">Candidates List</a></li>
                                                    <li className="hr"><span /></li>
                                                    <li><a href="candidates-single.html">Candidates Single 01</a></li>
                                                    <li><a href="candidates-single-2.html">Candidates Single 02</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="#">Blog</a>
                                                <ul className="sub-menu">
                                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                                    <li><a href="blog-grid-2.html">Blog Grid Sidebar</a></li>
                                                    <li><a href="blog-list.html">Blog List</a></li>
                                                    <li className="hr"><span /></li>
                                                    <li><a href="blog-single.html">Blog Single 01</a></li>
                                                    <li><a href="blog-single-2.html">Blog Single 02</a></li>
                                                </ul>
                                            </li>
                                            <li className="has-children">
                                                <a href="#">Pages</a>
                                                <ul className="sub-menu">
                                                    <li><a href="page-about.html">About Us</a></li>
                                                    <li><a href="page-service.html">Our Services</a></li>
                                                    <li><a href="page-pricing.html">Pricing Plan</a></li>
                                                    <li><a href="pages-faqs.html">FAQs</a></li>
                                                    <li><a href="page-contact.html">Contact Us</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                    {/* mobile menu end */}
                                </div>
                                <div className="mobile-account">
                                    <h6 className="mb-10">Your Account</h6>
                                    <ul className="mobile-menu font-heading">
                                        @guest
                                        <li>
                                            <a href="{{ route('login') }}">Login</a>
                                        </li>
                                        @endguest
                                        @auth
                                        <li>
                                            <a href="{{ $dashboardRoute }}">
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" className="border-0 bg-transparent">
                                                    Logout
                                                </button>
                                            </form>
                                        </li>
                                        @endauth
                                    </ul>
                                </div>
                                <div className="mobile-social-icon mb-50">
                                    <h6 className="mb-25">Follow Us</h6>
                                    <a href="#"><img src="{{ asset('') }}assets/imgs/theme/icons/icon-facebook.svg" alt="jobhub" /></a>
                                    <a href="#"><img src="{{ asset('') }}assets/imgs/theme/icons/icon-twitter.svg" alt="jobhub" /></a>
                                    <a href="#"><img src="{{ asset('') }}assets/imgs/theme/icons/icon-instagram.svg" alt="jobhub" /></a>
                                    <a href="#"><img src="{{ asset('') }}assets/imgs/theme/icons/icon-pinterest.svg" alt="jobhub" /></a>
                                    <a href="#"><img src="{{ asset('') }}assets/imgs/theme/icons/icon-youtube.svg" alt="jobhub" /></a>
                                </div>
                                <div className="site-copyright">Copyright 2022 © JobHub. <br />Designed by AliThemes.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </>
    )
}
