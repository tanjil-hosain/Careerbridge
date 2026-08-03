import FrontendLayout from "@/Layouts/FrontendLayout";
import JobDetails from "@/Components/Jobs/JobDetails";
import CompanyInfo from "@/Components/Jobs/CompanyInfo";
import RelatedJobs from "@/Components/Jobs/RelatedJobs";

export default function Show({

    job,

    relatedJobs

}) {

    return (

        <FrontendLayout>

            <div className="container py-5">

                <div className="row">

                    <div className="col-lg-8">

                        <JobDetails job={job} />

                    </div>

                    <div className="col-lg-4">

                        <CompanyInfo company={job.company} />

                    </div>

                </div>

                <RelatedJobs jobs={relatedJobs} />

            </div>

        </FrontendLayout>

    );

}