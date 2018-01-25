<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
 	protected $fillable = ['bcycle_id', 'name', 'value'];

    public $timestamps = false;

}
