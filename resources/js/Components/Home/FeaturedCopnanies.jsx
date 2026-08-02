import { Link } from "@inertiajs/react";

export default function FeaturedCompanies({ companies }) {

    return (

        <section className="section-padding">

            <div className="container">

                {/* Section Header */}

                <div className="text-center mb-5">

                    <h2 className="section-title">

                        Top Companies

                    </h2>

                    <p className="section-subtitle">

                        Trusted companies hiring through CareerBridge

                    </p>

                </div>

                <div className="row g-4">

                    {companies.map((company) => (

                        <div
                            className="col-lg-4 col-md-6"
                            key={company.id}
                        >

                            <div className="company-card">

                                <img
                                    src={
                                        company.logo
                                            ? `/storage/${company.logo}`
                                            : "/assets/images/company.png"
                                    }
                                    className="company-logo"
                                    alt={company.company_name}
                                />

                                <h5 className="fw-bold mt-3">

                                    {company.company_name}

                                </h5>

                                <p className="text-muted mb-2">

                                    {company.location}

                                </p>

                                <span className="badge bg-light text-dark mb-3">

                                    {company.jobs_count} Open Jobs

                                </span>

                                <div>

                                    <Link
                                        href={`/companies/${company.slug}`}
                                        className="btn btn-outline-primary w-100"
                                    >

                                        View Company

                                    </Link>

                                </div>

                            </div>

                        </div>

                    ))}

                </div>

            </div>

        </section>

    );

}