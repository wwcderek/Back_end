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

        $this->call('FilmAppSeeder');
        // $this->call(UsersTableSeeder::class);
    }


}


class FilmAppSeeder extends Seeder {
    public function run()
    {
        $film = \App\Models\Film::create(array(
            'title' => 'CatMan',
            'description' => 'Look this is good',
            'language' => 'English',
            'rating' => 0,
            'running_time' => 130,
            'publish_time' => date(2017-12-31-17-25-30),
            'file_name' => 'look',
            'path' => 'http://101.78.175.101:6780/storage/2018-01-01-15-17-45.jpg'
        ));


        $role = \App\Models\Role::create(array(
            'name' => 'Derek',
            'gender' => 'Male',
            'type' => 'Actor'
        ));

        $role2 = \App\Models\Role::create(array(
            'name' => 'Tom',
            'gender' => 'Male',
            'type' => 'Actor'
        ));

        $film->role()->attach($role->id);
        $film->role()->attach($role->id);


    }

}
