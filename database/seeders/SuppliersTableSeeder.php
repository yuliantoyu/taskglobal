<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->truncate();

        $suppliers = [
            [
                'name' => 'Supplier 1',
                'email' => 'supplier1@example.com',
                'phone' => '1234567890',
                'address' => 'Address 1'
            ],
            [
                'name' => 'Supplier 2',
                'email' => 'supplier2@example.com',
                'phone' => '0987654321',
                'address' => 'Address 2'
            ],
            [
                'name' => 'Supplier 3',
                'email' => 'supplier3@example.com',
                'phone' => '1122334455',
                'address' => 'Address 3'
            ]
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
