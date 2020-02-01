<?php

use Illuminate\Database\Seeder;
use App\MTag;

class MTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'tag_name' => 'Vue.js'
        ];
        $tagData = new MTag;
        $tagData->fill($param)->save();

        $param = [
            'tag_name' => 'Laravel'
        ];
        $tagData = new MTag;
        $tagData->fill($param)->save();
    }
}
