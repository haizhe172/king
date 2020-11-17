<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    //表名商品类型属性
    public $table="merchant_goods_attr";
	//主键id
    protected $primaryKey="goods_attr_id";
       public $timestamps=false;
       protected $guarded = [];
}
