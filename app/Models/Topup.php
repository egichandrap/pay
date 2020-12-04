<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    public $timestamps = false;
    protected $table = 'top-up';
    protected $fillable = ['id','mobileNumber','value'];

    public function success()
    {
    	return $this->hasOne('App\Models\Success');
    }
}