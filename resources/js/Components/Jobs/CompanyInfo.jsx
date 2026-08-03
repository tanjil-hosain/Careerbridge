import { Link } from "@inertiajs/react";

export default function CompanyInfo({ company }) {

    return (

        <div className="card shadow-sm border-0 rounded-4 sticky-top">

            <div className="card-body p-4 text-center">

                <img
                    src={
                        company?.logo
                            ? `/storage/${company.logo}`
                            : "/assets/images/company.png"
                    }
                    className="company-info-logo mb-3"
                    alt=""
                />

                <h4 className="fw-bold">

                    {company?.company_name}

                </h4>


                <hr />

                <div className="text-start">

                    <p>

                        <i className="bi bi-geo-alt-fill text-danger me-2"></i>

                        {company?.address ?? "Not Available"}

                    </p>

                    <p>

                        <i className="bi bi-envelope-fill text-primary me-2"></i>

                        {company?.email ?? "Not Available"}

                    </p>

                    <p>

                        <i className="bi bi-telephone-fill text-success me-2"></i>

                        {company?.phone ?? "Not Available"}

                    </p>

                    <p>

                        <i className="bi bi-globe text-info me-2"></i>

                        {company?.website ?? "Not Available"}

                    </p>

                </div>

                <Link
                    href="#"
                    className="btn btn-outline-primary w-100 mt-3"
                >

                    View Company

                </Link>

            </div>

        </div>

    );

}