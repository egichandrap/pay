<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = 'product';
    protected $fillable = ['id','product','shipping', 'price'];

    public function success1()
    {
    	return $this->hasOne('App\Models\Success');
    }
}
