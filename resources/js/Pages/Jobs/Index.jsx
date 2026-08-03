import FrontendLayout from "@/Layouts/FrontendLayout";
import FilterSidebar from "@/Components/Jobs/FilterSidebar";
import JobCard from "@/Components/Jobs/JobCard";

export default function Index({

    jobs,
    categories,
    filters

}){

    return(

        <FrontendLayout>

            <div className="container py-5">

                <div className="row">

                    <div className="col-lg-3 mb-4">

                        <FilterSidebar

                            categories={categories}

                            filters={filters}

                        />

                    </div>

                    <div className="col-lg-9">

                        <div className="row g-4">

                            {jobs.data.map(job=>(

                                <div
                                    className="col-md-6"
                                    key={job.id}
                                >

                                    <JobCard job={job}/>

                                </div>

                            ))}

                        </div>

                    </div>

                </div>

            </div>

        </FrontendLayout>

    )

}