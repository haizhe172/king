<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_cate extends Model
{
    public $table="admin_cate";
    //主键id
    protected $primaryKey="cate_id";
    public $timestamps=false;
}
