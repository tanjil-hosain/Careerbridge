import { Link } from "@inertiajs/react";

export default function Categories({ categories }) {

    return (
        <section className="section-padding bg-light">

            <div className="container">

                <div className="text-center mb-5">

                    <h2 className="section-title">

                        Browse By Category

                    </h2>

                    <p className="section-subtitle">

                        Explore thousands of opportunities from different job categories.

                    </p>

                </div>

                <div className="row g-4">

                    {categories.map((category, index) => (

                        <div
                            className="col-lg-3 col-md-4 col-sm-6"
                            key={category.id}
                        >

                            <Link
                                href={`/jobs?category=${category.id}`}
                                className="text-decoration-none"
                            >

                                <div className="category-card">

                                    <div className="category-icon">

                                        <i className={"bi bi-laptop"}></i>

                                    </div>

                                    <h5 className="fw-bold mt-3 mb-2">

                                        {category.name}

                                    </h5>

                                    <span className="text-muted">

                                        {category.job_count ?? 0} Jobs

                                    </span>

                                </div>

                            </Link>

                        </div>

                    ))}

                </div>

            </div>

        </section>
    );
}