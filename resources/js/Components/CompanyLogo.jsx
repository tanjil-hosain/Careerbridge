import React from 'react';
import { Link } from '@inertiajs/react'; // <-- Comment tule dewa holo ebong {} dewa holo

export default function CompanyLogo({ companies }) {
  return (
    <div>
      <div className="section-box wow animate__animated animate__fadeIn mt-70">
        <div className="container">
          <div className="box-swiper">
            <div className="swiper-container swiper-group-6">
              <div className="swiper-wrapper pb-70 pt-5">
                {companies && companies.map((company, index) => (
                  <div className="swiper-slide hover-up" key={company.id || index}>
                    <div className="item-logo">
                      <Link href={`/jobs?company=${company.id}`}>
                        <img 
                          alt={company.company_name || "jobhub"} 
                          src={company.logo ? `/storage/${company.logo}` : `/frontend_assets/imgs/slider/logo/brand-${index + 1}.svg`} 
                        />
                      </Link>
                    </div>
                  </div>
                ))}
              </div>
            </div>
            <div className="swiper-button-next" />
            <div className="swiper-button-prev" />
          </div>
        </div>
      </div>
    </div>
  );
}