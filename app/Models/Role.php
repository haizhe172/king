<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //表名
    public $table="role";
	//主键id
    protected $primaryKey="role_id";
       public $timestamps=false;
       protected $guarded = [];
}
