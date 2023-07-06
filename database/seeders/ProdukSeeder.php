<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama' => 'Baju',
                'harga' => '130.000',
                'stok' => 45,
                'idkategori' => 1,
                'foto' => '/img/nGreen.png',
            ],
]);
    }
}
