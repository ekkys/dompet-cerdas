<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Makan dan Minum', 'id_type' => 'outcome'],  // Outcome
            ['name' => 'Gaji Bulanan', 'id_type' => 'income'],      // Income
            ['name' => 'Tabungan ke Bank', 'id_type' => 'transfer'], // Transfer
            ['name' => 'Hiburan', 'id_type' => 'outcome'],          // Outcome
            ['name' => 'Bonus Tahunan', 'id_type' => 'income'],     // Income
        ]);
    }
}
