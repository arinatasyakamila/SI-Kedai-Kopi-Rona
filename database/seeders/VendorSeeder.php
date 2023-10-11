<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendor= Vendor::create([
            'nama'=>'Herosya Mart',
            'alamat'=>'Padang Panjang',
            'no_telp'=>'081248847831'
        ]);
    }
}
