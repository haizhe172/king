<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $table="menu";
	//主键id
    protected $primaryKey="menu_id";
       public $timestamps=false;
       protected $guarded = [];
}
