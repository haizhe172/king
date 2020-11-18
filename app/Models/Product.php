<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     //表名货品
     public $table="merchant_products";
     //主键id
     protected $primaryKey="products_id";
        public $timestamps=false;
        protected $guarded = [];
}
