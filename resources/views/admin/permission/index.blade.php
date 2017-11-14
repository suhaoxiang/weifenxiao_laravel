@extends('vendor.menu.main')

@section('css')

@endsection

@section('main')
<h1 class="content-right-title">权限管理</h1>

<a href="/permission/create" class="btn btn-success">添加顶级权限</a>

<table class="wxtables mgt15">
    <colgroup>
        <col width="30%">
        <col width="30%">
        <col width="40%">
    </colgroup>
    <thead>
    <tr>
        <td>权限规则</td>
        <td>权限名称</td>
        <td>操作</td>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $v)
    <tr>
        <td>{{$v->name}}</td>
        <td>{{$v->display_name}}</td>
        <td>
            @if($v->pid == 0)
            <a href="/permission/{{$v->id}}/create" class="btn btn-primary btn-mini">添加权限</a>
            @endif
            <a href="/permission/{{$v->id}}/edit" class="btn btn-mini btn-success" title="编辑">编辑</a>
            <a class="btn btn-mini btn-danger j-del" title="删除" href="javascript:;" data-id="{{$v->id}}" data-href="/permission/{{$v->id}}">删除</a>
        </td>
    </tr>
        @foreach($v->getPermissionList($v->id) as $son)
        <tr>
            <td>|---{{$son->name}}</td>
            <td>{{$son->display_name}}</td>
            <td>
                <a href="/permission/{{$son->id}}/edit" class="btn btn-mini btn-success" title="编辑">编辑</a>
                <a class="btn btn-mini btn-danger j-del" title="删除" href="javascript:;" data-id="{{$v->id}}" data-href="/permission/{{$son->id}}">删除</a>
            </td>
        </tr>
        @endforeach
    @endforeach
    </tbody>

</table>
<div class="tables-btmctrl clearfix">
    <div class="fr">
        <div class="paginate">
            {{ $data->links() }}
        </div>
        <!-- end paginate -->
    </div>
</div>
@endsection

@section('js')

@endsection