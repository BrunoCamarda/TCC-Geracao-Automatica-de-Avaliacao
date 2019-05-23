<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AssuntosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 20; 
        while($count != 0){
            DB::table('assunto')->insert([
                'nome' => Str::random(10),
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $count--;
        }
    }
}
