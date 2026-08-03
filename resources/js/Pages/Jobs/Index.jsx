import FrontendLayout from "@/Layouts/FrontendLayout";
import FilterSidebar from "@/Components/Jobs/FilterSidebar";
import JobList from "@/Components/Jobs/JobList";

export default function Index({

    jobs,
    categories,
    filters

}) {

    return (

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

                        <JobList jobs={jobs} />

                    </div>

                </div>

            </div>

        </FrontendLayout>

    );

}