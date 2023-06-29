<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Programseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
                'name' => 'Adoのオールナイトニッポン',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
         DB::table('programs')->insert([
                'name' => 'フワちゃんのオールナイトニッポン０',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
