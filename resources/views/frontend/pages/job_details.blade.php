@extends('frontend.layouts.master')

@section('content')
    <main class="main">
        <section class="section-box">
            <div class="box-head-single">
                <div class="container">
                    <h3>{{ $job->title }}</h3>>
                </div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="single-image-feature">
                            <figure><img alt="jobhub" src="{{ asset('storage/' . $job->company->logo) }}"
                                    class="img-rd-15" />
                            </figure>
                        </div>
                        <div class="content-single">
                            <h5>{{ $job->company->company_name }}</h5>
                            <p class="text-break">
                                {{ $job->company->description }}
                            </p>

                            <h5>Essential Knowledge, Skills, and Experience</h5>
                            <ul>
                                <li class="text-break">{{ $job->description }}
                                </li>

                            </ul>
                            <h5>Requirements</h5>
                            <p class="text-break">
                                {{ $job->requirements }}
                            </p>

                        </div>
                        <div class="author-single">
                            <span>{{ $job->company->company_name }}</span>
                        </div>
                        <div class="single-apply-jobs">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    @guest
                                        <a href="{{ route('login') }}" class="btn btn-default ">
                                            Apply Now
                                        </a>
                                    @endguest

                                    @auth

                                        @if (auth()->user()->role == 'job_seeker')
                                            @if ($alreadyApplied)
                                                <button class="btn btn-success" disabled>
                                                    <i class="fi-rr-check me-2"></i>
                                                    Already Applied
                                                </button>
                                            @else
                                                <a href="{{ route('job_seeker.application.create', $job) }}"
                                                    class="btn btn-default w-100">
                                                    Apply Now
                                                </a>
                                            @endif
                                        @elseif(auth()->user()->role->name == 'employer')
                                            <button class="btn btn-secondary w-100" disabled>
                                                Employers Can't Apply
                                            </button>
                                        @else
                                            <button class="btn btn-secondary w-100" disabled>
                                                Admin Can't Apply
                                            </button>
                                        @endif

                                    @endauth
                                    <a href="#" class="btn btn-border">Save job</a>
                                </div>
                                <div class="col-md-7 text-lg-end social-share">
                                    <a href="#" class="btn btn-border btn-sm mr-10"><img alt="jobhub"
                                            src="{{ asset('') }}frontend_assets/imgs/theme/icons/share-fb.svg" />
                                        Share</a>
                                    <a href="#" class="btn btn-border btn-sm mr-10"><img alt="jobhub"
                                            src="{{ asset('') }}frontend_assets/imgs/theme/icons/share-tw.svg" />
                                        Tweet</a>
                                    <a href="#" class="btn btn-border btn-sm"><img alt="jobhub"
                                            src="{{ asset('') }}frontend_assets/imgs/theme/icons/share-pinterest.svg" />
                                        Pin</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-recent-jobs">
                            <h4 class="heading-border"><span>Recent jobs</span></h4>
                            <div class="list-recent-jobs">
                                <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                    <div class="card-job-top">
                                        <div class="card-job-top--image">
                                            <figure><img alt="jobhub"
                                                    src="{{ asset('') }}frontend_assets/imgs/page/job/digital.png" />
                                            </figure>
                                        </div>
                                        <div class="card-job-top--info">
                                            <h6 class="card-job-top--info-heading"><a href="job-single.html">Digital
                                                    Experience Designer</a></h6>
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <a href="employers-grid.html"><span
                                                            class="card-job-top--company">AliStudio, Inc</span></a>
                                                    <span class="card-job-top--location text-sm"><i
                                                            class="fi-rr-marker"></i>
                                                        New York, NY</span>
                                                    <span class="card-job-top--type-job text-sm"><i
                                                            class="fi-rr-briefcase"></i>
                                                        Full time</span>
                                                    <span class="card-job-top--post-time text-sm"><i
                                                            class="fi-rr-clock"></i> 3
                                                        mins ago</span>
                                                </div>
                                                <div class="col-lg-5 text-lg-end">
                                                    <span class="card-job-top--price">$500<span>/Hour</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-job-description mt-20">
                                        We want someone who has been doing this for a solid 2-3 years. We want someone
                                        who can
                                        demonstrate an extremely strong portfolio. Create deliverables for your product
                                        area
                                        (for example competitive analyses, user flows.
                                    </div>
                                    <div class="card-job-bottom mt-25">
                                        <div class="row">
                                            <div class="col-lg-9 col-sm-8 col-12">
                                                <a href="job-grid.html"
                                                    class="btn btn-small background-urgent btn-pink mr-5">Urgent</a>
                                                <a href="job-grid-2.html"
                                                    class="btn btn-small background-blue-light mr-5">Senior</a>
                                                <a href="job-grid.html" class="btn btn-small background-6 disc-btn">Full
                                                    time</a>
                                            </div>
                                            <div class="col-lg-3 col-sm-4 col-12 text-end">
                                                <span><img
                                                        src="{{ asset('') }}frontend_assets/imgs/theme/icons/shield-check.svg"
                                                        alt="jobhub" /></span>
                                                <span class="ml-5"><img
                                                        src="{{ asset('') }}frontend_assets/imgs/theme/icons/bookmark.svg"
                                                        alt="jobhub" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                    <div class="card-job-top">
                                        <div class="card-job-top--image">
                                            <figure><img alt="jobhub"
                                                    src="{{ asset('') }}frontend_assets/imgs/page/job/n-digital.png" />
                                            </figure>
                                        </div>
                                        <div class="card-job-top--info">
                                            <h6 class="card-job-top--info-heading"><a href="job-single.html">Digital
                                                    Experience Designer</a></h6>
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <a href="employers-grid.html"><span
                                                            class="card-job-top--company">AliStudio, Inc</span></a>
                                                    <span class="card-job-top--location text-sm"><i
                                                            class="fi-rr-marker"></i>
                                                        New York, NY</span>
                                                    <span class="card-job-top--type-job text-sm"><i
                                                            class="fi-rr-briefcase"></i>
                                                        Full time</span>
                                                    <span class="card-job-top--post-time text-sm"><i
                                                            class="fi-rr-clock"></i> 3
                                                        mins ago</span>
                                                </div>
                                                <div class="col-lg-5  text-lg-end">
                                                    <span class="card-job-top--price">$500<span>/Hour</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-job-description mt-20">
                                        We want someone who has been doing this for a solid 2-3 years. We want someone
                                        who can
                                        demonstrate an extremely strong portfolio. Create deliverables for your product
                                        area
                                        (for example competitive analyses, user flows.
                                    </div>
                                    <div class="card-job-bottom mt-25">
                                        <div class="row">
                                            <div class="col-lg-9 col-sm-8 col-12">
                                                <a href="job-grid.html"
                                                    class="btn btn-small background-urgent btn-pink mr-5">Urgent</a>
                                                <a href="job-grid-2.html"
                                                    class="btn btn-small background-blue-light mr-5">Senior</a>
                                                <a href="job-grid.html" class="btn btn-small background-6 disc-btn">Full
                                                    time</a>
                                            </div>
                                            <div class="col-lg-3 col-sm-4 col-12 text-end">
                                                <span><img
                                                        src="{{ asset('') }}frontend_assets/imgs/theme/icons/shield-check.svg"
                                                        alt="jobhub" /></span>
                                                <span class="ml-5"><img
                                                        src="{{ asset('') }}frontend_assets/imgs/theme/icons/bookmark.svg"
                                                        alt="jobhub" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                    <div class="card-job-top">
                                        <div class="card-job-top--image">
                                            <figure><img alt="jobhub"
                                                    src="{{ asset('') }}frontend_assets/imgs/page/job/n-digital2.png" />
                                            </figure>
                                        </div>
                                        <div class="card-job-top--info">
                                            <h6 class="card-job-top--info-heading"><a href="job-single.html">Digital
                                                    Experience Designer</a></h6>
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <a href="employers-grid.html"><span
                                                            class="card-job-top--company">AliStudio, Inc</span></a>
                                                    <span class="card-job-top--location text-sm"><i
                                                            class="fi-rr-marker"></i>
                                                        New York, NY</span>
                                                    <span class="card-job-top--type-job text-sm"><i
                                                            class="fi-rr-briefcase"></i>
                                                        Full time</span>
                                                    <span class="card-job-top--post-time text-sm"><i
                                                            class="fi-rr-clock"></i> 3
                                                        mins ago</span>
                                                </div>
                                                <div class="col-lg-5 text-lg-end">
                                                    <span class="card-job-top--price">$500<span>/Hour</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-job-description mt-20">
                                        We want someone who has been doing this for a solid 2-3 years. We want someone
                                        who can
                                        demonstrate an extremely strong portfolio. Create deliverables for your product
                                        area
                                        (for example competitive analyses, user flows.
                                    </div>
                                    <div class="card-job-bottom mt-25">
                                        <div class="row">
                                            <div class="col-lg-9 col-sm-8 col-12">
                                                <a href="job-grid.html"
                                                    class="btn btn-small background-urgent btn-pink mr-5">Urgent</a>
                                                <a href="job-grid-2.html"
                                                    class="btn btn-small background-blue-light mr-5">Senior</a>
                                                <a href="job-grid.html" class="btn btn-small background-6 disc-btn">Full
                                                    time</a>
                                            </div>
                                            <div class="col-lg-3 col-sm-4 col-12 text-end">
                                                <span><img
                                                        src="{{ asset('') }}frontend_assets/imgs/theme/icons/shield-check.svg"
                                                        alt="jobhub" /></span>
                                                <span class="ml-5"><img
                                                        src="{{ asset('') }}frontend_assets/imgs/theme/icons/bookmark.svg"
                                                        alt="jobhub" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                    <div class="card-job-top">
                                        <div class="card-job-top--image">
                                            <figure><img alt="jobhub"
                                                    src="{{ asset('') }}frontend_assets/imgs/page/job/digital.png" />
                                            </figure>
                                        </div>
                                        <div class="card-job-top--info">
                                            <h6 class="card-job-top--info-heading"><a
                                                    href="job-single.html">{{ $job->title }}</a></h6>
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <a href="employers-grid.html"><span
                                                            class="card-job-top--company">AliStudio, Inc</span></a>
                                                    <span class="card-job-top--location text-sm"><i
                                                            class="fi-rr-marker"></i>
                                                        {{ $job->location }}</span>
                                                    <span class="card-job-top--type-job text-sm"><i
                                                            class="fi-rr-briefcase"></i>
                                                        {{ $job->job_type }}</span>
                                                    <span class="card-job-top--post-time text-sm"><i
                                                            class="fi-rr-clock"></i> Deadline: {{ $job->deadline }}</span>
                                                </div>
                                                <div class="col-lg-5 text-lg-end">
                                                    <span
                                                        class="card-job-top--price">{{ $job->salary }}<span>month</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-job-description mt-20">
                                        We want someone who has been doing this for a solid 2-3 years. We want someone
                                        who can
                                        demonstrate an extremely strong portfolio. Create deliverables for your product
                                        area
                                        (for example competitive analyses, user flows.
                                    </div>
                                    <div class="card-job-bottom mt-25">
                                        <div class="row">
                                            <div class="col-lg-9 col-sm-8 col-12">
                                                <a href="job-grid.html"
                                                    class="btn btn-small background-urgent btn-pink mr-5">Urgent</a>
                                                <a href="job-grid-2.html"
                                                    class="btn btn-small background-blue-light mr-5">Senior</a>
                                                <a href="job-grid.html" class="btn btn-small background-6 disc-btn">Full
                                                    time</a>
                                            </div>
                                            <div class="col-lg-3 col-sm-4 col-12 text-end">
                                                <span><img
                                                        src="{{ asset('') }}frontend_assets/imgs/theme/icons/shield-check.svg"
                                                        alt="jobhub" /></span>
                                                <span class="ml-5"><img
                                                        src="{{ asset('') }}frontend_assets/imgs/theme/icons/bookmark.svg"
                                                        alt="jobhub" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-20">
                                    <a href="job-grid.html" class="btn btn-default">Explore more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-shadow">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <figure><img alt="jobhub" src="{{ asset('storage/' . $job->company->logo) }}" />
                                    </figure>
                                    <div class="sidebar-info">
                                        <span class="sidebar-company">{{ $job->company->company_name }}</span>
                                        <span class="sidebar-website-text">{{ $job->company->website }}</span>
                                        <div class="dropdowm">
                                            <button class="btn btn-dots btn-dots-abs-right dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu dropdown-menu-light">
                                                <li><a class="dropdown-item" href="#">Contact</a></li>
                                                <li><a class="dropdown-item" href="#">Bookmark</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-description mt-15">
                                We're looking to add more product designers to our growing teams.
                            </div>
                            <div class="text-start mt-20">
                                <a href="#" class="btn btn-default mr-10">Apply now</a>
                                <a href="#" class="btn btn-border">Save job</a>
                            </div>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Job Type</span>
                                            <strong class="small-heading">{{ $job->job_type }}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Location</span>
                                            <strong class="small-heading">{{ $job->location }}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Salary</span>
                                            <strong class="small-heading">{{ $job->salary }}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Date posted</span>
                                            <strong class="small-heading">{{ $job->created_at }}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Deadline</span>
                                            <strong class="small-heading">{{ $job->deadline }}</strong>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-team-member pt-40">
                                <h6 class="small-heading">Team member</h6>
                                <div class="sidebar-list-member">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <figure><img alt="jobhub"
                                                        src="{{ asset('') }}frontend_assets/imgs/page/job-single/avatar1.png" />
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <figure><img alt="jobhub"
                                                        src="{{ asset('') }}frontend_assets/imgs/page/job-single/avatar2.png" />
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <figure><img alt="jobhub"
                                                        src="{{ asset('') }}frontend_assets/imgs/page/job-single/avatar3.png" />
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <figure><img alt="jobhub"
                                                        src="{{ asset('') }}frontend_assets/imgs/page/job-single/avatar4.png" />
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <figure><img alt="jobhub"
                                                        src="{{ asset('') }}frontend_assets/imgs/page/job-single/avatar5.png" />
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <figure><img alt="jobhub"
                                                        src="{{ asset('') }}frontend_assets/imgs/page/job-single/avatar6.png" />
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <figure><img alt="jobhub"
                                                        src="{{ asset('') }}frontend_assets/imgs/page/job-single/avatar7.png" />
                                                </figure>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <figure><img alt="jobhub"
                                                        src="{{ asset('') }}frontend_assets/imgs/page/job-single/avatar8.png" />
                                                </figure>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-team-member pt-40">
                                <h6 class="small-heading">Contact Info</h6>
                                <div class="info-address">
                                    <span><i class="fi-rr-marker"></i> <span>{{ $job->company->address }}</span></span>
                                    <span><i class="fi-rr-headset"></i> <span>{{ $job->company->phone }} </span></span>
                                    <span><i class="fi-rr-paper-plane"></i>{{ $job->company->email }} <span></span></span>
                                    <span><i class="fi-rr-time-fast"></i> <span>10:00 - 18:00, Mon - Sat </span></span>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-normal">
                            <div>
                                <h6 class="small-heading">Are you also hiring?</h6>
                                <ul class="ul-lists">
                                    <li><a href="#">Writing & Translation</a></li>
                                    <li><a href="#">Video & Animation</a></li>
                                    <li><a href="#">Music & Audio</a></li>
                                    <li><a href="#">Digital Marketing</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Programming & Tech</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-60">
            <div class="container">
                <div class="box-newsletter">
                    <h5 class="text-md-newsletter">Sign up to get</h5>
                    <h6 class="text-lg-newsletter">the latest jobs</h6>
                    <div class="box-form-newsletter mt-30">
                        <form class="form-newsletter">
                            <input type="text" class="input-newsletter" value=""
                                placeholder="contact.alithemes@gmail.com" />
                            <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="box-newsletter-bottom">
                    <div class="newsletter-bottom"></div>
                </div>
            </div>
        </section>
    </main>
@endsection
