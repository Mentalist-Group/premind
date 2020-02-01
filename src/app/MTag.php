<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MTag extends Model
{
    protected $guarded = array('tag_id');

    public static $rules = array(
        'tag_name' => 'required'
    );
}
