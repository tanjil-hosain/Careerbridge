import Hero from '@/Components/Home/Hero'
import Search from '@/Components/Home/Search'
import FrontendLayout from '@/Layouts/FrontendLayout'
import React from 'react'
import {usePage} from "@inertiajs/react"

export default function Home() {
     const { categories } = usePage().props;
  return (
    <>
      <FrontendLayout>
       <Hero/>
       <Search categories={categories} />
      </FrontendLayout>
    </>
  )
}
