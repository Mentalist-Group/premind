<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TStudyContentTag extends Model
{
    public static $rules = array(
        'study_id' => 'required',
        'tag_id' => 'required'
    );
}
