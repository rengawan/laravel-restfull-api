<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permision')->insert([
            'id'=>1,
            'permision_nama' => 'kategori'
        ]);
        DB::table('permision')->insert([
            'id'=>2,
            'permision_nama' => 'barang'
        ]);
        DB::table('permision')->insert([
            'id'=>3,
            'permision_nama' => 'barang masuk'
        ]);
        DB::table('permision')->insert([
            'id'=>4,
            'permision_nama' => 'barang keluar'
        ]);

        DB::table('permision')->insert([
            'id'=>5,
            'permision_nama' => 'laporan stok barang'
        ]);

        DB::table('permision')->insert([
            'id'=>6,
            'permision_nama' => 'laporan barang masuk'
        ]);

        DB::table('permision')->insert([
            'id'=>7,
            'permision_nama' => 'laporan barang keluar'
        ]);
        

        DB::table('rule_setting')->insert([
            'rule_id'=>1,
            'permision_id' => 1,
            'read' => true,
            'update' => true,
            'delete' => true,
        ]);
        
        DB::table('rule_setting')->insert([
            'rule_id'=>1,
            'permision_id' => 2,
            'read' => true,
            'update' => true,
            'delete' => true,
        ]);

        DB::table('rule_setting')->insert([
            'rule_id'=>1,
            'permision_id' => 3,
            'read' => true,
            'update' => true,
            'delete' => true,
        ]);

        DB::table('rule_setting')->insert([
            'rule_id'=>1,
            'permision_id' => 4,
            'read' => true,
            'update' => true,
            'delete' => true,
        ]);

        DB::table('rule_setting')->insert([
            'rule_id'=>1,
            'permision_id' => 5,
            'read' => true,
            'update' => true,
            'delete' => true,
        ]);


        DB::table('rule_setting')->insert([
            'rule_id'=>1,
            'permision_id' => 6,
            'read' => true,
            'update' => true,
            'delete' => true,
        ]);

        DB::table('rule_setting')->insert([
            'rule_id'=>1,
            'permision_id' => 7,
            'read' => true,
            'update' => true,
            'delete' => true,
        ]);




        DB::table('rule_setting')->insert([
            'rule_id'=>2,
            'permision_id' => 1,
            'read' => false,
            'update' => false,
            'delete' => false,
        ]);
        
        DB::table('rule_setting')->insert([
            'rule_id'=>2,
            'permision_id' => 2,
            'read' => false,
            'update' => false,
            'delete' => false,
        ]);

        DB::table('rule_setting')->insert([
            'rule_id'=>2,
            'permision_id' => 3,
            'read' => true,
            'update' => true,
            'delete' => true,
        ]);

        DB::table('rule_setting')->insert([
            'rule_id'=>2,
            'permision_id' => 4,
            'read' => true,
            'update' => true,
            'delete' => true,
        ]);

        DB::table('rule_setting')->insert([
            'rule_id'=>2,
            'permision_id' => 5,
            'read' => false,
            'update' => false,
            'delete' => false,
        ]);


        DB::table('rule_setting')->insert([
            'rule_id'=>2,
            'permision_id' => 6,
            'read' => false,
            'update' => false,
            'delete' => false,
        ]);

        DB::table('rule_setting')->insert([
            'rule_id'=>2,
            'permision_id' => 7,
            'read' => false,
            'update' => false,
            'delete' => false,
        ]);


    }
}
