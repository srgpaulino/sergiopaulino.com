<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserProfileSeeder::class,
            SkillsTableSeeder::class,
            LanguagesTableSeeder::class,
            ProjectsTableSeeder::class,
            ExperienceSeeder::class,
            EducationSeeder::class,
        ]);
    }
}

class UserProfileSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'id'    => 1,
            'name'  => 'Sergio Paulino',
            'email' => 'j.sergio.paulino@gmail.com',
            // set a password or leave null if you don’t need to log in
            'password' => bcrypt('pj111085'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user_profiles')->insert([
            'user_id'         => 1,
            'location'        => 'London, SW14 7PY',
            'phone'           => '+44 7407 113588',
            'website'         => 'https://sergiopaulino.com',
            'profile_summary' => 'Experienced Full Stack Developer…',
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),
        ]);
    }
}

class SkillsTableSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            'PHP', 'Laravel', 'SlimPHP', 'Symfony', 'Zend',
            'AWS Lambda', 'AWS EC2', 'AWS RDS', 'AWS SQS', 'AWS S3', 'Elastic Beanstalk', 'API Gateway',
            'JavaScript', 'Node.js', 'React.js', 'Vue.js', 'HTML5', 'CSS3', 'Bootstrap',
            'MySQL', 'Aurora', 'Elasticsearch', 'MongoDB', 'SOQL',
            'GitHub Actions', 'AWS CodeDeploy', 'Docker',
            'Linux', 'CI/CD', 'API Design', 'Cloud Security',
            'Agile/Scrum', 'Salesforce'
        ];

        foreach ($skills as $skill) {
            DB::table('skills')->insert([
                'user_id' => 1,
                'name' => $skill,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

class LanguagesTableSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            ['name' => 'English', 'level' => 'Native'],
            ['name' => 'Portuguese', 'level' => 'Native'],
            ['name' => 'Spanish', 'level' => 'Fluent'],
            ['name' => 'French', 'level' => 'High'],
            ['name' => 'Dutch', 'level' => 'Average'],
            ['name' => 'Italian', 'level' => 'Average'],
        ];

        foreach ($languages as $lang) {
            DB::table('languages')->insert([
                'user_id' => 1,
                'language' => $lang['name'],
                'proficiency' => $lang['level'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'user_id' => 1,
                'title' => 'Reward API Gateway',
                'company' => 'RTW Digital',
                'description' => 'Designed and deployed an API system processing over 1 million monthly voucher redemptions using AWS Lambda, RDS, and SlimPHP.',
                'achievements' => 'Achieved 99.9% uptime.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Cyber Overwatch Assessment Tool',
                'company' => 'Cognition Intelligence',
                'description' => 'Architected and built UI and back-end logic for dynamic cybersecurity assessments in Laravel and Vue.js.',
                'achievements' => 'Improved assessment delivery time by 40%.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Search Optimisation Engine',
                'company' => 'Kato',
                'description' => 'Implemented geospatial search logic and Redis caching in Laravel.',
                'achievements' => 'Boosted query performance by 40% and API response time by 35%.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('projects')->insert($projects);
    }
}

class ExperienceSeeder extends Seeder
{
    public function run()
    {
        $experiences = [
            ['title' => 'Laravel Developer', 'company' => 'Kato', 'location' => 'London', 'start_date' => '2024-12-01', 'end_date' => '2025-02-28', 'responsibilities' => 'Enhanced search performance by over 40% using SQL Geometry and Redis caching. Implemented backend and frontend features using Laravel and Vue.js. Optimized API response times by 35% through query optimization. Conducted code reviews and collaborated in agile sprints.'],
            ['title' => 'Senior Developer', 'company' => 'Cognition Intelligence', 'location' => 'Peterborough, UK', 'start_date' => '2024-06-01', 'end_date' => '2024-10-31', 'responsibilities' => 'Redesigned the assessment engine in Laravel with modular components. Developed RESTful APIs and migrated monoliths to microservices. Reduced test cycle time by 50% with QA automation and CI/CD via GitHub Actions.'],
            ['title' => 'Head of Development & Technology', 'company' => 'TFC Int Ltd/RTW Digital', 'location' => 'London', 'start_date' => '2018-04-01', 'end_date' => '2024-03-31', 'responsibilities' => 'Designed and scaled AWS-based backend managing 1M+ transactions/month. Developed APIs for SSO, redemptions, and wallets using SlimPHP. Integrated Vue.js across multiple frontends and internal tools. Reduced AWS costs by 20% and maintained 99.9% uptime.'],
            ['title' => 'Development Manager', 'company' => 'TFC International Ltd', 'location' => 'London', 'start_date' => '2016-01-01', 'end_date' => '2018-03-31', 'responsibilities' => 'Implemented agile workflows and CI/CD pipelines. Led recruitment, mentoring, and project delivery. Increased deployment efficiency by threefold.'],
            ['title' => 'Back End Developer', 'company' => 'Social Deal', 'location' => 'NL', 'start_date' => '2015-10-01', 'end_date' => '2015-11-30', 'responsibilities' => 'Built custom data spider/scraper for marketing automation.'],
            ['title' => 'Senior PHP Developer', 'company' => 'NetAnts', 'location' => 'Roermond, NL', 'start_date' => '2014-07-01', 'end_date' => '2015-09-30', 'responsibilities' => 'Created Laravel-based ecommerce solutions. Decreased development time by 25% by modularising components.'],
            ['title' => 'Senior PHP Developer', 'company' => 'Philips', 'location' => 'Eindhoven, NL', 'start_date' => '2013-01-01', 'end_date' => '2014-04-30', 'responsibilities' => 'Developed procurement tools in Laravel and MySQL. Achieved a 15% cost reduction through data-driven insights.'],
            ['title' => 'Senior Programmer', 'company' => 'Findmore Consulting (NetViagens)', 'location' => 'Lisbon, PT', 'start_date' => '2012-10-01', 'end_date' => '2013-01-31', 'responsibilities' => 'Integrated booking systems with GALILEO API.'],
            ['title' => 'Programmer', 'company' => 'Dib Consulting', 'location' => 'Alverca, PT', 'start_date' => '2011-11-01', 'end_date' => '2012-10-31', 'responsibilities' => 'Developed Eurocup 2012 management tools and PDA connectors for SugarCRM.'],
            ['title' => 'Web Developer', 'company' => 'Webtodesign', 'location' => 'Aveiro, PT', 'start_date' => '2010-07-01', 'end_date' => '2011-08-31', 'responsibilities' => 'Built a modular backend editor and multiple frontend sites.'],
            ['title' => 'Web Developer', 'company' => 'Alverbyte', 'location' => 'Alverca, PT', 'start_date' => '2009-04-01', 'end_date' => '2010-07-31', 'responsibilities' => 'Developed CMS and framework for experience booking systems.'],
            ['title' => 'Junior Consultant', 'company' => 'Dib Consulting', 'location' => 'Alverca, PT', 'start_date' => '2008-08-01', 'end_date' => '2009-03-31', 'responsibilities' => 'Contributed to PHP/.NET applications and SugarCRM extensions.'],
            ['title' => 'Web Developer', 'company' => 'Stamina', 'location' => 'Lisbon, PT', 'start_date' => '2008-04-01', 'end_date' => '2008-08-31', 'responsibilities' => 'Built business sites on a Zend-based internal framework.'],
            ['title' => 'Head Developer (Freelance)', 'company' => '3.Scape', 'location' => 'PT', 'start_date' => '2005-09-01', 'end_date' => '2016-01-31', 'responsibilities' => 'Developed internal CRM systems using Zend and later Laravel, WordPress plugins, and custom APIs for over 40 clients.'],
        ];

        foreach ($experiences as $exp) {
            DB::table('experiences')->insert(array_merge($exp, [
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]));
        }
    }
}

class EducationSeeder extends Seeder
{
    public function run()
    {
        $entries = [
            ['degree' => 'BSc Computer Science', 'institution' => 'University of Lisbon', 'period' => '2004 – 2009'],
            ['degree' => 'Certified PHC Advanced Technician', 'institution' => 'PHC Software', 'period' => 'Jul 2012'],
            ['degree' => 'Certificado de Formação Pedagógica Inicial de Formadores', 'institution' => 'DGERT', 'period' => 'Jun 2012'],
            ['degree' => 'Certificate in Advanced English', 'institution' => 'University of Cambridge', 'period' => 'Jun 2002'],
            ['degree' => 'Gago Coutinho Secondary School', 'institution' => 'Lisbon', 'period' => '2000 – 2004'],
        ];

        foreach ($entries as $edu) {
            DB::table('education')->insert([
                'user_id' => 1,
                'title' => $edu['degree'],
                'institution' => $edu['institution'],
                'period' => $edu['period'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
