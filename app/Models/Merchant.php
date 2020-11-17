<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    //表名
    public $table="merchant";
	//主键id
    protected $primaryKey="merchant_id";
   	public $timestamps=false;
}
