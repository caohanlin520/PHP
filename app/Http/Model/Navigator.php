<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Navigator extends Model
{
    //
    protected $table = "navigator";
    protected $primaryKey = 'navigator_id';
    public $timestamps = false;
    public $guarded = [];
}
