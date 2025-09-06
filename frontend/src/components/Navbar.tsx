// src/components/Navbar.tsx
import Link from 'next/link'

export default function Navbar() {
    return (
        <nav className="bg-white shadow">
            <div className="container mx-auto px-4 py-4 flex justify-between items-center">
                <Link href="/" className="text-2xl font-bold">
                    Sergio Paulino
                </Link>
                <div className="space-x-6">
                    <Link href="/" className="text-gray-600 hover:text-gray-900">
                        Home
                    </Link>
                    <Link href="/about" className="text-gray-600 hover:text-gray-900">
                        About
                    </Link>
                    <Link href="/projects" className="text-gray-600 hover:text-gray-900">
                        Projects
                    </Link>
                    <Link href="/contact" className="text-gray-600 hover:text-gray-900">
                        Contact
                    </Link>
                </div>
            </div>
        </nav>
    )
}
