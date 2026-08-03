import FrontendLayout from "@/Layouts/FrontendLayout";
import { useForm } from "@inertiajs/react";

export default function Apply({ job, hasApplied }) {
    const {
        data,
        setData,
        post,
        processing,
        errors,
        reset,
    } = useForm({
        resume: null,
        cover_letter: "",
    });

    const submit = (e) => {
        e.preventDefault();

        post(route("jobs.apply.store", job.slug), {
            onSuccess: () => {
                reset("resume", "cover_letter");
            },
        });
    };

    return (
        <FrontendLayout>
            <div className="container py-5">
                <div className="row justify-content-center">
                    <div className="col-lg-8">
                        <div className="card shadow border-0 rounded-4">
                            <div className="card-body p-4">
                                <h2 className="fw-bold mb-2">
                                    Apply for {job.title}
                                </h2>
                                <p className="text-muted mb-4">
                                    {job.company?.company_name}
                                </p>

                                {hasApplied ? (
                                    <div className="alert alert-info py-4 text-center">
                                        <h4 className="alert-heading fw-bold">You have already applied!</h4>
                                        <p className="mb-0">
                                            You have successfully submitted your application for this position. Please check your dashboard for updates.
                                        </p>
                                    </div>
                                ) : (
                                    <form onSubmit={submit}>
                                        {/* Resume */}
                                        <div className="mb-4">
                                            <label className="form-label fw-semibold">
                                                Resume
                                            </label>
                                            <input
                                                type="file"
                                                name="resume"
                                                accept=".pdf,.doc,.docx"
                                                className={`form-control ${
                                                    errors.resume ? "is-invalid" : ""
                                                }`}
                                                onChange={(e) =>
                                                    setData("resume", e.target.files[0])
                                                }
                                            />
                                            {errors.resume && (
                                                <div className="invalid-feedback">
                                                    {errors.resume}
                                                </div>
                                            )}
                                            <small className="text-muted">
                                                PDF, DOC, DOCX (Max 2MB)
                                            </small>
                                        </div>

                                        {/* Cover Letter */}
                                        <div className="mb-4">
                                            <label className="form-label fw-semibold">
                                                Cover Letter
                                            </label>
                                            <textarea
                                                rows="7"
                                                name="cover_letter"
                                                className={`form-control ${
                                                    errors.cover_letter
                                                        ? "is-invalid"
                                                        : ""
                                                }`}
                                                placeholder="Write your cover letter..."
                                                value={data.cover_letter}
                                                onChange={(e) =>
                                                    setData(
                                                        "cover_letter",
                                                        e.target.value
                                                    )
                                                }
                                            />
                                            {errors.cover_letter && (
                                                <div className="invalid-feedback">
                                                    {errors.cover_letter}
                                                </div>
                                            )}
                                        </div>

                                        <button
                                            type="submit"
                                            className="btn btn-primary px-4"
                                            disabled={processing}
                                        >
                                            {processing
                                                ? "Submitting..."
                                                : "Submit Application"}
                                        </button>
                                    </form>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </FrontendLayout>
    );
}