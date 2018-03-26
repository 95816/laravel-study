<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>file</title>
</head>
<body>
<form class="form-horizontal" method="post" action="{{ url('test/upload') }}"  enctype="multipart/form-data">
	<?php echo csrf_field() ?>
	图片上传:<input type="file" name='icon'>
	<button type="submit" class="">提交</button>
</form>
</body>
</html>