<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert(
            [
                'name' => 'git basic',
                'url_document' => 'https://drive.google.com/drive/u/1/folders/1GeeX-3Ig72pjRHEFCwtnrwLC7gufYf3p',
                'subject_id' => '1',
            ],
            [
                'name' => 'git master',
                'url_document' => 'https://chris.beams.io/posts/git-commit/',
                'subject_id' => '1',
            ],
            [
                'name' => 'git advance',
                'url_document' => 'https://www.youtube.com/watch?v=OBCnmcgx4CE',
                'subject_id' => '1',
            ],
            [
                'name' => 'PHP',
                'url_document' => 'https://chris.beams.io/posts/git-commit/',
                'subject_id' => '2',
            ],
        );
    }
}
