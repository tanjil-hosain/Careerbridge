import { Link } from "@inertiajs/react";

export default function Hero() {
    return (
        <section className="hero-section py-5">
            <div className="container">

                <div className="row align-items-center">

                    {/* Left Side */}
                    <div className="col-lg-6 mb-5 mb-lg-0">

                        <span className="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
                            🚀 Welcome to CareerBridge
                        </span>

                        <h1 className="display-4 fw-bold lh-sm mb-3">
                            Find Your
                            <span className="text-primary"> Dream Job</span>
                            <br />
                            Build Your Career
                        </h1>

                        <p className="text-muted fs-5 mb-4">
                            Discover thousands of verified jobs from top
                            companies across Bangladesh. Start your journey
                            today with CareerBridge.
                        </p>

                        <div className="d-flex flex-wrap gap-3 mb-5">

                            <Link
                                href="/jobs"
                                className="btn btn-primary btn-lg px-4"
                            >
                                <i className="bi bi-search me-2"></i>
                                Browse Jobs
                            </Link>

                            <Link
                                href="/register"
                                className="btn btn-outline-primary btn-lg px-4"
                            >
                                <i className="bi bi-building me-2"></i>
                                Post Job
                            </Link>

                        </div>

                        <div className="row text-center g-3">

                            <div className="col-4">

                                <div className="bg-white rounded-4 shadow-sm py-3">

                                    <h3 className="fw-bold text-primary mb-1">
                                        5K+
                                    </h3>

                                    <small className="text-muted">
                                        Jobs
                                    </small>

                                </div>

                            </div>

                            <div className="col-4">

                                <div className="bg-white rounded-4 shadow-sm py-3">

                                    <h3 className="fw-bold text-primary mb-1">
                                        500+
                                    </h3>

                                    <small className="text-muted">
                                        Companies
                                    </small>

                                </div>

                            </div>

                            <div className="col-4">

                                <div className="bg-white rounded-4 shadow-sm py-3">

                                    <h3 className="fw-bold text-primary mb-1">
                                        10K+
                                    </h3>

                                    <small className="text-muted">
                                        Candidates
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                    {/* Right Side */}

                    <div className="col-lg-6">

                        <div className="hero-image-card text-center">

                            <img
                                src="/assets/images/job.jfif"
                                className="img-fluid"
                                alt="Job"
                            />

                        </div>

                    </div>

                </div>

            </div>
        </section>
    );
}