<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriBarang::create([
            'name' => 'Bahan Baku Bar'
        ]);
        Barang::create([
            'kategori_barang_id'=>'1',
            'kode'=>'001',
            'bahan_baku'=>'Greenfield Freshmilk',
            'satuan'=>'Ml',
            'stock'=>'10',
        ]);
    }
}
