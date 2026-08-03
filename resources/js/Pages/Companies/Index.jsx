import FrontendLayout from "@/Layouts/FrontendLayout";
import { Link } from "@inertiajs/react";

export default function Index({ companies }) {

    return (
        <FrontendLayout>

            <div className="container py-5">

                <div className="d-flex justify-content-between align-items-center mb-4">

                    <h2 className="fw-bold">
                        Companies
                    </h2>

                    <span className="badge bg-primary fs-6">
                        {companies.total} Companies
                    </span>

                </div>

                <div className="row">

                    {companies.data.map((company) => (

                        <div
                            className="col-lg-4 col-md-6 mb-4"
                            key={company.id}
                        >

                            <div className="card border-0 shadow h-100 rounded-4">

                                <div className="card-body text-center">

                                    <img
                                        src={`/storage/${company.logo}`}
                                        className="rounded-circle mb-3"
                                        style={{
                                            width: 150,
                                            height: 100,
                                            objectFit: "cover",
                                        }}
                                    />

                                    <h5 className="fw-bold">

                                        {company.company_name}

                                    </h5>

                                    <p className="text-muted small">

                                        {company.address}

                                    </p>

                                    <p className="mb-3">

                                        <span className="badge bg-success">

                                            {company.job_count} Active Jobs

                                        </span>

                                    </p>

                                    <Link
                                        href={route("companies.show", company.id)}
                                        className="btn btn-primary w-100"
                                    >
                                        View Company
                                    </Link>

                                </div>

                            </div>

                        </div>

                    ))}

                </div>

            </div>

        </FrontendLayout>
    );
}