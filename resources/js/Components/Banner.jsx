import React from 'react'

export default function Banner() {
  return (
    <>
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
    </>
  )
}
