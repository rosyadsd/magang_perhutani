<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;

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
            'name' => 'Fauzan Zaman',
            'username' => 'fauzanz',
            'email' => 'fauzan12356@gmail.com',
            'is_super' => 1,
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Syahrul Ramadhan',
            'username' => 'syahrulganz',
            'email' => 'syahrul@gmail.com',
            'is_super' => 0,
            'password' => bcrypt('12345')
        ]);
        
        Category::create([
            'name' => 'Hot Kitchen',
            'slug' => 'hot-kitchen',
            'excerpt' => 'Bagian hot kitchen ini memiliki tugas untuk mengolah semua bahan makanan makanan yang menjadi tugas dari saucier dan entremetier pada srtuktur organisasi versi lengkap. Hot kitchen dibagi menjadi 2 bagian yaitu kitchen banquet dan kitchen a’la carte.'
        ]);

        Course::create([
            'category_id' => 1,
            'user_id'=> 1,
            'title' => 'Nasi Goreng Spesial',
            'excerpt' => 'Nasi Goreng dikenal sebagai masakan nasional Indonesia dan ditempatkan pada peringkat kedua dalam daftar 50 Makanan Terlezat di Dunia setelah rendang oleh CNN International.',
            'body' => "<p>Nasi Goreng dikenal sebagai masakan nasional Indonesia dan ditempatkan pada peringkat kedua dalam daftar '50 Makanan Terlezat di Dunia' setelah rendang oleh CNN International.</p>
            <p>Nasi Goreng Special signature Garuda Indonesia disajikan dengan tumis udang balado, ayam goreng mentega, telur mata sapi dan sambal bajak.
            Bahan: 
            </p>
            <p>- 5 siung bawang putih <br>
            - 1 cabai merah besar <br>
            - 10 helai kelopak bunga kecombrang <br>
            - 2 piring nasi <br>
            - Garam dan kaldu jamur secukupnya <br>
            - 5 butir bawang merah besar <br>
            - 1 batang daun bawang <br>
            - 1 butir telur <br>
            - 2 sosis ayam <br>
            - 1 buang mangga harummanis mengkal, dipotong kotak-kotak <br>
            - Kacang polong dan irisan wortel secukupnya <br>
            </p>"
        ]);

        Course::create([
            'category_id' => 1,
            'user_id'=> 1,
            'title' => 'Honey Glazed Salmon with Quinoa',
            'excerpt' => 'Salmon fillet disiram dengan saus teriyaki, disajikan dengan tumisan wortel, timun, labu, daikon ditambah salad quinoa, potongan cabai, daun bawang, dan edamame kukus.',
            'body' => "<p>Salmon fillet disiram dengan saus teriyaki, disajikan dengan tumisan wortel, timun, labu, daikon ditambah salad quinoa, potongan cabai, daun bawang, dan edamame kukus. </p>
            <p>Bahan: </p>
            <p>- 5 siung bawang putih
            - 1 cabai merah besar
            - 10 helai kelopak bunga kecombrang
            - 2 piring nasi
            - Garam dan kaldu jamur secukupnya
            - 5 butir bawang merah besar
            - 1 batang daun bawang
            - 1 butir telur
            - 2 sosis ayam
            - 1 buang mangga harummanis mengkal, dipotong kotak-kotak
            - Kacang polong dan irisan wortel secukupnya
            </p>"
        ]);

        Course::create([
            'category_id' => 1,
            'user_id'=> 1,
            'title' => 'Poach Salmon, mashed potato, and Asparagus',
            'excerpt' => 'Kombinasi ikan salmon yang direbus akan membawa perpaduan rasa dan tekstur yang unik di lidah Anda. Bersama mashed potato, asparagus, dan grilled tomato akan melengkapi kelezatan menu ini, namun tetap memenuhi kadar kebutuhan kalori Anda yang mempunyai alergi terhadap gluten.',
            'body' => "<p>Kombinasi ikan salmon yang direbus akan membawa perpaduan rasa dan tekstur yang unik di lidah Anda.</p>
            <p>Kombinasi ikan salmon yang direbus akan membawa perpaduan rasa dan tekstur yang unik di lidah Anda.</p>
            <p>Avocado puree, diblender:</p>
            <p>- 1 sdm unsalted butter (lelehkan)
            - 1/2 buah alpukat
            - 1 sdm gula
            - 1 sdt garam
            - 3 sdm air
            - 2 sdm extra virgin olive oil
            - 1 sdt air lemon
            Bahan garnish:
            - Buncis tumis
            - 1/2 buah paprika kuning tumis
            - Ceri (opsional)
            Salmon, dimarinasi dengan semua bahan:
            - 400 gr salmon dibagi 2
            - Garam dan lada hitam
            - Air lemon
            - Olive oil
            </p>"
        ]);

        Category::create([
            'name' => 'Cold Kitchen',
            'slug' => 'cold-kitchen',
            'excerpt' => 'Kitchen yang merupakan tempat pengolahan bahan-bahan makanan yang membuat hidangan pembuka (cold appetizer), juga membuat cold souce seperti mayonaise, thousand island, callipso, souce, dll. Outlet ini juga menangani pengolahan buah-buahan.'
        ]);

        Category::create([
            'name' => 'Pastry',
            'slug' => 'pastry',
            'excerpt' => 'Pastry dikenal sebagai roti yang diolah dengan cara panggang. Roti ini biasanya terbuat dari gula, susu, mentega, lemak, bubuk pemuai dan/atau telur. Terdapat beberapa jenis produk pastry yang terkenal. Mulai dari choux pastry, croissant pastry, dll.'
        ]);

        Category::create([
            'name' => 'Vegetable',
            'slug' => 'vegetable',
            'excerpt' => 'Memiliki hidup yang sehat jadi salah satu impian banyak orang. Bisa menikmati berbagai aktivitas dengan mudah, selalu fokus dalam menyelesaikan pekerjaan, hingga merasa bahagia setiap harinya. Tentu hal ini bisa kamu dapatkan dengan.'
        ]);

        Category::create([
            'name' => 'Alcohol',
            'slug' => 'alcohol',
            'excerpt' => 'Alkohol berawal dari senyawa kimia hidrokarbon yang terdiri dari dua atom, yaitu karbon (C) dan hidrogen (H). Berdasarkan tiga jenis ikatan pada hidrokarbon, salah satunya adalah alkana, kita bisa lihat kalau alkohol merupakan turunan dari alkana.'
        ]);

        Category::create([
            'name' => 'Coffee',
            'slug' => 'coffee',
            'excerpt' => 'Kopi adalah minuman hasil seduhan biji kopi yang telah disangrai dan dihaluskan menjadi bubuk.[2] Kopi merupakan salah satu komoditas di dunia yang dibudidayakan lebih dari 50 negara. Spesies pohon kopi yang dikenal secara umum yaitu Kopi Robusta.'
        ]);
    }
}
