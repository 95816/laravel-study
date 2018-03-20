二.Laravel数据库操作
1.原生方法
	1.1  查询	$students = DB::select('select * from student');
	1.2  删除	$num = DB::delete("delete from student where id = ? ",[103]);
	1.3  更新	$num = DB::update("update student set name=?,sex=? where id=?",['李宁','女','104']);
	1.4  新增	$bool = DB::insert("insert into student (id,name,age,sex) VALUES (?,?,?,?)",['104','kitty',19,'男']);