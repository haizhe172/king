<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    public $table="admin_role";
	//主键id
    protected $primaryKey="id";
       public $timestamps=false;
       protected $guarded = [];
}
