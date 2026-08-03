import { router } from "@inertiajs/react";
import { useState } from "react";

export default function FilterSidebar({ categories, filters }) {

    const [keyword, setKeyword] = useState(filters.keyword || "");
    const [category, setCategory] = useState(filters.category || "");
    const [location, setLocation] = useState(filters.location || "");
    const [jobType, setJobType] = useState(filters.job_type || "");

    const handleFilter = (e) => {
        e.preventDefault();

        router.get(route("jobs.index"), {
            keyword,
            category,
            location,
            job_type: jobType,
        }, {
            preserveState: true,
            replace: true,
        });
    };

    const resetFilter = () => {

        setKeyword("");
        setCategory("");
        setLocation("");
        setJobType("");

        router.get(route("jobs.index"));
    };

    return (

        <div className="card shadow-sm border-0 rounded-4">

            <div className="card-body">

                <h5 className="fw-bold mb-4">
                    Filter Jobs
                </h5>

                <form onSubmit={handleFilter}>

                    {/* Keyword */}

                    <div className="mb-3">

                        <label className="form-label">

                            Keyword

                        </label>

                        <input
                            type="text"
                            className="form-control"
                            placeholder="Laravel Developer"
                            value={keyword}
                            onChange={(e)=>setKeyword(e.target.value)}
                        />

                    </div>

                    {/* Category */}

                    <div className="mb-3">

                        <label className="form-label">

                            Category

                        </label>

                        <select
                            className="form-select"
                            value={category}
                            onChange={(e)=>setCategory(e.target.value)}
                        >

                            <option value="">

                                All Categories

                            </option>

                            {categories.map(cat=>(
                                <option
                                    key={cat.id}
                                    value={cat.id}
                                >
                                    {cat.name}
                                </option>
                            ))}

                        </select>

                    </div>

                    {/* Location */}

                    <div className="mb-3">

                        <label className="form-label">

                            Location

                        </label>

                        <input
                            type="text"
                            className="form-control"
                            placeholder="Dhaka"
                            value={location}
                            onChange={(e)=>setLocation(e.target.value)}
                        />

                    </div>

                    {/* Job Type */}

                    <div className="mb-4">

                        <label className="form-label">

                            Job Type

                        </label>

                        <select
                            className="form-select"
                            value={jobType}
                            onChange={(e)=>setJobType(e.target.value)}
                        >

                            <option value="">All</option>

                            <option value="Full Time">
                                Full Time
                            </option>

                            <option value="Part Time">
                                Part Time
                            </option>

                            <option value="Remote">
                                Remote
                            </option>

                            <option value="Internship">
                                Internship
                            </option>

                        </select>

                    </div>

                    <button
                        className="btn btn-primary w-100 mb-2"
                    >
                        Apply Filter
                    </button>

                    <button
                        type="button"
                        className="btn btn-outline-secondary w-100"
                        onClick={resetFilter}
                    >
                        Reset
                    </button>

                </form>

            </div>

        </div>

    );

}