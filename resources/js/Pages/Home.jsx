import Categories from '@/Components/Home/Categories'
import FeaturedCompanies from '@/Components/Home/FeaturedCopnanies'
import FeaturedJobs from '@/Components/Home/FeaturedJobs'
import Hero from '@/Components/Home/Hero'
import Search from '@/Components/Home/Search'
import WhyChooseUs from '@/Components/Home/WhyChooseUs'
import FrontendLayout from '@/Layouts/FrontendLayout'
import React from 'react'


export default function Home({ categories, jobs, companies }) {
    
  return (
    <>
      <FrontendLayout>
       <Hero/>
       <Search categories={categories} />
       <FeaturedJobs jobs = {jobs}/>
       <Categories categories={categories}/>
       <FeaturedCompanies companies={companies}/> 
       <WhyChooseUs/>
      </FrontendLayout>
    </> 
  )
}
