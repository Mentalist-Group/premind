<?php

use Illuminate\Database\Seeder;
use App\TStudyContent;

class TStudyContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'study_title' => 'テストタイトル1',
            'content' => 'テスト内容1',
            'interval_type' => 'A',
            'study_times' => 1,
            'user_id' => 2
        ];
        $studyData = new TStudyContent;
        $studyData->fill($param)->save();

        $param = [
            'study_title' => 'テストタイトル2',
            'content' => 'テスト内容2',
            'interval_type' => 'B',
            'study_times' => 2,
            'user_id' => 1
        ];
        $studyData = new TStudyContent;
        $studyData->fill($param)->save();
    }
}
