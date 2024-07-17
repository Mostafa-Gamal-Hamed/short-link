<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('website_names')->insert([
            'name' => 'اختصار روابط',
            'key' => 'اختصار, روابط, اختصار روابط',
            'desc' => 'اختصار كل انواع الروابط',
        ]);
    }
}
