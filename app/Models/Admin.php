<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //表名
    public $table="admin";
	//主键id
    protected $primaryKey="admin_id";
       public $timestamps=false;
       protected $guarded = [];
}
