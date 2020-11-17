<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //表名
    public $table="merchant_attribute";
	//主键id
    protected $primaryKey="attr_id";
       public $timestamps=false;
       protected $guarded = [];
}
