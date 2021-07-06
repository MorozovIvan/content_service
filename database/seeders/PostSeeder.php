<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'author_id'   => 1,
            'title'       => 'First Post',
            'description' => 'Some long description...',
        ]);

        DB::table('posts')->insert([
            'author_id'   => 1,
            'title'       => 'Second Post',
            'description' => 'Some another long description...',
        ]);

        DB::table('posts')->insert([
            'author_id'   => 2,
            'title'       => 'Third Post',
            'description' => 'Some another long description...',
        ]);
    }
}
