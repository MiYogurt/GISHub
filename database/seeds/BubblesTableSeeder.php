<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Bubble;

class BubblesTableSeeder extends Seeder{
    public function run()
    {
        Bubble::create([
            'user_id'    => '1',
            'content' => '今天的天气非常的好!',
            'created_at' => '2015-05-28'
        ]);
    }
}