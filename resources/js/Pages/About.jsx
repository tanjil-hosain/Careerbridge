import React from "react";
import { Head } from "@inertiajs/react";
import FrontendLayout from '@/Layouts/FrontendLayout'

export default function About() {
    return (
        <FrontendLayout>
            <Head title="About Us" />
            <div className="container py-5">
                <div className="row justify-content-center">
                    <div className="col-md-8 text-center">
                        <h1 className="fw-bold mb-4">About CareerBridge</h1>
                        <p className="text-muted lead">
                            CareerBridge is your ultimate platform to connect talented job seekers with top-tier companies. We make hiring and job hunting seamless, fast, and reliable.
                        </p>
                    </div>
                </div>
            </div>
        </FrontendLayout>
    );
}