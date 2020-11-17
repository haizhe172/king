<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goodstype extends Model
{
    //指定表名类型
    protected $table = 'merchant_goods_type';
    //指定主键
    protected $primaryKey = 'type_id';
    //不自动添加时间 create_at update_at
    public $timestamps = false;
    //黑名单
    protected $guarded=[];
}
