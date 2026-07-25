import { Link, usePage } from "@inertiajs/react";
import { useState } from "react";

export default function Navbar() {
  const { auth } = usePage().props;
  const [open, setOpen] = useState(false);

  // Determine dashboard route based on user role
  const getDashboardRoute = (role) => {
    switch (role) {
      case 'admin':
        return route('admin.dashboard');
      case 'employer':
        return route('employer.dashboard');
      case 'job_seeker':
        return route('job_seeker.dashboard');
      default:
        return '#';
    }
  };

  const dashboardRoute = auth?.user ? getDashboardRoute(auth.user.role) : '#';

  return (
    <>
      <div>
        <header className="header sticky-bar">
          <div className="container">
            <div className="main-header">
              <div className="header-left">
                <div className="header-logo">
                  <Link href="/" className="d-flex">
                    <img alt="jobhub" src="/assets/imgs/theme/jobhub-logo.svg" />
                  </Link>
                </div>
                <div className="header-nav">
                  <nav className="nav-main-menu d-none d-xl-block">
                    <ul className="main-menu">
                      <li className="has-children">
                        <Link className="active" href="/">Home</Link>
                        <ul className="sub-menu">
                          <li><Link href="/">Home 1</Link></li>
                          <li><Link href="/index-2">Home 2</Link></li>
                          <li><Link href="/index-3">Home 3</Link></li>
                        </ul>
                      </li>
                      <li className="has-children">
                        <Link href="/job-grid">Browse Jobs</Link>
                        <ul className="sub-menu">
                          <li><Link href="/job-grid">Job Grid</Link></li>
                          <li><Link href="/job-grid-2">Job Grid 2</Link></li>
                          <li><Link href="/job-list">Job List</Link></li>
                          <li className="hr"><span /></li>
                          <li><Link href="/job-single">Job Single 01</Link></li>
                          <li><Link href="/job-single-2">Job Single 02</Link></li>
                          <li><Link href="/job-single-3">Job Single 03</Link></li>
                        </ul>
                      </li>
                      <li className="has-children">
                        <Link href="/employers-grid">Employers</Link>
                        <ul className="sub-menu">
                          <li><Link href="/employers-grid">Employers Grid</Link></li>
                          <li><Link href="/employers-grid-2">Employers Grid 2</Link></li>
                          <li><Link href="/employers-list">Employers List</Link></li>
                          <li className="hr"><span /></li>
                          <li><Link href="/employers-single">Employers Single 01</Link></li>
                          <li><Link href="/employers-single-2">Employers Single 02</Link></li>
                        </ul>
                      </li>
                      <li className="has-children">
                        <Link href="/candidates-grid">Candidates</Link>
                        <ul className="sub-menu">
                          <li><Link href="/candidates-grid">Candidates Grid</Link></li>
                          <li><Link href="/candidates-grid-2">Candidates Grid 2</Link></li>
                          <li><Link href="/candidates-list">Candidates List</Link></li>
                          <li className="hr"><span /></li>
                          <li><Link href="/candidates-single">Candidates Single 01</Link></li>
                          <li><Link href="/candidates-single-2">Candidates Single 02</Link></li>
                        </ul>
                      </li>
                      <li className="has-children">
                        <Link href="#">Blog</Link>
                        <ul className="sub-menu">
                          <li><Link href="/blog-grid">Blog Grid</Link></li>
                          <li><Link href="/blog-grid-2">Blog Grid Sidebar</Link></li>
                          <li><Link href="/blog-list">Blog List</Link></li>
                          <li className="hr"><span /></li>
                          <li><Link href="/blog-single">Blog Single 01</Link></li>
                          <li><Link href="/blog-single-2">Blog Single 02</Link></li>
                        </ul>
                      </li>
                      <li className="has-children">
                        <Link href="#">Pages</Link>
                        <ul className="sub-menu">
                          <li><Link href="/page-about">About Us</Link></li>
                          <li><Link href="/page-service">Our Services</Link></li>
                          <li><Link href="/page-pricing">Pricing Plan</Link></li>
                          <li><Link href="/pages-faqs">FAQs</Link></li>
                          <li><Link href="/page-contact">Contact Us</Link></li>
                        </ul>
                      </li>
                    </ul>
                  </nav>
                  <div 
                    className="burger-icon burger-icon-white"
                    onClick={() => setOpen(!open)}
                  >
                    <span className="burger-icon-top" />
                    <span className="burger-icon-mid" />
                    <span className="burger-icon-bottom" />
                  </div>
                </div>
              </div>
              <div className="header-right">
                <div className="block-signin">
                  {!auth?.user ? (
                    <Link href={route('login')} className="btn btn-default btn-shadow ml-40 hover-up">
                      Sign In
                    </Link>
                  ) : (
                    <Link href={dashboardRoute} className="btn btn-default btn-shadow ml-40 hover-up">
                      Dashboard
                    </Link>
                  )}
                </div>
              </div>
            </div>
          </div>
        </header>

        {/* Mobile Header (You can toggle its visibility using the `open` state if needed) */}
        <div className={`mobile-header-active mobile-header-wrapper-style perfect-scrollbar ${open ? 'sidebar-visible' : ''}`}>
          <div className="mobile-header-wrapper-inner">
            <div className="mobile-header-top">
              <div className="user-account">
                <img src="/assets/imgs/avatar/ava_1.png" alt="jobhub" />
                <div className="content">
                  <h6 className="user-name">
                    Howdy, <span className="text-brand">{auth?.user?.name || 'AliThemes'}</span>
                  </h6>
                  <p className="font-xs text-muted">Manage your account</p>
                </div>
              </div>
              <div 
                className="burger-icon burger-icon-white"
                onClick={() => setOpen(false)}
              >
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
                  <nav>
                    <ul className="mobile-menu font-heading">
                      <li className="has-children">
                        <Link className="active" href="/">Home</Link>
                      </li>
                      <li className="has-children">
                        <Link href="/job-grid">Browse Jobs</Link>
                      </li>
                      <li className="has-children">
                        <Link href="/employers-grid">Employers</Link>
                      </li>
                      <li className="has-children">
                        <Link href="/candidates-grid">Candidates</Link>
                      </li>
                      <li className="has-children">
                        <Link href="#">Blog</Link>
                      </li>
                      <li className="has-children">
                        <Link href="#">Pages</Link>
                      </li>
                    </ul>
                  </nav>
                </div>
                <div className="mobile-account">
                  <h6 className="mb-10">Your Account</h6>
                  <ul className="mobile-menu font-heading">
                    {!auth?.user ? (
                      <li>
                        <Link href={route('login')}>Login</Link>
                      </li>
                    ) : (
                      <>
                        <li>
                          <Link href={dashboardRoute}>Dashboard</Link>
                        </li>
                        <li>
                          <Link href={route('logout')} method="post" as="button" className="border-0 bg-transparent">
                            Logout
                          </Link>
                        </li>
                      </>
                    )}
                  </ul>
                </div>
                <div className="mobile-social-icon mb-50">
                  <h6 className="mb-25">Follow Us</h6>
                  <a href="#"><img src="/assets/imgs/theme/icons/icon-facebook.svg" alt="jobhub" /></a>
                  <a href="#"><img src="/assets/imgs/theme/icons/icon-twitter.svg" alt="jobhub" /></a>
                  <a href="#"><img src="/assets/imgs/theme/icons/icon-instagram.svg" alt="jobhub" /></a>
                  <a href="#"><img src="/assets/imgs/theme/icons/icon-pinterest.svg" alt="jobhub" /></a>
                  <a href="#"><img src="/assets/imgs/theme/icons/icon-youtube.svg" alt="jobhub" /></a>
                </div>
                <div className="site-copyright">Copyright 2026 © JobHub. <br />Designed by AliThemes.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}