// before the component
export default async function AboutPage() {
    const [aboutRes, eventsRes, skillsRes] = await Promise.all([
        fetch(`${process.env.NEXT_PUBLIC_API_BASE_URL}/about`),
        fetch(`${process.env.NEXT_PUBLIC_API_BASE_URL}/events`),
        fetch(`${process.env.NEXT_PUBLIC_API_BASE_URL}/skills`),
    ]);

    const bioObj = await aboutRes.json();
    const events = await eventsRes.json();
    const skills = await skillsRes.json();

    return (
        <Layout>
            {/* … */}
            <p className="text-lg">{bioObj.bio}</p>
            {/* Timeline and SkillsGrid receive the fetched arrays */}
            <Timeline events={events} />
            <SkillsGrid skills={skills.map((s: { name: string }) => s.name)} />
        </Layout>
    );
}
