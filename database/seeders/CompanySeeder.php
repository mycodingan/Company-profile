<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Membuat direktori jika belum ada
        $aboutImagePath = public_path('storage/about_images');
        $companyLogoPath = public_path('storage/company_logos');
        $companyFaviconPath = public_path('storage/company_favicons');

        if (!File::exists($aboutImagePath)) {
            File::makeDirectory($aboutImagePath, 0755, true);
        }

        if (!File::exists($companyLogoPath)) {
            File::makeDirectory($companyLogoPath, 0755, true);
        }

        if (!File::exists($companyFaviconPath)) {
            File::makeDirectory($companyFaviconPath, 0755, true);
        }

        // Seeder untuk About
        DB::table('abouts')->insert([
            'title' => $faker->sentence,
            'content' => $faker->paragraph,
            'image' => 'about_images/' . basename($faker->image('public/storage/about_images', 640, 480, null, false)),
        ]);

        // Seeder untuk Profile
        DB::table('profiles')->insert([
            'visi' => $faker->sentence,
            'misi' => $faker->sentence,
            'tujuan' => $faker->sentence,
            'email' => $faker->email,
        ]);

        // Seeder untuk Testimony
        DB::table('testimonies')->insert([
            'nama_pengisi' => $faker->name,
            'tanggal_mengisi' => $faker->date,
            'isi' => $faker->paragraph,
        ]);

        // Seeder untuk Company
        DB::table('companies')->insert([
            'title' => $faker->company,
            'logo' => 'company_logos/' . basename($faker->image('public/storage/company_logos', 100, 100, null, false)),
            'favicon' => 'company_favicons/' . basename($faker->image('public/storage/company_favicons', 32, 32, null, false)),
            'website_name' => $faker->domainName,
            'alamat' => $faker->address,
            'nomor_telepon' => $faker->phoneNumber,
        ]);
    }
}
