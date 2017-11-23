@extends('vendor.menu.main')

@section('css')

@endsection

@section('main')
<h1 class="content-right-title">编辑权限</h1>

<div class="sysPanel">
    <form action="/permission/{{$data->id}}" method="POST" id="form1">
        <input type="hidden" name="pid" value="{{$data->pid}}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>权限规则：</label>
            <div class="form-controls">
                <input type="text" class="input" name="name" value="{{$data->name}}">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>权限名称：</label>
            <div class="form-controls">
                <input type="text" class="input" name="display_name" value="{{$data->display_name}}">
                <span class="fi-help-text"></span>
            </div>
        </div>
        @if($data->pid == 0)
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>选择图标：</label>
            <div class="form-controls">
                <button class="btn btn-default" role="iconpicker" name="icon" id="iconpicker" data-icon="{{$data->icon}}"></button>
                <span class="fi-help-text"></span>
            </div>
        </div>
        @endif
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>权限简介：</label>
            <div class="form-controls">
                <textarea class="textarea" name="description">{{$data->description}}</textarea>
            </div>
        </div>

        <div class="mgl120">
            <input type="submit" class="btn btn-primary" name="st" value="保存">
        </div>
    </form>
</div>

@endsection

@section('js')
<script>
    require(['iconpicker'],function($){

    })
</script>
@endsection