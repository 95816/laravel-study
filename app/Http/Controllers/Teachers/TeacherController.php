<?php

namespace App\Http\Controllers\Teachers;

use App\HomeModel\Student;
use App\Models\TeachersModel\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use think\Validate;

class TeacherController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function index()
    {
        $res = Teacher::paginate(3);
        return view('teachers.index', ['list' => $res]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function create(Request $request)
    {
        $teacher = new Teacher();
        if ($request->isMethod('post')) {

            //控制器验证
            /*$this->validate($request, [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'max' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',

            ],[
                'Student.name' => '学生姓名',
                'Student.age' => '学生年龄',
                'Student.sex' => '学生性别',
            ]);*/
            //Validator 类验证
            $validator = \Validator::make($request->input(), [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'max' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',

            ], [
                'Student.name' => '学生姓名',
                'Student.age' => '学生年龄',
                'Student.sex' => '学生性别',
            ]);
            if ($validator->fails()) {
                return \redirect()->back()->withErrors($validator)->withInput();
            }

            $input = $request->input('Student');
            $result = Teacher::create($input);
            if ($result) {
                return Redirect::route('teacher.lists')->with('success', '添加成功!');
            } else {
                return \redirect()->back()->with('error', '添加失败!');
            }
        }

        return view('teachers.create', ['teacher' => $teacher]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function update(Request $request,$id)
    {
        $student = Teacher::find($id);
        if ($request->isMethod('post')){
            $data = $request->input('Student');
        }
        return view('teachers.update',['teacher'=>$student]);
    }
}
