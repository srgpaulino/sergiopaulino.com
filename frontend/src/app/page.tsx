import Layout from '../components/Layout'
import Hero from '../components/Hero'

export default function HomePage() {
  return (
    <Layout>
      <section className="my-16">
        <Hero />
      </section>
      {/* future sections: About preview, Projects preview, etc., also wrapped in <section className="my-16"> */}
    </Layout>
  )
}
