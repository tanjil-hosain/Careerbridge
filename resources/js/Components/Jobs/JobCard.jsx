import { Link, router } from "@inertiajs/react";

export default function JobCard({ job }) {
    
    // Save ba remove korar handler function
    const handleSaveToggle = (jobId) => {
        console.log("Button clicked, Job ID:", jobId); // Eta diye check korbo console e print hoy kina

        router.post('/job/save-toggle', { job_id: jobId }, {
            preserveScroll: true,
            onSuccess: () => {
                console.log("Successfully toggled!");
            },
            onError: (errors) => {
                console.log("Error:", errors);
            }
        });
    };

    return (
        <div className="card border-0 shadow-sm h-100 job-card">
            <div className="card-body">
                {/* Header */}
                <div className="d-flex justify-content-between align-items-start mb-3">
                    <div className="d-flex align-items-center">
                        <img
                            src={`/storage/${job.company?.logo}`}
                            className="company-logo"
                            alt="Company Logo"
                        />
                        <div>
                            <h6 className="fw-bold mb-1">
                                {job.title}
                            </h6>
                            <small className="text-muted">
                                {job.company?.company_name}
                            </small>
                        </div>
                    </div>

                    <span className="badge bg-primary">
                        {job.job_type}
                    </span>
                </div>

                {/* Info */}
                <div className="mb-2 text-muted">
                    <i className="bi bi-geo-alt me-2"></i>
                    {job.location}
                </div>

                <div className="mb-2 text-success fw-semibold">
                    <i className="bi bi-cash-stack me-2"></i>
                    {job.salary}
                </div>

                <div className="mb-3 text-muted">
                    <i className="bi bi-calendar-event me-2"></i>
                    Deadline : {job.deadline}
                </div>

                {/* Footer */}
                <div className="d-flex gap-2">
                    <Link
                        href={`/jobs/${job.slug}`}
                        className="btn btn-primary flex-grow-1"
                    >
                        View Details
                    </Link>

                    {/* Bookmark / Save Button */}
                    <button
                        type="button"
                        onClick={() => handleSaveToggle(job.id)}
                        className="btn btn-outline-secondary"
                        title={job.is_saved ? "Remove from Saved" : "Save Job"}
                    >
                        <i className={job.is_saved ? "bi bi-bookmark-fill text-primary" : "bi bi-bookmark"}></i>
                    </button>
                </div>
            </div>
        </div>
    );
}