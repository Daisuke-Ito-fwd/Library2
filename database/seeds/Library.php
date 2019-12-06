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
        $library = factory(App\Library::class, 20000)->create();
    }
}
