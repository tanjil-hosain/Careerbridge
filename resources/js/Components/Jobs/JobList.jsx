import JobCard from "./JobCard";

export default function JobList({ jobs }) {

    if (jobs.data.length === 0) {
        return (
            <div className="card shadow-sm border-0 rounded-4">

                <div className="card-body py-5 text-center">

                    <i className="bi bi-search display-4 text-muted"></i>

                    <h4 className="mt-3">

                        No Jobs Found

                    </h4>

                    <p className="text-muted">

                        Try changing your search or filter.

                    </p>

                </div>

            </div>
        );
    }

    return (

        <div className="row g-4">

            {jobs.data.map((job) => (

                <div
                    className="col-lg-6"
                    key={job.id}
                >

                    <JobCard job={job} />

                </div>

            ))}

        </div>

    );
}