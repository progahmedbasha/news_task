<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('news')->insert([
            'title' => 'title',
            'content' => '10',
            'publish_date' => '1',
            'active' => '1',
            'user_id' => '1',

        ]);
    }
}
