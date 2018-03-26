<?php

namespace App\Models\TeachersModel;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * 指定表名
     * @var string
     */
    protected $table = 'student';
    /**
     * 指定主键
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * 允许批量赋值的字段
     * @var array
     */
    protected $fillable = ['name','age','sex'];
    /**
     * 不允许批量赋值的字段
     * @var array
     */
    protected $guarded = [];

    /**
     * 时间戳维护
     * @return int
     */
    public function getDateFormat()
    {
        return time();
    }
}
