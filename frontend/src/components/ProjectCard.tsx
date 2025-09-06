interface Project {
    id: number
    title: string
    description: string
    image_url?: string
    link?: string
}

export default function ProjectCard({ project }: { project: Project }) {
    return (
        <a
            href={project.link || '#'}
            target="_blank"
            rel="noopener noreferrer"
            className="block border rounded-lg overflow-hidden hover:shadow-lg transition"
        >
            {project.image_url && (
                <img
                    src={project.image_url}
                    alt={project.title}
                    className="w-full h-48 object-cover"
                />
            )}
            <div className="p-4">
                <h3 className="text-2xl font-semibold">{project.title}</h3>
                <p className="mt-2 text-gray-600">{project.description}</p>
            </div>
        </a>
    )
}
