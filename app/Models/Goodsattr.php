<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goodsattr extends Model
{
     //表名属性
     public $table="merchant_attribute";
     //主键id
     protected $primaryKey="attr_id";
        public $timestamps=false;
        protected $guarded = [];
}
