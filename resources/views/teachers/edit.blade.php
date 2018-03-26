
@extends('common.layouts')

@section('content')
    <form class="form-horizontal" method="post" action="{{ url('teacher/save') }}">
        <?php echo csrf_field() ?>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">姓名</label>

            <div class="col-sm-5">
                <input type="text" name="name" class="form-control" id="name"
                       value="<?php echo $list['name'] ?>"
                       placeholder="请输入学生姓名">
            </div>
            <div class="col-sm-5">
                <p class="form-control-static text-danger"></p>
            </div>
        </div>
        <div class="form-group">
            <label for="age" class="col-sm-2 control-label">年龄</label>

            <div class="col-sm-5">
                <input type="text" name='age' class="form-control" id="age"
                       value="<?php  echo $list['age'] ?>"
                       placeholder="请输入学生年龄">
            </div>
            <div class="col-sm-5">
                <p class="form-control-static text-danger"></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">性别</label>

            <div class="col-sm-8">
                <label class="radio-inline">
                    男<input type="radio" name='sex' value="1" style="margin-left:10px;" <?php if($list['sex'] == 1) echo 'checked'?> >
                </label>
                <label class="radio-inline">
                    <input type="radio" name='sex' value="2" style="margin-left: 20px;" <?php if($list['sex'] ==2) echo 'checked'?> >女
                </label>
            </div>
            <div class="col-sm-5">
                <p class="form-control-static text-danger"></p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </div>
    </form>
@stop