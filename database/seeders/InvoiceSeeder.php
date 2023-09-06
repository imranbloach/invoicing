<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $value) {
            DB::table("invoices")->insert([
                'invoice_number' => random_int(100000, 999999),
                'customer_id' => random_int(1, 5),
                'discount' => abs(1-mt_rand()/mt_rand()),
                'tax' => abs(1-mt_rand()/mt_rand()),
                'status' => "pending",
                'total_amount' => abs(1-mt_rand()/mt_rand()),
                'due_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
