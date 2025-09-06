/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // opt-in dark mode with a “class” toggle
    content: [
        './src/app/**/*.{js,ts,jsx,tsx}',
        './src/components/**/*.{js,ts,jsx,tsx}',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#007BFF',        // tech‑reliable blue
                secondary: '#475569',      // slate gray  
                accent: '#F59E0B',         // warm amber for CTAs
                'bg-default': '#F1F5F9',   // light gray page background
                'text-default': '#1F2937', // charcoal text
                success: '#10B981',        // emerald for success states
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                mono: ['JetBrains Mono', 'ui-monospace', 'monospace'],
            },
        },
    },
    plugins: [],
}
