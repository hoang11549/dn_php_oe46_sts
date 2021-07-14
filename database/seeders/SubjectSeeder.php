<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subjects')->insert(
            [
                'name' => 'Git',
                'duration' => '2',
                'description' => 'abc',
            ],
            [
                'name' => 'PHP',
                'duration' => '10',
                'description' => 'abc',
            ],
            [
                'name' => 'SQL',
                'duration' => '1',
                'description' => 'abc',
            ],
            [
                'name' => 'Ruby',
                'duration' => '10',
                'description' => 'abc',
            ],
        );
    }
}
