<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('kategori')->insert([
            'id' => 1,
            'kategori_nama' => 'Mie Instan',
            'kategori_keterangan' => 'Kategori Mie Instan',
        ]);

        DB::table('kategori')->insert([
            'id' => 2,
            'kategori_nama' => 'Kecantikan',
            'kategori_keterangan' => 'Kategori Kecantikan',
        ]);

        DB::table('barang')->insert([
            'barang_kode' => 'B001',
            'kategori_id' => 1,
            'barang_nama' => 'Mie Supermi',
            'barang_barcode' => '234234234',
            'barang_satuan' => 'PCS',
        ]);

        DB::table('barang')->insert([
            'barang_kode' => 'B002',
            'kategori_id' => 1,
            'barang_nama' => 'Mie Sarimi',
            'barang_barcode' => '234234',
            'barang_satuan' => 'PCS',
        ]);

        DB::table('barang')->insert([
            'barang_kode' => 'B003',
            'kategori_id' => 1,
            'barang_nama' => 'Mie Indomie',
            'barang_barcode' => '234234234',
            'barang_satuan' => 'PCS',
        ]);
        
        DB::table('barang')->insert([
            'barang_kode' => 'M001',
            'kategori_id' => 2,
            'barang_nama' => 'Kosmetik A',
            'barang_barcode' => '234234234',
            'barang_satuan' => 'PCS',
        ]);

        DB::table('barang')->insert([
            'barang_kode' => 'M002',
            'kategori_id' => 2,
            'barang_nama' => 'Kosmetik B',
            'barang_barcode' => '234234',
            'barang_satuan' => 'PCS',
        ]);

        DB::table('barang')->insert([
            'barang_kode' => 'M003',
            'kategori_id' => 2,
            'barang_nama' => 'Kosmetik C',
            'barang_barcode' => '234234234',
            'barang_satuan' => 'PCS',
        ]);
    }
}
