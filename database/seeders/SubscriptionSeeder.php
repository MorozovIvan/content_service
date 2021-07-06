<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'user_id'   => 1,
            'author_id' => 2,
        ]);
    }
}
