二.Laravel数据库操作
1.原生方法操作
	1.1  查询	$students = DB::select('select * from mmp_student');
	1.2  删除	$num = DB::delete("delete from mmp_student where id = ? ",[103]);
	1.3  更新	$num = DB::update("update mmp_student set name=?,sex=? where id=?",['李宁','女','104']);
	1.4  新增	$bool = DB::insert("insert into mmp_student (id,name,age,sex) VALUES (?,?,?,?)",['104','kitty',19,'男']);

2.查询构造器操作
	2.1  查询	
		$students = DB::table('student')->get();	查询所有数据
		$students = DB::table('student')->select('id','name','age','sex')->get();	指定字段查询
		$students = DB::table('student')->distinct()->select('name')->get();	查询不重复结果集
		$students = DB::table('student')->orderBy('id','desc')->first();		排序查找
        $students = DB::table('student')->select('name as username')->get();	字段重命名
        $students = DB::table('student')->whereNotBetween('age',[10,20])->get();范围查找
        $students = DB::table('student')->whereIn('id', [103,105,140])->get();
		$students = DB::table('student')->whereId/whereName(101)->first();
		$students = DB::table('student')->whereNameOrAge('dsa', 18)->first();
		DB::table('users')
		    ->join('student', 'users.id', '=', 'student.user_id')
		    ->join('orders', 'users.id', '=', 'orders.user_id')
		    ->select('users.id', 'student.phone', 'orders.price')
		    ->get();基本join查询
	2.2  插入
		DB::table('student')->insert(
		  ['name' => 'john@example.com', 'age' => 10]
		);
		$id = DB::table('student')->insertGetId(
		  ['name' => 'john@example.com', 'age' => 10]
		);
		DB::table('student')->insert([
		  ['name' => 'taylor@example.com', 'age' => 10],
		  ['name' => 'dayle@example.com', 'age' => 10]
		]);
	2.3 更新
		DB::table('student')
          ->where('id', 1)
          ->update(['votes' => 1]);
		DB::table('student')->increment('age');
		DB::table('student')->increment('age', 5);
		DB::table('student')->decrement('age');
		DB::table('student')->decrement('age', 5);
		DB::table('student')->increment('age', 1, ['name' => 'John']);
	2.3 删除
		DB::table('users')->where('age', '<', 100)->delete();
		DB::table('users')->delete();
		DB::table('users')->truncate();
	2.4 聚合
		$name = DB::table('student')->count();
		$age = DB::table('student')->max('age');
		$age = DB::table('student')->min('age');
		$age = DB::table('student')->avg('age');
		$total = DB::table('student')->sum('age');
3.数据库事物支持
	DB::beginTransaction();
    try {
        DB::table('student')->where('id', 105)->update(['name' => ' lining1', 'age' => '111', 'sex' => 1]);
        DB::table('student')->insert(['name' => '平平', 'age' => 22, 'sex' => 1, 'size' => '322']);
        DB::commit();
    } catch (QueryException $exception) {
        DB::rollback();
        return 'error';
    }
