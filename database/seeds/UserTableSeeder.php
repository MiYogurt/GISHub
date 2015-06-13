<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder{
    public function run()
    {
        User::create([
            'email'    => 'admin@vip.qq.com',
            'password' => Hash::make('123456'),
            'name' => 'MiYogurt',
        ]);
    }
}