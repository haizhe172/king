<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_news extends Model
{
    //
    public $table="admin_news";
    //主键id
    protected $primaryKey="n_id";
    public $timestamps=false;
}
