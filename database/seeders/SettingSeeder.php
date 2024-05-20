<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->updateOrCreate(
            [
                'email' => 'support@w2charity.com'
            ],
            [
                'email' => 'support@w2charity.com',
                'phone' => '081232323221',
                'owner_name' => 'Administrator',
                'company_name' => 'W2 Charity',
                'short_description' => '-',
                'keyword' => '-',
                'about' => '-',
                'instagram_link' => '-',
                'twitter_link' => '-',
                'fanpage_link' => '-',
                'google_plus_link' => '-'
            ]
        );
    }
}
