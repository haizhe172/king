<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    //表名
    public $table="admin_brand";
	//主键id
    protected $primaryKey="brand_id";
   	public $timestamps=false;
}
