import Layout from '../../components/Layout'
import ProjectCard from '../../components/ProjectCard'
import { fetchProjects, Project } from '../../lib/api'

export default async function ProjectsPage() {
  const projects: Project[] = await fetchProjects()

  return (
    <Layout>
      <section className="my-16">
        <h1 className="text-3xl md:text-4xl font-mono text-primary dark:text-white mb-6">
          Selected Projects
        </h1>
        <div className="grid gap-8 md:grid-cols-2">
          {projects.map((p) => (
            <ProjectCard key={p.id} project={p} />
          ))}
        </div>
      </section>
    </Layout>
  )
}
