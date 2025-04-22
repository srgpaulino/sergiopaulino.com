// src/components/SkillsGrid.tsx
export default function SkillsGrid({ skills }: { skills: string[] }) {
    return (
        <div className="grid sm:grid-cols-2 md:grid-cols-3 gap-6 mt-4">
            {skills.map((skill, i) => (
                <div
                    key={i}
                    className="flex items-center space-x-3 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition"
                >
                    {/* Circle bullet – swap for an icon if you like */}
                    <span className="w-3 h-3 bg-accent rounded-full flex-shrink-0" />
                    <span className="text-text-default dark:text-gray-200">{skill}</span>
                </div>
            ))}
        </div>
    )
}
