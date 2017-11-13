@extends('vendor.menu.main')

@section('css')

@endsection

@section('main')
<h1 class="content-right-title">管理及权限-编辑权限角色</h1>


<form method="POST" action="/role/{{$data->id}}" name="add_role_form" id="add_role_form">
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span> 角色名称：</label>
        <div class="form-controls">
            <input type="text" name="display_name" class="input" value="{{$data->display_name}}">
            <span class="fi-help-text">建议使用中文</span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span> 系统角色名称：</label>
        <div class="form-controls">
            <input type="text" name="name" class="input" value="{{$data->name}}">
            <span class="fi-help-text">建议使用英文</span>
        </div>
    </div>
    <div class="add_role_box">
        @foreach($permissionList as $v)
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox8" class="che-t">
                <label for="checkbox8">{{$v->display_name}}</label>
            </div>
            <ul>
                @foreach($v->getPermissionList($v->id) as $son)
                <li class="menu_li"><input type="checkbox" name="priv[]" id="{{$son->id}}" class="che-li" value="{{$son->id}}"> <label
                        for="{{$son->id}}">{{$son->display_name}}</label></li>
                @endforeach
            </ul>
        </div>
        @endforeach
        <span class="fi-help-text"></span>
    </div>
    {!!csrf_field()!!}
    <div style="margin-left:110px;">
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>

@endsection

@section('js')
<script>
    require(['jquery'],function($){
        $(".che-t").click(function(){
            console.log(1);
            $(this).parents(".add-role-list").find(".che-li").attr("checked",this.checked);
        });
    });
</script>
@endsection