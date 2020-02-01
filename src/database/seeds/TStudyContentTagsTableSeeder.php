<?php

use Illuminate\Database\Seeder;
use App\TStudyContentTag;

class TStudyContentTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'study_id' => 1,
            'tag_id' => 2
        ];
        $studyContentTagData = new TStudyContentTag;
        $studyContentTagData->fill($param)->save();

        $param = [
            'study_id' => 2,
            'tag_id' => 1
        ];
        $studyContentTagData = new TStudyContentTag;
        $studyContentTagData->fill($param)->save();
    }
}
