import { Link, usePage } from "@inertiajs/react";

export default function JobDetails({ job }) {

    const { auth } = usePage().props;

    return (

        <div className="card shadow-sm border-0 rounded-4">

            <div className="card-body p-4">

                {/* Header */}

                <div className="d-flex justify-content-between align-items-start flex-wrap">

                    <div className="d-flex">

                        <img
                            src={
                                job.company?.logo
                                    ? `/storage/${job.company.logo}`
                                    : "/assets/images/company.png"
                            }
                            className="job-details-logo me-3"
                            alt=""
                        />

                        <div>

                            <h2 className="fw-bold mb-2">

                                {job.title}

                            </h2>

                            <h5 className="text-primary">

                                {job.company?.company_name}

                            </h5>

                            <div className="d-flex flex-wrap gap-3 mt-3">

                                <span className="badge bg-primary">

                                    {job.job_type}

                                </span>

                                <span>

                                    <i className="bi bi-geo-alt-fill text-danger me-1"></i>

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

                        </div>

                    </div>

                    {/* Right Side */}

                    <div className="text-lg-end mt-4 mt-lg-0">

                        <div className="mb-3">

                            <small className="text-danger">

                                Deadline

                            </small>

                            <br />

                            <strong>

                                {job.deadline}

                            </strong>

                        </div>

                        {
                            auth.user ? (

                                <button className="btn btn-primary px-4">

                                    Apply Now

                                </button>

                            ) : (

                                <Link
                                    href={route('login')}
                                    className="btn btn-primary px-4"
                                >

                                    Login to Apply

                                </Link>

                            )
                        }

                    </div>

                </div>

                <hr className="my-4"/>
