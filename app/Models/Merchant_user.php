<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant_user extends Model
{	
	//表名
    public $table="merchant_user";
	//主键id
    protected $primaryKey="merchant_user_id";
   	public $timestamps=false;
}
