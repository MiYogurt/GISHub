<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NoticeTableSeeder extends Seeder{
    public function run()
    {
        \DB::table('notice')->insertGetId(['content' => 'GIStar']);
    }
}
