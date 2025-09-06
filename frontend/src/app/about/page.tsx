import Layout from '../../components/Layout'
import Timeline from '../../components/Timeline'
import SkillsGrid from '../../components/SkillsGrid'
import { fetchAbout, fetchEvents, fetchSkills } from '../../lib/api'

export default async function AboutPage() {
    const { bio } = await fetchAbout()
    const events = await fetchEvents()
    const skillsData = await fetchSkills()

    return (
        <Layout>
            <section className="my-16">
                <h1 className="text-3xl md:text-4xl font-mono text-primary dark:text-white mb-6">
                    About Me
                </h1>
                <p className="text-lg md:text-xl leading-relaxed text-secondary dark:text-gray-300">
                    {bio}
                </p>
            </section>
            {/* Timeline */}
            <section className="my-16">
                <h2 className="text-2xl font-mono text-primary dark:text-white mb-6">
                    Career Timeline
                </h2>
                <Timeline events={events} />
            </section>
            {/* Skills */}
            <section className="my-16">
                <h2 className="text-2xl font-mono text-primary dark:text-white mb-6">
                    Key Skills
                </h2>
                <SkillsGrid skills={skillsData.map((s) => s.name)} />
            </section>
        </Layout>
    )
}
