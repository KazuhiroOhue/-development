<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memos extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'rank' => 'filled',
        'type' => 'filled',
        'body' => 'required',
    );
}
