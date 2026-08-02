import { Link } from "@inertiajs/react";

export default function Footer() {
    return (
        <footer className="footer mt-5 pt-5 pb-3">

            <div className="container">

                <div className="row g-4">

                    {/* Company */}

                    <div className="col-lg-4 col-md-6">

                        <h4 className="fw-bold mb-3">

                            <span className="text-primary">Career</span>Bridge

                        </h4>

                        <p className="text-light-emphasis">

                            CareerBridge helps job seekers find their dream jobs
                            and enables employers to hire the best talent easily.

                        </p>

                        <div className="d-flex gap-3 mt-3">

                            <a href="#" className="text-white fs-5">
                                <i className="bi bi-facebook"></i>
                            </a>

                            <a href="#" className="text-white fs-5">
                                <i className="bi bi-linkedin"></i>
                            </a>

                            <a href="#" className="text-white fs-5">
                                <i className="bi bi-github"></i>
                            </a>

                        </div>

                    </div>

                    {/* Quick Links */}

                    <div className="col-lg-2 col-md-6">

                        <h5 className="mb-3">Quick Links</h5>

                        <ul className="list-unstyled">

                            <li className="mb-2">
                                <Link href="/" className="footer-link">
                                    Home
                                </Link>
                            </li>

                            <li className="mb-2">
                                <Link href="/jobs" className="footer-link">
                                    Browse Jobs
                                </Link>
                            </li>

                            <li className="mb-2">
                                <Link href="/companies" className="footer-link">
                                    Companies
                                </Link>
                            </li>

                            <li className="mb-2">
                                <Link href="/pricing" className="footer-link">
                                    Pricing
                                </Link>
                            </li>

                        </ul>

                    </div>

                    {/* For Employers */}

                    <div className="col-lg-3 col-md-6">

                        <h5 className="mb-3">

                            For Employers

                        </h5>

                        <ul className="list-unstyled">

                            <li className="mb-2">
                                <Link href="/register" className="footer-link">
                                    Post a Job
                                </Link>
                            </li>

                            <li className="mb-2">
                                <Link href="/register" className="footer-link">
                                    Employer Dashboard
                                </Link>
                            </li>

                            <li className="mb-2">
                                <Link href="/pricing" className="footer-link">
                                    Subscription Plans
                                </Link>
                            </li>

                        </ul>

                    </div>

                    {/* Contact */}

                    <div className="col-lg-3 col-md-6">

                        <h5 className="mb-3">

                            Contact

                        </h5>

                        <p className="mb-2">

                            <i className="bi bi-envelope me-2"></i>

                            support@careerbridge.com

                        </p>

                        <p className="mb-2">

                            <i className="bi bi-telephone me-2"></i>

                            +880 1234-567890

                        </p>

                        <p>

                            <i className="bi bi-geo-alt me-2"></i>

                            Dhaka, Bangladesh

                        </p>

                    </div>

                </div>

                <hr className="border-secondary my-4" />

                <div className="text-center">

                    <small>

                        © {new Date().getFullYear()} CareerBridge. All Rights Reserved.

                    </small>

                </div>

            </div>

        </footer>
    );
}