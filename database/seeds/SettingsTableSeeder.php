<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'=>'Laravel\'s Blog',
            'address'=>'Kathmandu,nepal',
            'contact_number'=>'+977-9849813526',
            'contact_email'=>'info@laravel_blog.com'

        ]);
    }
}
