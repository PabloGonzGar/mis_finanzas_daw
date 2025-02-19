<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Income;

class IncomesSeeder extends Seeder
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
                'category_id' => rand(1,3),
                'date'  =>  $now,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('incomes')->insert(
            $data
        );
    }
}
