<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spending;
use Illuminate\Support\Facades\DB;

class SpendingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $data = [];
        for($i=0;$i<=50; $i++){
            $data[]=[
                'amount' => rand(50,5000),
                'price' => rand(-50,-5000),
                'category_id' => rand(1,3),
                'created_at' => $now,
                'updated_at' => $now,
                'date' => $now,
            ];
        }

        DB::table('spendings')->insert(
            $data
        );
    }
}
