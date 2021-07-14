<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Topic extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert(
            [
                'name' => 'PHP',
                'description' => 'abcd',
            ],
            [
                'name' => 'RUBY',
                'description' => 'abcd',
            ],
        );
    }
}
