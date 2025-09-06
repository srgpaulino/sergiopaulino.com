import Layout from '../../components/Layout'
import ContactForm from '../../components/ContactForm'

export default function ContactPage() {
    return (
        <Layout>
            <section className="my-16">
                <h1 className="text-3xl md:text-4xl font-mono text-primary dark:text-white text-center mb-8">
                    Get in Touch
                </h1>
                <div className="max-w-xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg">
                    <ContactForm />
                </div>
            </section>
        </Layout>
    )
}
