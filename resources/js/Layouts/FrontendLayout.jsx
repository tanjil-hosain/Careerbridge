import Footer from '@/Components/Footer'
import Navbar from '@/Components/Navbar'
import React from 'react'

export default function FrontendLayout({ children }) {
    return (
        <>
            <Navbar />
            {children}
            <Footer />

        </>
    )
}
