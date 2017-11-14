@extends('vendor.menu.main')

@section('main')
<h1 class="content-right-title">管理及权限-管理员</h1>

<a href="/adminuser/create" class="btn btn-success">添加管理员</a>

<table class="wxtables mgt15">
    <colgroup>
        <col width="20%">
        <col width="20%">
        <col width="40%">
        <col width="20%">
    </colgroup>
    <thead>
    <tr>
        <td>昵称</td>
        <td>所在角色（分组）</td>
        <td>登陆账号</td>
        <td>操作</td>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>@foreach($user->roles as $role) {{$role->name}} @endforeach</td>
        <td>{{$user->username}}</td>
        <td>
            <a href="/adminuser/{{$user->id}}/edit" class="btn btn-mini btn-primary" title="编辑">编辑</a>
            <a class="btn btn-mini btn-danger j-del" title="删除" href="javascript:;" data-href="/adminuser/{{$user->id}}">删除</a>
        </td>
    </tr>
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
