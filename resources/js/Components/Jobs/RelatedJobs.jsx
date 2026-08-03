import JobCard from "./JobCard";

export default function RelatedJobs({ jobs }) {

    if (jobs.length === 0) return null;

    return (

        <section className="mt-5">

            <div className="d-flex justify-content-between align-items-center mb-4">

                <h3 className="fw-bold">

                    Related Jobs

                </h3>

            </div>

            <div className="row">

                {jobs.map((job) => (

                    <div
                        className="col-lg-6"
                        key={job.id}
                    >

                        <JobCard job={job} />

                    </div>

                ))}

            </div>

        </section>

    );

}