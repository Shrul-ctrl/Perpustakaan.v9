<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Kategoris extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $kategoris = [
                ['nama_kategori'=>'Gelas']
                ];
                // masukkan data ke database
                DB::table('kategoris')->insert($kategoris);
        }
    }
}
