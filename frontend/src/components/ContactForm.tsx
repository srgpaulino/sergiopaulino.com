// frontend/src/components/ContactForm.tsx
'use client'

import { useState } from 'react'

// Ensure the env var is defined at load‑time
const API_BASE = process.env.NEXT_PUBLIC_API_BASE_URL
if (!API_BASE) {
    throw new Error('NEXT_PUBLIC_API_BASE_URL is not defined')
}

interface FormState {
    name: string
    email: string
    message: string
}

export default function ContactForm() {
    const [form, setForm] = useState<FormState>({ name: '', email: '', message: '' })
    const [status, setStatus] = useState<'idle' | 'sending' | 'success' | 'error'>('idle')
    const [errors, setErrors] = useState<Partial<FormState>>({})

    function handleChange(e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) {
        setForm({ ...form, [e.target.name]: e.target.value })
    }

    async function handleSubmit(e: React.FormEvent) {
        e.preventDefault()
        setStatus('sending')
        setErrors({})

        // 1) Initialize CSRF cookie
        await fetch(`${API_BASE!.replace('/api', '')}/sanctum/csrf-cookie`, {
            credentials: 'include',
        })

        // 2) Submit the form
        const res = await fetch(`${API_BASE}/contact`, {
            method: 'POST',
            credentials: 'include',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(form),
        })

        if (res.ok) {
            setStatus('success')
            setForm({ name: '', email: '', message: '' })
        } else if (res.status === 422) {
            const json = await res.json()
            setErrors(json.errors || {})
            setStatus('idle')
        } else {
            setStatus('error')
        }
    }

    return (
        <form onSubmit={handleSubmit} className="space-y-6">
            {status === 'success' && <p className="text-green-600">Thanks! Your message has been sent.</p>}
            {status === 'error' && <p className="text-red-600">Oops — something went wrong. Please try again.</p>}

            <div>
                <label htmlFor="name" className="block text-sm font-medium">Name</label>
                <input
                    id="name"
                    name="name"
                    value={form.name}
                    onChange={handleChange}
                    className="mt-1 block w-full border rounded p-2"
                    disabled={status === 'sending'}
                />
                {errors.name && <p className="text-red-500 text-sm">{errors.name}</p>}
            </div>

            <div>
                <label htmlFor="email" className="block text-sm font-medium">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value={form.email}
                    onChange={handleChange}
                    className="mt-1 block w-full border rounded p-2"
                    disabled={status === 'sending'}
                />
                {errors.email && <p className="text-red-500 text-sm">{errors.email}</p>}
            </div>

            <div>
                <label htmlFor="message" className="block text-sm font-medium">Message</label>
                <textarea
                    id="message"
                    name="message"
                    rows={5}
                    value={form.message}
                    onChange={handleChange}
                    className="mt-1 block w-full border rounded p-2"
                    disabled={status === 'sending'}
                />
                {errors.message && <p className="text-red-500 text-sm">{errors.message}</p>}
            </div>

            <button
                type="submit"
                disabled={status === 'sending'}
                className="bg-accent text-white py-2 px-4 rounded hover:bg-accent/90 transition disabled:opacity-50"
            >
                {status === 'sending' ? 'Sending…' : 'Send Message'}
            </button>
        </form>
    )
}
