import React, { useState } from "react";
import { Head, useForm } from "@inertiajs/react";
import FrontendLayout from "@/Layouts/FrontendLayout";

export default function Contact() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: "",
        email: "",
        message: "",
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('contact.store'), {
            onSuccess: () => reset(),
        });
    };

    return (
        <FrontendLayout>
            <Head title="Contact Us" />
            <div className="container py-5">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <h2 className="fw-bold mb-4 text-center">Get in Touch</h2>
                        
                        <form onSubmit={submit} className="card border-0 shadow-sm p-4">
                            <div className="mb-3">
                                <label className="form-label">Name</label>
                                <input
                                    type="text"
                                    className="form-control"
                                    value={data.name}
                                    onChange={(e) => setData('name', e.target.value)}
                                />
                                {errors.name && <div className="text-danger small mt-1">{errors.name}</div>}
                            </div>

                            <div className="mb-3">
                                <label className="form-label">Email</label>
                                <input
                                    type="email"
                                    className="form-control"
                                    value={data.email}
                                    onChange={(e) => setData('email', e.target.value)}
                                />
                                {errors.email && <div className="text-danger small mt-1">{errors.email}</div>}
                            </div>

                            <div className="mb-3">
                                <label className="form-label">Message</label>
                                <textarea
                                    className="form-control"
                                    rows="4"
                                    value={data.message}
                                    onChange={(e) => setData('message', e.target.value)}
                                ></textarea>
                                {errors.message && <div className="text-danger small mt-1">{errors.message}</div>}
                            </div>

                            <button type="submit" className="btn btn-primary w-100" disabled={processing}>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </FrontendLayout>
    );
}