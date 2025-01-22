<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'nama' => 'Motherboard',
            'supplier' => 'Supplier A',
            'jumlah' => 20,
            'tipe' => 'masuk',
        ]);
        Barang::create([
            'nama' => 'CPU',
            'supplier' => 'Supplier B',
            'jumlah' => 10,
            'tipe' => 'keluar',
        ]);
    }
}
