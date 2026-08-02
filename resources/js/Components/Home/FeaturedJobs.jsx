import JobCard from "@/Components/Jobs/JobCard";

export default function FeaturedJobs({ jobs }) {

    return (

        <section className="section-padding">

            <div className="container">

                <div className="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h2 className="section-title">

                            Featured Jobs

                        </h2>

                        <p className="text-muted">

                            Latest opportunities from top companies

                        </p>

                    </div>

                </div>

                <div className="row g-4">

                    {jobs.map((job) => (

                        <div
                            className="col-lg-4 col-md-6"
                            key={job.id}
                        >

                            <JobCard job={job} />

                        </div>

                    ))}

                </div>

            </div>

        </section>

    );

}