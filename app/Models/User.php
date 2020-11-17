<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //表名
    public $table="user";
	//主键id
    protected $primaryKey="user_id";
   	public $timestamps=false;
}
