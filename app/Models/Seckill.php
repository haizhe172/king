<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seckill extends Model
{
    //指定表名
    protected $table = 'seckill';
    //指定主键
    protected $primaryKey = 'seckill_id';
    //不自动添加时间 create_at update_at
    public $timestamps = false;
    //黑名单
    protected $guarded=[];
}
