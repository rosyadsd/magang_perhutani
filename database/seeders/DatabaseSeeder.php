<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Laporan;
use App\Models\User;
use App\Models\Bkph;
use App\Models\Bulan;

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
        
        Bkph::create([
            'nama_bkph' => 'Subah',
            'alamat_bkph' => 'Jl.Subah',
            'email' => '0811234567'
        ]);

        Bkph::create([
            'nama_bkph' => 'Plelen',
            'alamat_bkph' => 'Jl.Plelen',
            'email' => '08111233848'
        ]);

        Bkph::create([
            'nama_bkph' => 'Kalibodri',
            'alamat_bkph' => 'Jl.Kalibodri',
            'email' => '081455668933'
        ]);
        Bkph::create([
            'nama_bkph' => 'Sojomerto',
            'alamat_bkph' => 'Jl.Sojomerto',
            'email' => '083547899922'
        ]);
        
        Bkph::create([
            'nama_bkph' => 'Mangkang',
            'alamat_bkph' => 'Jl.Mangkang',
            'email' => '083499002312'
        ]);

        Bkph::create([
            'nama_bkph' => 'Boja',
            'alamat_bkph' => 'Jl.Boja',
            'email' => '08129003112'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'Januari'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'Februari'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'Maret'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'April'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'Mei'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'Juni'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'Juli'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'Agustus'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'September'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'Oktober'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'November'
        ]);
        Bulan::create([
            'category_id' => 1,
            'nama_bulan' => 'Desember'
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
            'bkph_id'=> 1,
            'bulan_id'=> 1,
            'rkap' => '11804',
            'ro' => '8847',
            'real' => '7003',
            'persen_rkap' => '59',
            'persen_ro' => '79',
        ]);
        Laporan::create([
            'category_id' => 1,
            'user_id'=> 1,
            'bkph_id'=> 2,
            'bulan_id'=> 1,
            'rkap' => '3707',
            'ro' => '2525',
            'real' => '3438',
            'persen_rkap' => '93',
            'persen_ro' => '136',
        ]);
        Laporan::create([
            'category_id' => 1,
            'user_id'=> 1,
            'bkph_id'=> 3,
            'bulan_id'=> 1,
            'rkap' => '1102',
            'ro' => '1026',
            'real' => '974',
            'persen_rkap' => '88',
            'persen_ro' => '95',
        ]);
        Laporan::create([
            'category_id' => 1,
            'user_id'=> 1,
            'bkph_id'=> 4,
            'bulan_id'=> 1,
            'rkap' => '2228',
            'ro' => '1937',
            'real' => '1928',
            'persen_rkap' => '87',
            'persen_ro' => '100',
        ]);
        Laporan::create([
            'category_id' => 1,
            'user_id'=> 1,
            'bkph_id'=> 5,
            'bulan_id'=> 1,
            'rkap' => '6270',
            'ro' => '4495',
            'real' => '3740',
            'persen_rkap' => '60',
            'persen_ro' => '83',
        ]);
        Laporan::create([
            'category_id' => 1,
            'user_id'=> 1,
            'bkph_id'=> 6,
            'bulan_id'=> 1,
            'rkap' => '2842',
            'ro' => '2773',
            'real' => '2579',
            'persen_rkap' => '91',
            'persen_ro' => '93',
        ]);

    }
}
