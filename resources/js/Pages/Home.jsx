import React from 'react';
import { Link, useForm } from '@inertiajs/react';
import FrontendLayout from '@/Layouts/FrontendLayout';

export default function Home({ jobs, categories, companies }) {
  // const { data, setData, post, processing, reset } = useForm({
  //   email: '',
  // });

  // const handleSubscribe = (e) => {
  //   e.preventDefault();
  //   post('/newsletter-subscribe', {
  //     onSuccess: () => reset(),
  //   });
  // };

  return (
    <>
      <FrontendLayout>
        <main className="main">
          <section className="section-box">
            <div className="banner-hero hero-1">
              <div className="banner-inner">
                <div className="row">
                  <div className="col-lg-8">
                    <div className="block-banner">
                      <span className="text-small-primary text-small-primary--disk text-uppercase wow animate__animated animate__fadeInUp">Best
                        jobs place</span>
                      <h1 className="heading-banner wow animate__animated animate__fadeInUp">The Easiest Way to Get
                        Your New Job</h1>
                      <div className="banner-description mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Each month, more than 3 million job seekers turn to website in
                        their search for work, making over 140,000 applications every single day</div>
                      <div className="form-find mt-60 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <form>
                          <input type="text" className="form-input input-keysearch mr-10" placeholder="Job title, Company... " />
                          {/* <input type="text" class="form-input input-keysearch mr-10" placeholder="City, Postcode... " /> */}
                          <select className="form-input mr-10 select-active">
                            <option value>Location</option>
                            <option value="AX">Aland Islands</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AL">Albania</option>
                          </select>
                          <button className="btn btn-default btn-find">Find now</button>
                        </form>
                      </div>
                      <div className="list-tags-banner mt-60 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <strong>Popular Searches:</strong>
                        <a href="#">Designer</a>, <a href="#">Developer</a>, <a href="#">Web</a>, <a href="#">Engineer</a>, <a href="#">Senior</a>,
                      </div>
                    </div>
                  </div>
                  <div className="col-lg-4 col-md-6">
                    <div className="banner-imgs">
                      <img alt="jobhub" src="/frontend_assets/imgs/banner/banner.png" className="img-responsive shape-1" />
                      <span className="union-icon"><img alt="jobhub" src="/frontend_assets/imgs/banner/union.svg" className="img-responsive shape-3" /></span>
                      <span className="congratulation-icon"><img alt="jobhub" src="/frontend_assets/imgs/banner/congratulation.svg" className="img-responsive shape-2" /></span>
                      <span className="docs-icon"><img alt="jobhub" src="/frontend_assets/imgs/banner/docs.svg" className="img-responsive shape-2" /></span>
                      <span className="course-icon"><img alt="jobhub" src="/frontend_assets/imgs/banner/course.svg" className="img-responsive shape-3" /></span>
                      <span className="web-dev-icon"><img alt="jobhub" src="/frontend_assets/imgs/banner/web-dev.svg" className="img-responsive shape-3" /></span>
                      <span className="tick-icon"><img alt="jobhub" src="/frontend_assets/imgs/banner/tick.svg" className="img-responsive shape-3" /></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <div className="section-box wow animate__animated animate__fadeIn mt-70">
            <div className="container">
              <div className="box-swiper">
                <div className="swiper-container swiper-group-6">
                  <div className="swiper-wrapper pb-70 pt-5">
                    <div className="swiper-slide hover-up">
                      <div className="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="/frontend_assets/imgs/slider/logo/google.svg" /></a>
                      </div>
                    </div>
                    <div className="swiper-slide hover-up">
                      <div className="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="/frontend_assets/imgs/slider/logo/airbnb.svg" /></a>
                      </div>
                    </div>
                    <div className="swiper-slide hover-up">
                      <div className="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="/frontend_assets/imgs/slider/logo/dropbox.svg" /></a>
                      </div>
                    </div>
                    <div className="swiper-slide hover-up">
                      <div className="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="/frontend_assets/imgs/slider/logo/fedex.svg" /></a>
                      </div>
                    </div>
                    <div className="swiper-slide hover-up">
                      <div className="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="/frontend_assets/imgs/slider/logo/wallmart.svg" /></a>
                      </div>
                    </div>
                    <div className="swiper-slide hover-up">
                      <div className="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="/frontend_assets/imgs/slider/logo/hubspot.svg" /></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="swiper-button-next" />
                <div className="swiper-button-prev" />
              </div>
            </div>
          </div>
          <section className="section-box">
            <div className="container">
              <div className="row align-items-end">
                <div className="col-lg-7">
                  <h2 className="section-title mb-20 wow animate__animated animate__fadeInUp">Browse by category</h2>
                  <p className="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp">Find the type of work
                    you need, clearly defined and ready to start. Work begins as soon as you purchase and provide
                    requirements.</p>
                </div>
                <div className="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                  <a href="job-grid-2.html" className="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Browse
                    all</a>
                </div>
              </div>
              {/* categorys */}
              <div className="row mt-70">
                {categories && categories.map((category, index) => (
                  <div className="col-lg-3 col-md-6 col-sm-12 col-12" key={category.id || index}>
                    <div className="card-grid hover-up wow animate__animated animate__fadeInUp">
                      <div className="text-center">
                        <Link href={`/jobs?category=${category.id}`}>
                          <figure>
                            <img alt="jobhub" src="/frontend_assets/imgs/theme/icons/marketing.svg" />
                          </figure>
                        </Link>
                      </div>
                      <h5 className="text-center mt-20 card-heading">
                        <Link href={`/jobs?category=${category.id}`}>
                          {category.name}
                        </Link>
                      </h5>
                      <p className="text-center text-stroke-40 mt-20">
                        {category.job_count || (category.jobs ? category.jobs.length : 0)} Available Vacancy
                      </p>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </section>
          <section className="section-box mt-40">
            <div className="container">
              <div className="row align-items-end">
                <div className="col-lg-4">
                  <h2 className="section-title mb-20 wow animate__animated animate__fadeInUp">Recent Jobs</h2>
                  <p className="text-md-lh28 color-black-5wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    8 new
                    opportunities posted today!</p>
                </div>
                <div className="col-lg-8 text-xl-end text-start">
                  <ul className="nav nav-right float-xl-end float-start" role="tablist">
                    <li className="wow animate__animated animate__fadeIn" data-wow-delay=".1s"><button id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one-1" aria-selected="true" className="active">Design</button></li>
                    <li className="wow animate__animated animate__fadeIn" data-wow-delay=".2s"><button id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two-1" aria-selected="false">Marketing</button>
                    </li>
                    <li className="wow animate__animated animate__fadeIn" data-wow-delay=".3s"><button id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three-1" aria-selected="false">Design</button></li>
                    <li className="wow animate__animated animate__fadeIn" data-wow-delay=".4s"><button id="nav-tab-four-1" data-bs-toggle="tab" data-bs-target="#tab-four-1" type="button" role="tab" aria-controls="tab-four-1" aria-selected="false">Service</button></li>
                    <li className="wow animate__animated animate__fadeIn" data-wow-delay=".5s"><button id="nav-tab-five-1" data-bs-toggle="tab" data-bs-target="#tab-five-1" type="button" role="tab" aria-controls="tab-five-1" aria-selected="false">Health Care</button>
                    </li>
                    <li className="wow animate__animated animate__fadeIn" data-wow-delay=".6s"><button id="nav-tab-six-1" data-bs-toggle="tab" data-bs-target="#tab-six-1" type="button" role="tab" aria-controls="tab-six-1" aria-selected="false">Writing</button></li>
                  </ul>
                </div>
              </div>

              <div className="mt-70">
                <div className="tab-content" id="myTabContent-1">
                  <div
                    className="tab-pane fade show active"
                    id="tab-one-1"
                    role="tabpanel"
                    aria-labelledby="tab-one-1"
                  >
                    <div className="row">
                      {jobs?.map((job) => (
                        <div className="col-lg-4 col-md-6" key={job.id}>
                          <div className="card-grid-2 hover-up">
                            <div className="text-center card-grid-2-image">
                              <Link href={`/jobs/${job.id}`}>
                                <figure>
                                  <img
                                    src={
                                      job.company?.logo
                                        ? `/storage/${job.company.logo}`
                                        : "/frontend_assets/imgs/brands/brand-1.png"
                                    }
                                    alt="jobhub"
                                  />
                                </figure>
                              </Link>

                              <label className="btn-urgent">💼 Hiring</label>
                            </div>

                            <div className="card-block-info">
                              <div className="row">
                                <div className="col-lg-7 col-6">
                                  <Link href="#" className="card-2-img-text">
                                    <span className="card-grid-2-img-small">
                                      <img
                                        src={
                                          job.company?.logo
                                            ? `/storage/${job.company.logo}`
                                            : "/frontend_assets/imgs/brands/brand-1.png"
                                        }
                                        alt="jobhub"
                                      />
                                    </span>

                                    <span>{job.company?.company_name}</span>
                                  </Link>
                                </div>

                                <div className="col-lg-5 col-6 text-end">
                                  <span className="btn btn-grey-small disc-btn">
                                    {job.job_type}
                                  </span>
                                </div>
                              </div>

                              <h5 className="mt-20">
                                <Link href={`/jobs/${job.id}`}>
                                  {job.title}
                                </Link>
                              </h5>

                              <div className="mt-15">
                                <span className="card-time">
                                  {job.created_at
                                    ? new Date(job.created_at).toLocaleDateString()
                                    : "Recently"}
                                </span>

                                <span className="card-location">
                                  {job.location}
                                </span>
                              </div>

                              <div className="card-2-bottom mt-30">
                                <div className="row">
                                  <div className="col-lg-7 col-8">
                                    <span className="card-text-price">
                                      {job.salary}
                                      <span>/Month</span>
                                    </span>
                                  </div>

                                  <div className="col-lg-5 col-4 text-end">
                                    <span>
                                      <img
                                        src="/frontend_assets/imgs/theme/icons/shield-check.svg"
                                        alt="jobhub"
                                      />
                                    </span>

                                    <span className="ml-5">
                                      <img
                                        src="/frontend_assets/imgs/theme/icons/bookmark.svg"
                                        alt="jobhub"
                                      />
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section className="section-box mt-50 mb-70 bg-patern">
            <div className="container">
              <div className="row">
                <div className="col-lg-6 col-sm-12">
                  <div className="content-job-inner">
                    <h2 className="section-title heading-lg wow animate__animated animate__fadeInUp">The #1 Job Board
                      for Graphic Design Jobs</h2>
                    <div className="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp">Search and
                      connect with the right candidates faster. This talent seach gives you the opportunity to
                      find candidates who may be a perfect fit for your role</div>
                    <div className="mt-40">
                      <div className="box-button-shadow wow animate__animated animate__fadeInUp"><a href="#" className="btn btn-default">Post a job now</a></div>
                      <a href="#" className="btn btn-link wow animate__animated animate__fadeInUp">Learn
                        more</a>
                    </div>
                  </div>
                </div>
                <div className="col-lg-6 col-sm-12">
                  <div className="box-image-job">
                    <figure className=" wow animate__animated animate__fadeIn"><img alt="jobhub" src="/frontend_assets/imgs/blog/img-job.png" /></figure>
                    <div className="job-top-creator">
                      <div className="job-top-creator-head">
                        <h5>Top Freelancers</h5>
                      </div>
                      <ul>
                        <li>
                          <div>
                            <figure><img alt="jobhub" src="/frontend_assets/imgs/avatar/ava_13.png" />
                            </figure>
                            <div className="job-info-creator">
                              <strong>Kate Adie</strong>
                              <span>UI/UX Designer</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div>
                            <figure><img alt="jobhub" src="/frontend_assets/imgs/avatar/ava_14.png" />
                            </figure>
                            <div className="job-info-creator">
                              <strong>John Lennon</strong>
                              <span>Senior Art Director</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div>
                            <figure><img alt="jobhub" src="/frontend_assets/imgs/avatar/ava_15.png" />
                            </figure>
                            <div className="job-info-creator">
                              <strong>Nadine Coyle</strong>
                              <span>Photographer</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div>
                            <figure><img alt="jobhub" src="/frontend_assets/imgs/avatar/ava_16.png" />
                            </figure>
                            <div className="job-info-creator">
                              <strong>Sarah Harding</strong>
                              <span>Motion Designer</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <div className="section-box">
            <div className="container">
              <ul className="list-partners">
                <li className="wow animate__animated animate__fadeInUp hover-up" data-wow-delay="0s">
                  <a href="#">
                    <figure><img alt="jobhub" src="/frontend_assets/imgs/jobs/logos/samsung.svg" /></figure>
                  </a>
                </li>
                <li className="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">
                  <a href="#">
                    <figure><img alt="jobhub" src="/frontend_assets/imgs/jobs/logos/google.svg" /></figure>
                  </a>
                </li>
                <li className="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".2s">
                  <a href="#">
                    <figure><img alt="jobhub" src="/frontend_assets/imgs/jobs/logos/facebook.svg" /></figure>
                  </a>
                </li>
                <li className="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".3s">
                  <a href="#">
                    <figure><img alt="jobhub" src="/frontend_assets/imgs/jobs/logos/pinterest.svg" /></figure>
                  </a>
                </li>
                <li className="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".4s">
                  <a href="#">
                    <figure><img alt="jobhub" src="/frontend_assets/imgs/jobs/logos/avaya.svg" /></figure>
                  </a>
                </li>
                <li className="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".5s">
                  <a href="#">
                    <figure><img alt="jobhub" src="/frontend_assets/imgs/jobs/logos/forbes.svg" /></figure>
                  </a>
                </li>
                <li className="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">
                  <a href="#">
                    <figure><img alt="jobhub" src="/frontend_assets/imgs/jobs/logos/avis.svg" /></figure>
                  </a>
                </li>
                <li className="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".2s">
                  <a href="#">
                    <figure><img alt="jobhub" src="/frontend_assets/imgs/jobs/logos/nielsen.svg" /></figure>
                  </a>
                </li>
                <li className="wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".3s">
                  <a href="#">
                    <figure><img alt="jobhub" src="/frontend_assets/imgs/jobs/logos/doordash.svg" /></figure>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <section className="section-box mt-50">
            <div className="container">
              <div className="row align-items-end">
                <div className="col-lg-7 col-md-7">
                  <h2 className="section-title mb-20 wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">From blog</h2>
                  <p className="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp hover-up" data-wow-delay=".1s">Latest News &amp; Events</p>
                </div>
                <div className="col-lg-5 col-md-5 text-lg-end text-start">
                  <a href="blog-grid.html" className="btn btn-border icon-chevron-right wow animate__animated animate__fadeInUp hover-up mt-15" data-wow-delay=".1s">View more</a>
                </div>
              </div>
              <div className="row mt-70">
                <div className="box-swiper">
                  <div className="swiper-container swiper-group-3">
                    <div className="swiper-wrapper pb-70 pt-5">
                      <div className="swiper-slide">
                        <div className="card-grid-3 hover-up">
                          <div className="text-center card-grid-3-image">
                            <a href="blog-single.html">
                              <figure><img alt="jobhub" src="/frontend_assets/imgs/blog/img-blog-1.png" />
                              </figure>
                            </a>
                          </div>
                          <div className="card-block-info">
                            <div className="row">
                              <div className="col-lg-6 col-6 text-start">
                                <span>Sarah Harding</span>
                              </div>
                              <div className="col-lg-6 col-6 text-end">
                                <span>06 September</span>
                              </div>
                            </div>
                            <h5 className="mt-15 heading-md"><a href="blog-single.html">Senior Full Stack,
                              Creator
                              Success Full Time</a></h5>
                            <div className="card-2-bottom mt-50">
                              <div className="row">
                                <div className="col-lg-9 col-8">
                                  <a href="blog-single.html" className="btn btn-border btn-brand-hover">Keep reading</a>
                                </div>
                                <div className="col-lg-3 text-end col-4">
                                  <a href="#" className="mt-10 display-block mr-20"><img alt="jobhub" src="/frontend_assets/imgs/theme/icons/bookmark.svg" /></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="swiper-slide">
                        <div className="card-grid-3 hover-up">
                          <div className="text-center card-grid-3-image">
                            <a href="blog-single.html">
                              <figure><img alt="jobhub" src="/frontend_assets/imgs/blog/img-blog-2.png" />
                              </figure>
                            </a>
                          </div>
                          <div className="card-block-info">
                            <div className="row">
                              <div className="col-lg-6 col-6 text-start">
                                <span>Sarah Harding</span>
                              </div>
                              <div className="col-lg-6 col-6 text-end">
                                <span>06 September</span>
                              </div>
                            </div>
                            <h5 className="mt-15 heading-md"><a href="blog-single.html">21 Job Tips: How To
                              Make a Great Impression</a></h5>
                            <div className="card-2-bottom mt-50">
                              <div className="row">
                                <div className="col-lg-9 col-8">
                                  <a href="blog-single.html" className="btn btn-border btn-brand-hover">Keep reading</a>
                                </div>
                                <div className="col-lg-3 text-end col-4">
                                  <a href="#" className="mt-10 display-block mr-20"><img alt="jobhub" src="/frontend_assets/imgs/theme/icons/bookmark.svg" /></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="swiper-slide">
                        <div className="card-grid-3 hover-up">
                          <div className="text-center card-grid-3-image">
                            <a href="blog-single.html">
                              <figure><img alt="jobhub" src="/frontend_assets/imgs/blog/img-blog-3.png" />
                              </figure>
                            </a>
                          </div>
                          <div className="card-block-info">
                            <div className="row">
                              <div className="col-lg-6 col-6 text-start">
                                <span>Sarah Harding</span>
                              </div>
                              <div className="col-lg-6 col-6 text-end">
                                <span>06 September</span>
                              </div>
                            </div>
                            <h5 className="mt-15 heading-md"><a href="blog-single.html">Top SQL Query
                              Interview Questions</a></h5>
                            <div className="card-2-bottom mt-50">
                              <div className="row">
                                <div className="col-lg-9 col-8">
                                  <a href="blog-single.html" className="btn btn-border btn-brand-hover">Keep reading</a>
                                </div>
                                <div className="col-lg-3 text-end col-4">
                                  <a href="#" className="mt-10 display-block mr-20"><img alt="jobhub" src="/frontend_assets/imgs/theme/icons/bookmark.svg" /></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="swiper-slide">
                        <div className="card-grid-3 hover-up">
                          <div className="text-center card-grid-3-image">
                            <a href="blog-single.html">
                              <figure><img alt="jobhub" src="/frontend_assets/imgs/blog/img-blog-4.png" />
                              </figure>
                            </a>
                          </div>
                          <div className="card-block-info">
                            <div className="row">
                              <div className="col-lg-6 col-6 text-start">
                                <span>Sarah Harding</span>
                              </div>
                              <div className="col-lg-6 col-6 text-end">
                                <span>06 September</span>
                              </div>
                            </div>
                            <h5 className="mt-15 heading-md"><a href="blog-single.html">How To Write an
                              Interview Reschedule
                              Email</a></h5>
                            <div className="card-2-bottom mt-50">
                              <div className="row">
                                <div className="col-lg-9 col-8">
                                  <a href="blog-single.html" className="btn btn-border btn-brand-hover">Keep reading</a>
                                </div>
                                <div className="col-lg-3 text-end col-4">
                                  <a href="#" className="mt-10 display-block mr-20"><img alt="jobhub" src="/frontend_assets/imgs/theme/icons/bookmark.svg" /></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="swiper-slide">
                        <div className="card-grid-3 hover-up">
                          <div className="text-center card-grid-3-image">
                            <a href="blog-single.html">
                              <figure><img alt="jobhub" src="/frontend_assets/imgs/blog/img-blog-5.png" />
                              </figure>
                            </a>
                          </div>
                          <div className="card-block-info">
                            <div className="row">
                              <div className="col-lg-6 col-6 text-start">
                                <span>Sarah Harding</span>
                              </div>
                              <div className="col-lg-6 col-6 text-end">
                                <span>06 September</span>
                              </div>
                            </div>
                            <h5 className="mt-15 heading-md"><a href="blog-single.html">12 Peer Interview
                              Questions and Answers</a></h5>
                            <div className="card-2-bottom mt-50">
                              <div className="row">
                                <div className="col-lg-9 col-8">
                                  <a href="blog-single.html" className="btn btn-border btn-brand-hover">Keep reading</a>
                                </div>
                                <div className="col-lg-3 text-end col-4">
                                  <a href="#" className="mt-10 display-block mr-20"><img alt="jobhub" src="/frontend_assets/imgs/theme/icons/bookmark.svg" /></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div className="swiper-pagination swiper-pagination3" />
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section className="section-box mt-50 mb-60">
            <div className="container">
              <div className="box-newsletter">
                <h5 className="text-md-newsletter">Sign up to get</h5>
                <h6 className="text-lg-newsletter">the latest jobs</h6>
                <div className="box-form-newsletter mt-30">
                  <form className="form-newsletter">
                    <input type="text" className="input-newsletter" defaultValue placeholder="contact.alithemes@gmail.com" />
                    <button className="btn btn-default font-heading icon-send-letter">Subscribe</button>
                  </form>
                </div>
              </div>
              <div className="box-newsletter-bottom">
                <div className="newsletter-bottom" />
              </div>
            </div>
          </section>
        </main>

      </FrontendLayout>
    </>

  );
}