<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        require_once 'vendor/fzaninotto/faker/src/autoload.php';
        for($i = 0; $i < 10000; $i++){
            $faker = Faker\Factory::create('ja_JP');
            DB::table('library')
                ->insert    
            ([
                'id' =>0,
                'auth' => $faker->name,
                'kana' => $faker->kanaName,
                'isbn' =>$faker->isbn13,
                'publ'=>$faker->numberBetween(1, 10),
                'genre'=>$faker->numberBetween(1, 10),
                'title'=>$faker->streetAddress,
                
            ]);
        }
    }
}