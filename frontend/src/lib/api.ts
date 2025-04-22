// src/lib/api.ts

export interface About { bio: string }
export interface Event { date: string; label: string }
export interface Skill { name: string }
export interface Project {
    id: number
    title: string
    description: string
    image_url?: string
    link?: string
    created_at: string
    updated_at: string
}

async function fetchJson<T>(url: string): Promise<T> {
    const res = await fetch(url, { cache: 'no-store' })
    if (!res.ok) throw new Error(`Fetch error (${res.status}) for ${url}`)
    return res.json()
}

const API_BASE = process.env.NEXT_PUBLIC_API_BASE_URL!

export function fetchAbout(): Promise<About> {
    return fetchJson<About>(`${API_BASE}/about`)
}

export function fetchEvents(): Promise<Event[]> {
    return fetchJson<Event[]>(`${API_BASE}/events`)
}

export function fetchSkills(): Promise<Skill[]> {
    return fetchJson<Skill[]>(`${API_BASE}/skills`)
}

export function fetchProjects(): Promise<Project[]> {
    return fetchJson<Project[]>(`${API_BASE}/projects`)
}
