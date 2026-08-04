import React from 'react';

import { Head } from '@inertiajs/react';
import FrontendLayout from '@/Layouts/FrontendLayout';
import JobCard from '@/Components/Jobs/JobCard';

export default function Index({ savedJobs }) {
    return (
        <FrontendLayout>
            <div className="container py-5">
                <Head title="Saved Jobs" />

                <h2 className="mb-4 fw-bold">My Saved Jobs ({savedJobs.length})</h2>

                {savedJobs.length === 0 ? (
                    <div className="text-center py-5 bg-white rounded shadow-sm">
                        <p className="text-muted">You haven't saved any jobs yet.</p>
                    </div>
                ) : (
                    <div className="row g-4">
                        {savedJobs.map((item) => {

                            const jobData = { ...item.job, is_saved: true };

                            return (
                                <div className="col-md-4" key={item.id}>
                                    <JobCard job={jobData} />
                                </div>
                            );
                        })}
                    </div>
                )}
            </div>
        </FrontendLayout>
    );
}