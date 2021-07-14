<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            [
                'imgable_type' => 'course',
                'url' => 'images/users/varun.jpg',
                'imgable_id' => '1',
            ],
            [
                'imgable_type' => 'course',
                'url' => 'images/users/varun.jpg',
                'imgable_id' => '2',
            ],
        );
    }
}
