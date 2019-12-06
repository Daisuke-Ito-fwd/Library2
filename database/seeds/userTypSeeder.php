<?php

use Illuminate\Database\Seeder;

class userTypSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_typ')
            ->insert([
                'id'  => 0,
                'typ' => '管理'
            ]);
        
        DB::table('user_typ')
            ->insert([
                'id'  => 0,
                'typ' => '一般'
            ]);
        
    }
}
