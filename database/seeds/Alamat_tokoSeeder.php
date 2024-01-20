<?php

use App\Alamat_toko;
use Illuminate\Database\Seeder;

class Alamat_tokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name_store' => 'Ima Petshop',
            'description' => 'Ima PetShope adalah toko hewan peliharaan yang menyediakan berbagai jenis hewan, makanan, peralatan, dan layanan kesehatan. Toko ini berlokasi di Kota Jambi, dan buka setiap hari dari pukul 08.00 sampai 20.00. Anda juga bisa membeli makanan berkualitas, peralatan lengkap, dan obat-obatan untuk hewan peliharaan Anda.',
            'telp' => '+6285265659186',
            'city_id' => 156,
            'detail' => 'Sumatera Selatan, Indonesia'
        ];


        Alamat_toko::insert($data);
    }
}
