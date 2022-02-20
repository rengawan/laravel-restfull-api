<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rule')->insert([
            'id'=>1,
            'rule_nama' => 'Admin',
            'rule_keterangan' => 'Rule Untuk Admin',
        ]);
        DB::table('rule')->insert([
            'id'=>2,
            'rule_nama' => 'Staff',
            'rule_keterangan' => 'Rule Untuk Staff',
        ]);
        
    }
}
