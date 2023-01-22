<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Laporan;
use App\Models\User;
use App\Models\Bkph;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Kategori 1

        User::create([
            'name' => 'Rosyad Shidqi Dikpimmmas',
            'username' => 'rosyadsd',
            'email' => 'rosyadsd@gmail.com',
            'is_super' => 1,
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Imam Nur Alim',
            'username' => 'imamalim',
            'email' => 'imamalim@gmail.com',
            'is_super' => 0,
            'password' => bcrypt('12345')
        ]);
        
        Category::create([
            'name' => 'Produksi Tebangan Jati',
            'slug' => 'produksi-tebangan-jati',
            'excerpt' => 'Laporan Hasil Produksi Tebangan Jati'
        ]);
        Category::create([
            'name' => 'Produksi Tebangan Rimba',
            'slug' => 'produksi-tebangan-rimba',
            'excerpt' => 'Laporan Hasil Produksi Tebangan Rimba'
        ]);

        Category::create([
            'name' => 'Produksi Agroforestry Serasah',
            'slug' => 'produksi-agroforestry-serasah',
            'excerpt' => 'Laporan Hasil Produksi Agroforestry Serasah'
        ]);

        Category::create([
            'name' => 'Produksi Agroforestry Jagung',
            'slug' => 'produksi-agroforestry-jagung',
            'excerpt' => 'Laporan Hasil Produksi Agroforestry Jagung'
        ]);

        Category::create([
            'name' => 'Produksi Agroforestry Lainnya',
            'slug' => 'produksi-agroforestry-lainnya',
            'excerpt' => 'Laporan Hasil Produksi Agroforestry Lainnya'
        ]);

        Category::create([
            'name' => 'Ekowisata',
            'slug' => 'ekowisata',
            'excerpt' => 'Laporan Hasil Ekowisata'
        ]);

        Laporan::create([
            'category_id' => 1,
            'user_id'=> 1,
            'rkap' => 'Subah',
            'ro' => 'Subah',
            'real' => '6098,45999999999',
            'persen_rkap' => '90%',
            'persen_ro' => '20%',
            'bulan' => 'Januari',
            'jumlah_kph' => '10938476',
        ]);

    }
}
