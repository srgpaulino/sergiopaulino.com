<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AboutSeeder extends Seeder
{
    /**
     * Run the about section seeder.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            'user_id'    => 1,
            'heading'    => 'About Me',
            'content'    => 'Experienced Full Stack Developer with nearly 19 years of PHP expertise, specialising in Laravel, SlimPHP, and AWS-based architectures. Proven record delivering high-performing, scalable API-driven applications in fintech, cybersecurity, and e-commerce domains. Strong leadership in agile teams, cloud migrations, and system optimisations. Passionate about clean, maintainable code and secure, cloud-native development.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
