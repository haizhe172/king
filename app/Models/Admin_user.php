<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Admin_user extends Model
{
    //表名
    public $table="admin_user";
	//主键id
    protected $primaryKey="admin_user_id";
   	public $timestamps=false;
}
