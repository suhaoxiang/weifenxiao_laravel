@extends('vendor.menu.main')

@section('css')

@endsection

@section('main')
<h1 class="content-right-title">管理及权限-权限角色</h1>

<div class="tables-searchbox">
    <a href="/role/create" class="btn btn-success">添加角色</a>
</div>

<div class="tablesWrap">
    <table class="wxtables">
        <colgroup>
            <col width="10%">
            <col width="25%">
            <col width="50%">
            <col width="15%">
        </colgroup>
        <thead>
        <tr>
            <td>角色ID</td>
            <td>角色名称</td>
            <td>系统角色名称</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td><b>{{$v->display_name}}</b></td>
            <td>{{$v->name}}</td>
            <td>
                <a href="/role/{{$v->id}}/edit" class="btn btn-mini btn-primary" title="编辑">编辑</a>
                <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="{{$v->id}}" title="删除"
                   onclick="" data-href="/role/{{$v->id}}">删除</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    <!-- end wxtables -->
    <div class="tables-btmctrl clearfix">
        <div class="fr">
            <div class="paginate">
                {{$data->links()}}
            </div>
            <!-- end paginate -->
        </div>
    </div>
    <!-- end tables-btmctrl -->
</div>
<!-- end tablesWrap -->

@endsection

@section('js')

@endsection