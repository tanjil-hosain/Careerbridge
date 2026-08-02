import { Link } from "@inertiajs/react";

export default function CTA() {

    return (

        <section className="cta-section">

            <div className="container">

                <div className="cta-box">

                    <div className="row align-items-center">

                        <div className="col-lg-8">

                            <h2 className="fw-bold text-white mb-3">

                                Ready to Find Your Dream Job?

                            </h2>

                            <p className="text-white mb-0">

                                Join thousands of job seekers and employers
                                who trust CareerBridge every day.

                            </p>

                        </div>

                        <div className="col-lg-4 text-lg-end mt-4 mt-lg-0">

                            <Link
                                href="/jobs"
                                className="btn btn-light btn-lg me-2"
                            >
                                Browse Jobs
                            </Link>

                            <Link
                                href="/register"
                                className="btn btn-outline-light btn-lg"
                            >
                                Register
                            </Link>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    );

}