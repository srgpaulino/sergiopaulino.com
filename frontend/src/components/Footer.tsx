// src/components/Footer.tsx
export default function Footer() {
    return (
        <footer className="bg-gray-800 text-gray-300">
            <div className="container mx-auto px-4 py-6 text-center">
                <p>© {new Date().getFullYear()} Sergio Paulino. All rights reserved.</p>
                <div className="mt-2 space-x-4">
                    <a
                        href="https://github.com/srgpaulino"
                        target="_blank"
                        rel="noopener noreferrer"
                        className="hover:text-white"
                    >
                        GitHub
                    </a>
                    <a
                        href="https://linkedin.com/in/jsergiopaulino"
                        target="_blank"
                        rel="noopener noreferrer"
                        className="hover:text-white"
                    >
                        LinkedIn
                    </a>
                    <a
                        href="mailto:j.sergio.paulino@gmail.com"
                        className="hover:text-white"
                    >
                        Email
                    </a>
                </div>
            </div>
        </footer>
    )
}
