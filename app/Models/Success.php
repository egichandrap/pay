<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Success extends Model
{
    public $timestamps = false;
    protected $table = 'success_order';
    protected $fillable = ['user_id','topup_id','product_id','orderNo', 'topupBalance', 'productPage', 'date'];

    public function topup()
    {
    	return $this->belongsTo('App\Models\Topup');
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}
