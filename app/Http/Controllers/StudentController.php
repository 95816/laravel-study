<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function test()
    {
//        $ins = DB::insert("insert into mmp_student (id,name,age,sex) VALUES (?,?,?,?)", ['100', '董克静', 20, '女']);
//        $del = DB::delete("delete from mmp_student where id = 100");
//        $upd = DB::update("update mmp_student set name = ?,sex=?,age=? where id=?",['卢本伟','男','10','149']);
//        $sel = DB::select("select * from mmp_student where id = ?",['101']);
//        $sel = DB::table('student')->where('id','101')->first();
//        $del = DB::table('student')->where('id','<',151)->where('id','>',149)->delete();
        $upd = DB::table('student')->where('id', 104)->update(['name' => 'love of zp', 'age' => 18, 'sex' => 1]);
        dd($upd);
    }
}
