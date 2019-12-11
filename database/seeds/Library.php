<?php

use Illuminate\Database\Seeder;

class Library extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //php artisan db:seed --class=Library  
        $library = factory(App\Library::class, 30000)->create();
    }
}
