// src/components/Timeline.tsx
interface Event {
    date: string
    label: string
}

export default function Timeline({ events }: { events: Event[] }) {
    return (
        <div className="relative border-l-2 border-primary pl-6">
            {events.map((e, i) => (
                <div key={i} className="mb-8 last:mb-0">
                    <span className="absolute -left-4 mt-1 w-3 h-3 bg-primary rounded-full"></span>
                    <p className="text-xl font-mono text-text-default dark:text-gray-200">
                        {e.date}
                    </p>
                    <p className="mt-1 text-secondary dark:text-gray-300">{e.label}</p>
                </div>
            ))}
        </div>
    )
}
