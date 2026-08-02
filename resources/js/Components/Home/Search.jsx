import { useState } from "react";

export default function Search({ categories }) {

    const [keyword, setKeyword] = useState("");
    const [category, setCategory] = useState("");
    const [location, setLocation] = useState("");

    const handleSearch = (e) => {
        e.preventDefault();

        console.log({
            keyword,
            category,
            location,
        });
    };

    return (
        <section className="search-section">

            <div className="container">

                <div className="card shadow border-0 rounded-4">

                    <div className="card-body p-4">

                        <form onSubmit={handleSearch}>

                            <div className="row g-3 align-items-end">

                                <div className="col-lg-4">

                                    <label className="form-label fw-semibold">
                                        Job Title
                                    </label>

                                    <input
                                        type="text"
                                        className="form-control"
                                        placeholder="Laravel Developer"
                                        value={keyword}
                                        onChange={(e) =>
                                            setKeyword(e.target.value)
                                        }
                                    />

                                </div>

                                <div className="col-lg-3">

                                    <label className="form-label fw-semibold">
                                        Category
                                    </label>

                                    <select
                                        className="form-select"
                                        value={category}
                                        onChange={(e) =>
                                            setCategory(e.target.value)
                                        }
                                    >

                                        <option value="">
                                            All Categories
                                        </option>

                                        {categories.map((cat) => (
                                            <option key={cat.id} value={cat.id}>
                                                {cat.name}
                                            </option>
                                        ))}

                                    </select>

                                </div>

                                <div className="col-lg-3">

                                    <label className="form-label fw-semibold">
                                        Location
                                    </label>

                                    <input
                                        type="text"
                                        className="form-control"
                                        placeholder="Dhaka"
                                        value={location}
                                        onChange={(e) =>
                                            setLocation(e.target.value)
                                        }
                                    />

                                </div>

                                <div className="col-lg-2 d-grid">

                                    <button
                                        className="btn btn-primary"
                                        type="submit"
                                    >

                                        <i className="bi bi-search me-2"></i>

                                        Search

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </section>
    );
}