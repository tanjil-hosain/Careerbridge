<!doctype html>
<html lang="en" class="minimal-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('') }}assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet" />
    <link href="{{ asset('') }}assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('') }}assets/css/pace.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <title>CareerBridge_Register</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->

        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                <img src="assets/images/error/login-img.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">



                                    <h5 class="card-title">Sign Up</h5>
                                    <p class="card-text mb-4">See your growth and get consulting support!</p>

                                    <form action="{{ route('register') }}" method="POST" class="form-body">
                                        @csrf

                                        <!-- Role Selection Section -->
                                        <div class="mb-4">
                                            <label class="form-label fw-bold text-dark">Select Your Account Type</label>
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" name="role"
                                                        id="jobSeekerRole" value="job_seeker" checked
                                                        autocomplete="off">
                                                    <label class="btn btn-outline-primary w-100 radius-30 py-2"
                                                        for="jobSeekerRole">
                                                        <i class="bi bi-person-badge me-1"></i> Job Seeker
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" class="btn-check" name="role"
                                                        id="employerRole" value="employer" autocomplete="off">
                                                    <label class="btn btn-outline-primary w-100 radius-30 py-2"
                                                        for="employerRole">
                                                        <i class="bi bi-briefcase me-1"></i> Employer
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-grid">
                                            <a class="btn btn-white radius-30"
                                                href="{{ route('social.redirect', 'google') }}">
                                                <span class="d-flex justify-content-center align-items-center">
                                                    <img class="me-2" src="assets/images/icons/search.svg"
                                                        width="16" alt="">
                                                    <span>Sign up with Google</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH
                                                EMAIL</span>
                                            <hr>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-12 ">
                                                <label for="inputName" class="form-label">Name</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-person-circle"></i>
                                                    </div>
                                                    <input type="text" class="form-control radius-30 ps-5"
                                                        id="inputName" placeholder="Enter Name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email
                                                    Address</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <input type="email" class="form-control radius-30 ps-5"
                                                        id="inputEmailAddress" placeholder="Email Address"
                                                        name="email">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter
                                                    Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" class="form-control radius-30 ps-5"
                                                        id="inputChoosePassword" placeholder="Enter Password"
                                                        name="password">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputConfirmPassword" class="form-label">Enter Confirm
                                                    Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" class="form-control radius-30 ps-5"
                                                        id="inputConfirmPassword" placeholder="Enter Password"
                                                        name="password_confirmation">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">I
                                                        Agree to the Terms & Conditions</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary radius-30">Sign
                                                        Up</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="mb-0">Already have an account? <a
                                                        href="{{ route('login') }}">Sign in here</a></p>
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


        <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="{{ asset('') }}assets/js/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/js/pace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (session('success'))
        <script>
            toastr.success(@json(session('success')));
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error(@json(session('error')));
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error(@json($error));
            </script>
        @endforeach
    @endif


</body>

<script>
    'undefined' === typeof _trfq || (window._trfq = []);
    'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({
        'tccl.baseHost': 'secureserver.net'
    }, {
        'ap': 'cpsh-oh'
    }, {
        'server': 'p3plzcpnl509132'
    }, {
        'dcenter': 'p3'
    }, {
        'cp_id': '10399385'
    }, {
        'cp_cl': '8'
    }) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
</script>
<script src='../../../../../img1.wsimg.com/signals/js/clients/scc-c2/scc-c2.min.js'></script>
<!-- Mirrored from codervent.com/skodash/demo/collapsed-menu/ltr/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jul 2026 13:58:47 GMT -->

</html>
