// src/app/contact/page.tsx
import Layout from '../../components/Layout';
import ContactForm from '../../components/ContactForm';

export const metadata = {
    title: 'Contact • Sergio Paulino',
};

export default function ContactPage() {
    return (
        <Layout>
            <section className="max-w-2xl mx-auto py-16 px-4">
                <h1 className="text-4xl font-bold text-center mb-8">Get in Touch</h1>
                <ContactForm />
            </section>
        </Layout>
    );
}
