<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        factory('App\User')->create([
            'name' => 'Felipe',
            'email' => 'felipe.panegalli@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        $this->call('PostsTableSeeder');
        $this->call('TagTableSeeder');
        $this->call('CommentSeeder');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Model::reguard();
    }
}
