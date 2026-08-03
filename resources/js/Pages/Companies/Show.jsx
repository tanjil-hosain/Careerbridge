import FrontendLayout from "@/Layouts/FrontendLayout";
import { Link } from "@inertiajs/react";

export default function Show({ company }) {
    return (
        <FrontendLayout>

            <div className="container py-5">
                <h1 className="fw-bold">Discover {company.company_name}</h1>

                {/* Company Info */}
                <div className="card shadow border-0 rounded-4 mb-4">

                    <div className="card-body p-4">

                        <div className="row align-items-center">

                            <div className="col-md-2 text-center">

                                <img
                                    src={`/storage/${company.logo}`}
                                    alt={company.company_name}
                                    className="img-fluid rounded-circle border"
                                    style={{
                                        width: "120px",
                                        height: "120px",
                                        objectFit: "cover",
                                    }}
                                />

                            </div>

                            <div className="col-md-10">

                                <h2 className="fw-bold">
                                    {company.company_name}
                                </h2>

                                <p className="text-muted mb-2">
                                    📍 {company.address}
                                </p>

                                <p className="mb-2">
                                    📧 {company.email}
                                </p>

                                <p className="mb-2">
                                    📞 {company.phone}
                                </p>

                                <a
                                    href={company.website}
                                    target="_blank"
                                    className="text-decoration-none"
                                >
                                    🌐 {company.website}
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                {/* About */}
                <div className="card shadow border-0 rounded-4 mb-4">

                    <div className="card-body">

                        <h4 className="fw-bold mb-3">
                            About Company
                        </h4>

                        <p className="text-muted">
                            {company.description}
                        </p>

                    </div>

                </div>

                {/* Jobs */}
                <div className="card shadow border-0 rounded-4">

                    <div className="card-body">

                        <h4 className="fw-bold mb-4">

                            Available Jobs

                            <span className="badge bg-primary ms-2">
                                {company.job.length}
                            </span>

                        </h4>

                        <div className="row">

                            {company.job.length > 0 ? (

                                company.job.map((job) => (

                                    <div
                                        className="col-lg-6 mb-3"
                                        key={job.id}
                                    >

                                        <div className="border rounded-3 p-3 h-100">

                                            <h5 className="fw-bold">
                                                {job.title}
                                            </h5>

                                            <p className="text-muted mb-2">
                                                📍 {job.location}
                                            </p>

                                            <p className="mb-3">
                                                💰 {job.salary}
                                            </p>

                                            <Link
                                                href={route("jobs.show", job.slug)}
                                                className="btn btn-primary btn-sm"
                                            >
                                                View Details
                                            </Link>

                                        </div>

                                    </div>

                                ))

                            ) : (

                                <div className="text-center py-4">
                                    No Jobs Available
                                </div>

                            )}

                        </div>

                    </div>

                </div>

            </div>
        </FrontendLayout>
    );
}