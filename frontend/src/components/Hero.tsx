// src/components/Hero.tsx
'use client'

import Link from 'next/link'
import Image from 'next/image'
import { motion } from 'framer-motion'

const fadeUp = {
    hidden: { opacity: 0, y: 20 },
    visible: (i = 1) => ({
        opacity: 1,
        y: 0,
        transition: {
            delay: i * 0.2,
            duration: 0.6,
            ease: 'easeOut',
        },
    }),
}

export default function Hero() {
    return (
        <section className="min-h-screen bg-bg-default dark:bg-gray-900 flex items-center">
            <div className="container mx-auto px-4 py-16 grid gap-8 md:grid-cols-2">
                {/* Left: Intro copy */}
                <motion.div
                    className="flex flex-col justify-center space-y-6"
                    initial="hidden"
                    animate="visible"
                    custom={1}
                    variants={fadeUp}
                >
                    <h1 className="text-5xl md:text-6xl font-mono text-primary dark:text-white">
                        IT Enthusiast Since ’89/’90
                    </h1>
                    <p className="text-lg md:text-xl text-secondary dark:text-gray-300">
                        I’ve spent decades turning ideas into web applications—PHP (Laravel & Symfony), API design, DB admin, Linux servers, and leading teams to deliver on time and under budget.
                    </p>
                    <Link
                        href="/about"
                        className="inline-block w-max bg-accent text-white font-semibold py-3 px-6 rounded-md hover:bg-accent/90 transition"
                    >
                        Learn More
                    </Link>
                </motion.div>

                {/* Right: Headshot */}
                <motion.div
                    className="flex items-center justify-center"
                    initial="hidden"
                    animate="visible"
                    custom={2}
                    variants={fadeUp}
                >
                    <Image
                        src="/images/headshot.jpg"
                        alt="Sergio Paulino"
                        width={300}
                        height={300}
                        className="rounded-full ring-4 ring-secondary dark:ring-gray-600 object-cover"
                    />
                </motion.div>
            </div>
        </section>
    )
}
