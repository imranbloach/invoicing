<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $value) {
            DB::table("items")->insert([
                'invoice_id' => random_int(1, 5),
                'title' => Str::random(20),
                'description' => Str::random(50),
                'quantity' => random_int(1, 99),
                'unit_price' => abs(1-mt_rand()/mt_rand()),
                'price' =>  abs(1-mt_rand()/mt_rand()),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
