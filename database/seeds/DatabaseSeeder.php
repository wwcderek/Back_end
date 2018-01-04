<?php

use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Role;
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
        $this->command->info('done');
        // $this->call(UsersTableSeeder::class);
    }


}


class FilmAppSeeder extends Seeder {
    public function run()
    {
        $date = new DateTime('2000-01-01');
        $film = Film::create(array(
            'title' => 'Testing',
            'description' => 'Look this is good',
            'language' => 'English',
            'rating' => 0,
            'running_time' => 130,
            'publish_time' => $date,
            'file_name' => 'look',
            'path' => 'http://101.78.175.101:6780/storage/2018-01-01-15-17-45.jpg'
        ));

        $this->command->info('created Film');
        $role = Role::create(array(
            'name' => 'A',
            'gender' => 'Male',
            'type' => 'Actor'
        ));

        $role2 = Role::create(array(
            'name' => 'B',
            'gender' => 'Male',
            'type' => 'Actor'
        ));
        $this->command->info('Adding relationship');

        $film->roles()->attach($role->id);
        $film->roles()->attach($role2->id);

        $this->command->info('They are doing');
    }

}
