// before: maybe you just had <main>{children}</main>
// after:
import type { ReactNode } from 'react'
import Navbar from './Navbar'
import Footer from './Footer'

export default function Layout({ children }: { children: ReactNode }) {
  return (
    <div className="min-h-screen flex flex-col bg-bg-default dark:bg-gray-900 text-text-default dark:text-gray-200">
      <Navbar />
      <main className="flex-grow container mx-auto px-4 py-12">
        {children}
      </main>
      <Footer />
    </div>
  )
}
