<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Profile;
use App\Models\Testimony;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder untuk Profile
        DB::table('profiles')->insert([
            'visi' => 'Visi perusahaan...',
            'misi' => 'Misi perusahaan...',
            'tujuan' => 'Tujuan perusahaan...',
            'email' => 'perusahaan@example.com',
        ]);

        // Seeder untuk Testimony
        DB::table('testimonies')->insert([
            'nama_pengisi' => 'John Doe',
            'tanggal_mengisi' => now(),
            'isi' => 'Testimoni...',
        ]);

        // Seeder untuk Company
        DB::table('companies')->insert([
            'title' => 'Nama Perusahaan',
            'logo' => 'logo.png',
            'favicon' => 'favicon.ico',
            'website_name' => 'Nama Website',
            'alamat' => 'Alamat Perusahaan...',
            'nomor_telepon' => '08123456789',
        ]);
    }
}
