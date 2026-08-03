import FrontendLayout from "@/Layouts/FrontendLayout";
import { router } from "@inertiajs/react";
import { useState } from "react";

export default function Apply({ job }) {

    const [resume, setResume] = useState(null);
    const [coverLetter, setCoverLetter] = useState("");

    const submit = (e) => {

        e.preventDefault();

        router.post(
            route("jobs.apply.store", job.slug),
            {
                resume,
                cover_letter: coverLetter,
            }
        );

    };

    return (

        <FrontendLayout>

            <div className="container py-5">

                <div className="row justify-content-center">

                    <div className="col-lg-8">

                        <div className="card shadow border-0 rounded-4">

                            <div className="card-body p-4">

                                <h2 className="fw-bold mb-2">

                                    Apply for

                                    {" "}

                                    {job.title}

                                </h2>

                                <p className="text-muted mb-4">

                                    {job.company?.company_name}

                                </p>

                                <form onSubmit={submit}>

                                    <div className="mb-4">

                                        <label className="form-label fw-semibold">

                                            Resume

                                        </label>

                                        <input

                                            type="file"

                                            className="form-control"

                                            onChange={(e)=>
                                                setResume(e.target.files[0])
                                            }

                                        />

                                        <small className="text-muted">

                                            PDF, DOC, DOCX

                                        </small>

                                    </div>

                                    <div className="mb-4">

                                        <label className="form-label fw-semibold">

                                            Cover Letter

                                        </label>

                                        <textarea

                                            rows="7"

                                            className="form-control"

                                            placeholder="Write your cover letter..."

                                            value={coverLetter}

                                            onChange={(e)=>
                                                setCoverLetter(e.target.value)
                                            }

                                        />

                                    </div>

                                    <button
                                        className="btn btn-primary px-4"
                                    >

                                        Submit Application

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </FrontendLayout>

    );

}