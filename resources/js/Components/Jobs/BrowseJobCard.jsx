import { Link } from "@inertiajs/react";

export default function BrowseJobCard({ job }) {
    return (
        <div className="card border-0 shadow-sm browse-job-card mb-4">

            <div className="card-body p-4">

                <div className="row align-items-center">

                    {/* Company Logo */}

                    <div className="col-lg-2 col-md-2 text-center mb-3 mb-md-0">

                        <img
                            src={
                                job.company?.logo
                                    ? `/storage/${job.company.logo}`
                                    : "/assets/images/company.png"
                            }
                            alt={job.company?.company_name}
                            className="browse-company-logo"
                        />

                    </div>

                    {/* Job Info */}

                    <div className="col-lg-7 col-md-7">

                        <div className="d-flex flex-wrap align-items-center gap-2 mb-2">

                            <h5 className="fw-bold mb-0">

                                {job.title}

                            </h5>

                            <span className="badge bg-primary">

                                {job.job_type}

                            </span>

                        </div>

                        <h6 className="text-muted mb-3">

                            <i className="bi bi-building me-2"></i>

                            {job.company?.company_name}

                        </h6>

                        <div className="d-flex flex-wrap gap-4 small text-muted">

                            <span>

                                <i className="bi bi-geo-alt-fill text-primary me-1"></i>

                                {job.location}

                            </span>

                            <span>

                                <i className="bi bi-cash-stack text-success me-1"></i>

                                ৳ {job.salary}

                            </span>

                            <span>

                                <i className="bi bi-briefcase-fill text-warning me-1"></i>

                                {job.experience}

                            </span>

                        </div>

                        <div className="mt-3">

                            <small className="text-danger">

                                <i className="bi bi-calendar-event me-1"></i>

                                Deadline :
                                {" "}
                                {job.deadline}

                            </small>

                        </div>

                    </div>

                    {/* Button */}

                    <div className="col-lg-3 col-md-3 text-md-end mt-4 mt-md-0">

                        <button className="btn btn-light border rounded-circle mb-3">

                            <i className="bi bi-bookmark"></i>

                        </button>

                        <br />

                        <Link
                            href={route("jobs.show", job.slug)}
                            className="btn btn-primary px-4"
                        >

                            View Details

                        </Link>

                    </div>

                </div>

            </div>

        </div>
    );
}