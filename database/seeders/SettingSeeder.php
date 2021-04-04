<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting=\App\Models\Setting::create([
            'desc'=>'See how your users experience your website in realtime or view trends to see any changes in performance over time.',
            'email'     =>'limatrix@example.com',
            'phone'  =>'01066273085',
            'fac_url'     =>"https://www.facebook.com",
            'tw_url'     =>"https://www.facebook.com",
            'ln_url'     =>"https://www.facebook.com",
            'youtube_url'     =>"https://www.youtube.com",
            'whats_url'     =>"https://www.youtube.com",
            'address'     =>"Egypt ,Mansoura, Toril ",

        ]);
    }
}
