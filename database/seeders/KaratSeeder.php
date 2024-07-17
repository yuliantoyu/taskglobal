<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karat')->insert([
            ['nama' => 'Karat 1'],
            ['nama' => 'Karat 2'],
            ['nama' => 'Karat 3'],
            ['nama' => 'Karat 4'],
            ['nama' => 'Karat 5'],
        ]);
    }
}
