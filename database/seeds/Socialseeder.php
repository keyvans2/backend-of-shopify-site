<?php

use Illuminate\Database\Seeder;

class Socialseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        factory(App\Socialmedia::class, 50)->create();
    }

}
