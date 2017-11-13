@extends('vendor.menu.main')

@section('css')

@endsection

@section('main')
<h1 class="content-right-title">编辑管理员</h1>

<div class="sysPanel">
    <form action="/adminuser" method="POST" id="form1">
        {{ csrf_field() }}
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>管理姓名：</label>
            <div class="form-controls">
                <input type="text" class="input" name="name" value="{{$data->name}}">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>账号：</label>
            <div class="form-controls">
                <input type="text" class="input" name="username" value="{{$data->username}}">
                <span class="fi-help-text alert_error">请输入手机号</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>密码：</label>
            <div class="form-controls">
                <input type="password" class="input" name="password">
                <span class="fi-help-text">密码长度在6~21位</span>
            </div>
        </div>

        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>重复密码：</label>
            <div class="form-controls">
                <input type="password" class="input" name="password_confirmation">
                <span class="fi-help-text">密码长度在6~21位</span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>所属分组：</label>
            <div class="form-controls">
                <select name="role_id" class="select">
                    <option value="0" selected="">--请选择--</option>
                    <option value="1">全部功能</option>
                    <option value="2">供应商</option>
                </select>
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="mgl120">
            <input type="submit" class="btn btn-primary" name="st" value="保存">
        </div>
    </form>
</div>
@endsection

@section('js')

@endsection