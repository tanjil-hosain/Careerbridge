import Categories from '@/Components/Home/Categories'
import FeaturedJobs from '@/Components/Home/FeaturedJobs'
import Hero from '@/Components/Home/Hero'
import Search from '@/Components/Home/Search'
import FrontendLayout from '@/Layouts/FrontendLayout'
import React from 'react'


export default function Home({ categories, jobs }) {
    
  return (
    <>
      <FrontendLayout>
       <Hero/>
       <Search categories={categories} />
       <FeaturedJobs jobs = {jobs}/>
       <Categories categories={categories}/>
      </FrontendLayout>
    </>
  )
}
