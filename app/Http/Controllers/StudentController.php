<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
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
//        $upd = DB::table('student')->where('id', 104)->update(['name' => 'love of zp', 'age' => 18, 'sex' => 1]);
//        DB::beginTransaction();
//        try {
//            DB::table('student')->where('id', 105)->update(['name' => ' lining1', 'age' => '111', 'sex' => 1]);
//            DB::table('student')->insert(['name' => '平平', 'age' => 22, 'sex' => 1, 'size' => '322']);
//            DB::commit();
//        } catch (QueryException $exception) {
//            DB::rollback();
//            return 'error';
//        }
//        $students = DB::table('student')->where('id','101')->select('id','name','age','sex')->get()->toArray();
//        $students = DB::table('student')->where('id','104')->first();
//        $students = DB::table('student')->where('name','张平')->pluck('name');
//        $students = DB::table('student')->pluck('name','age');
//        $students = DB::table('student')->lists('id', 'name');
        //$students = DB::table('student')->insert(['name'=>'张平','age'=>'30','sex'=>'2']);
//        $students = DB::table('student')->distinct()->select('name')->get();
//        $students = DB::table('student')->orderBy('id','desc')->first();
//        $students = DB::table('student')->select('name as username')->get();
//        $students = DB::table('student')->whereNotBetween('age', [10, 20])->get();
//        $students = DB::table('student')->where('id', '>', '140')->orWhere('name', '张平')->get();
//        $students = DB::table('student')->whereIn('id', [103,105,140])->get();
//        $students = DB::table('student')->whereName('老倪')->first();
        $students = DB::table('student')
            ->whereNameOrAge('dsa', 18)
            ->first();
        dd($students);


    }
}
