<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $this->author();
        $this->admin();

    }
    public function admin()
    {
        User::create([
            'name'=>'admin', 'email'=>'admin@gmail.com', 'password'=>bcrypt('123456'),'active'=>true,'type'=>'admin'
        ]);
        $this->command->info('ok!');
    }

    public function author()
    {
        User::create([
            'name'=>'hasan', 'email'=>'hasan@gmail.com', 'password'=>bcrypt('123456'),
        ]);
        $this->command->info('ok!');
    }
}
