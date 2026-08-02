export default function WhyChooseUs() {

    const features = [

        {
            icon: "bi-lightning-charge-fill",
            title: "Fast Hiring",
            desc: "Connect with employers and get hired quickly."
        },

        {
            icon: "bi-building",
            title: "Top Companies",
            desc: "Work with trusted and verified companies."
        },

        {
            icon: "bi-shield-check",
            title: "Secure Platform",
            desc: "Your information is safe and protected."
        },

        {
            icon: "bi-person-check",
            title: "Easy Apply",
            desc: "Apply to jobs with just one click."
        }

    ];

    return (

        <section className="section-padding bg-light">

            <div className="container">

                <div className="text-center mb-5">

                    <h2 className="section-title">

                        Why Choose CareerBridge?

                    </h2>

                    <p className="section-subtitle">

                        Everything you need to build your career in one place.

                    </p>

                </div>

                <div className="row g-4">

                    {features.map((item, index) => (

                        <div
                            className="col-lg-3 col-md-6"
                            key={index}
                        >

                            <div className="feature-card">

                                <div className="feature-icon">

                                    <i className={`bi ${item.icon}`}></i>

                                </div>

                                <h5 className="fw-bold mt-4">

                                    {item.title}

                                </h5>

                                <p className="text-muted mb-0">

                                    {item.desc}

                                </p>

                            </div>

                        </div>

                    ))}

                </div>

            </div>

        </section>

    );

}