<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkikahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akikah')->insert([
            'nama_anak' => 'Budi',
            'jeniskelamin' => 'Laki-Laki',
            'nama_ayah' => 'Wahyudi',
            'tgl_akikah' => '2022-07-23',
        ]);
    }
}
