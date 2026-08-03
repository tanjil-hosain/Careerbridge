import { Link, usePage } from "@inertiajs/react";
import { useState } from "react";

export default function Navbar() {
    const { auth } = usePage().props;
    const { url } = usePage();

    const [open, setOpen] = useState(false);
    const [dropdownOpen, setDropdownOpen] = useState(false); // Dropdown-er jonno state

    const isActive = (path) => {
        return url === path
            ? "nav-link active fw-semibold text-primary"
            : "nav-link";
    };

    return (
        <>
            <nav className="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-3">
                <div className="container">
                    <Link
                        href="/"
                        className="navbar-brand d-flex align-items-center"
                    >
                        <div
                            className="bg-primary rounded-circle d-flex justify-content-center align-items-center me-2"
                            style={{
                                width: "45px",
                                height: "45px"
                            }}
                        >
                            <i className="bi bi-briefcase-fill text-white fs-5"></i>
                        </div>
                        <div>
                            <h4 className="mb-0 fw-bold">
                                <span className="text-dark">Career</span>
                                <span className="text-primary">Bridge</span>
                            </h4>
                            <small className="text-muted">
                                Find Your Dream Job
                            </small>
                        </div>
                    </Link>

                    <button
                        className="navbar-toggler"
                        type="button"
                        onClick={() => setOpen(!open)}
                    >
                        <span className="navbar-toggler-icon"></span>
                    </button>

                    <div className={`collapse navbar-collapse ${open ? "show" : ""}`}>
                        <ul className="navbar-nav mx-auto">
                            <li className="nav-item">
                                <Link href="/" className={isActive("/")}>
                                    Home
                                </Link>
                            </li>
                            <li className="nav-item">
                                <Link href="/jobs" className={isActive("/jobs")}>
                                    Browse Jobs
                                </Link>
                            </li>
                            <li className="nav-item">
                                <Link href="/companies" className={isActive("/companies")}>
                                    Companies
                                </Link>
                            </li>
                            <li className="nav-item">
                                <Link href="/pricing" className={isActive("/pricing")}>
                                    Pricing
                                </Link>
                            </li>
                            <li className="nav-item">
                                <Link href="/about" className={isActive("/about")}>
                                    About
                                </Link>
                            </li>
                            <li className="nav-item">
                                <Link href="/contact" className={isActive("/contact")}>
                                    Contact
                                </Link>
                            </li>
                        </ul>

                        {!auth?.user ? (
                            <div className="d-flex align-items-center gap-2">
                                <Link
                                    href="/login"
                                    className="btn btn-outline-primary rounded-pill px-4"
                                >
                                    Login
                                </Link>
                                <Link
                                    href="/register"
                                    className="btn btn-primary rounded-pill px-4"
                                >
                                    Register
                                </Link>
                            </div>
                        ) : (
                            <div className="d-flex align-items-center gap-3">
                                {/* Saved Jobs */}
                                <Link
                                    href="/saved-jobs"
                                    className="btn btn-light position-relative rounded-circle"
                                    style={{ width: "42px", height: "42px" }}
                                >
                                    <i className="bi bi-heart fs-5"></i>
                                </Link>

                                {/* Notification */}
                                <button
                                    className="btn btn-light position-relative rounded-circle"
                                    style={{ width: "42px", height: "42px" }}
                                >
                                    <i className="bi bi-bell fs-5"></i>
                                    <span className="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        3
                                    </span>
                                </button>

                                {/* User Dropdown (React Controlled) */}
                                <div className="dropdown">
                                    <button
                                        className="btn btn-primary rounded-pill dropdown-toggle px-3"
                                        type="button"
                                        onClick={() => setDropdownOpen(!dropdownOpen)}
                                    >
                                        <i className="bi bi-person-circle me-2"></i>
                                        {auth.user.name}
                                    </button>

                                    {/* `show` class toggle korchi state diye */}
                                    <ul className={`dropdown-menu dropdown-menu-end shadow border-0 ${dropdownOpen ? "show" : ""}`}>
                                        <li>
                                            <h6 className="dropdown-header">
                                                Welcome 👋
                                            </h6>
                                        </li>
                                        <li><hr className="dropdown-divider" /></li>
                                        <li>
                                            <a
                                                className="dropdown-item"
                                                href={
                                                    auth.user.role === "admin"
                                                        ? "/admin/dashboard"
                                                        : auth.user.role === "employer"
                                                        ? "/employer/dashboard"
                                                        : "/job_seeker/dashboard"
                                                }
                                                onClick={() => setDropdownOpen(false)}
                                            >
                                                <i className="bi bi-speedometer2 me-2"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <Link
                                                className="dropdown-item"
                                                href="/profile"
                                                onClick={() => setDropdownOpen(false)}
                                            >
                                                <i className="bi bi-person me-2"></i>
                                                Profile
                                            </Link>
                                        </li>
                                        <li>
                                            <Link
                                                className="dropdown-item"
                                                href="/my-applications"
                                                onClick={() => setDropdownOpen(false)}
                                            >
                                                <i className="bi bi-file-earmark-text me-2"></i>
                                                My Applications
                                            </Link>
                                        </li>
                                        <li>
                                            <Link
                                                className="dropdown-item"
                                                href="/subscription"
                                                onClick={() => setDropdownOpen(false)}
                                            >
                                                <i className="bi bi-stars me-2"></i>
                                                Subscription
                                            </Link>
                                        </li>
                                        <li><hr className="dropdown-divider" /></li>
                                        <li>
                                            <Link
                                                href="/logout"
                                                method="post"
                                                as="button"
                                                className="dropdown-item text-danger"
                                                onClick={() => setDropdownOpen(false)}
                                            >
                                                <i className="bi bi-box-arrow-right me-2"></i>
                                                Logout
                                            </Link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        )}
                    </div>
                </div>
            </nav>
        </>
    );
}