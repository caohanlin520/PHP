<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Configure extends Model
{
    //
    protected $table = "config";
    protected $primaryKey = 'configure_id';
    public $timestamps = false;
    public $guarded = [];
}
