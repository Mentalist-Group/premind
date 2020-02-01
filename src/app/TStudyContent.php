<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TStudyContent extends Model
{
    protected $guarded = array('study_id');

    public static $rules = array(
        'study_title' => 'required',
        'interval_type' => 'required',
        'study_times' => 'required|integer',
        'user_id' => 'required'
    );
}
