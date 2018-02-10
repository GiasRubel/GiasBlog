<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(App\Tag::class, 50)->create();
        factory(App\catagory::class, 50)->create();
        factory(App\post::class, 80)->create();
    }
}
