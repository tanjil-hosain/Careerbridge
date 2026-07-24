import React from 'react'
import { useForm } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('login'), {
            onFinish: () => reset('password'),
        });
    };

    return (
        <>
            {/*start content*/}
            <main className="authentication-content">
                <div className="container-fluid">
                    <div className="authentication-card">
                        <div className="card shadow rounded-0 overflow-hidden">
                            <div className="row g-0">
                                <div className="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                    <img src="assets/images/error/login-img.jpg" className="img-fluid" alt="" />
                                </div>
                                <div className="col-lg-6">
                                    <div className="card-body p-4 p-sm-5">
                                        <h5 className="card-title">Sign In</h5>
                                        <p className="card-text mb-5">See your growth and get consulting support!</p>
                                        <form onSubmit={submit} className="form-body">
                                            
                                            <div className="d-grid">
                                                <a className="btn btn-white radius-30" href="javascript:;"><span className="d-flex justify-content-center align-items-center">
                                                    <img className="me-2" src="assets/images/icons/search.svg" width={16} alt="" />
                                                    <span>Sign in with Google</span>
                                                </span>
                                                </a>
                                            </div>
                                            <div className="login-separater text-center mb-4"> <span>OR SIGN IN WITH
                                                EMAIL</span>
                                                <hr />
                                            </div>
                                            <div className="row g-3">
                                                <div className="col-12">
                                                    <label htmlFor="inputEmailAddress" className="form-label">Email Address</label>
                                                    <div className="ms-auto position-relative">
                                                        <div className="position-absolute top-50 translate-middle-y search-icon px-3">
                                                            <i className="bi bi-envelope-fill" /></div>
                                
                                                        <input id="email"
                                                            type="email"
                                                            name="email"
                                                            value={data.email}
                                                            className="form-control ps-5"
                                                            autoComplete="username"
                                                            isFocused={true}
                                                            onChange={(e) => setData('email', e.target.value)} />
                                                    </div>
                                                </div>
                                                <div className="col-12">
                                                    <label htmlFor="inputChoosePassword" className="form-label">Enter
                                                        Password</label>
                                                    <div className="ms-auto position-relative">
                                                        <div className="position-absolute top-50 translate-middle-y search-icon px-3">
                                                            <i className="bi bi-lock-fill" /></div>

                                                        <input id="password"
                                                            type="password"
                                                            name="password"
                                                            value={data.password}
                                                            className="form-control ps-5"
                                                            autoComplete="current-password"
                                                            onChange={(e) => setData('password', e.target.value)} />
                                                    </div>
                                                </div>
                                                <div className="col-6">
                                                    <div className="form-check form-switch">
                                                        <input className="form-check-input" 
                                                            type="checkbox" 
                                                            id="flexSwitchCheckChecked" 
                                                            checked={data.remember}
                                                            onChange={(e) => setData('remember', e.target.checked)} />
                                                        <label className="form-check-label" htmlFor="flexSwitchCheckChecked">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div className="col-6 text-end"> <a href="authentication-forgot-password.html">Forgot Password ?</a>
                                                </div>
                                                <div className="col-12">
                                                    <div className="d-grid">
                                                        <button type="submit" className="btn btn-primary radius-30" disabled={processing}>Sign
                                                            In</button>
                                                    </div>
                                                </div>
                                                <div className="col-12">
                                                    <p className="mb-0">Don't have an account yet? <a href={route('register')}>Sign up here</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </>
    )
}