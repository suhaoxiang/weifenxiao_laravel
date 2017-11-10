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
            <col width="75%">
            <col width="15%">
        </colgroup>
        <thead>
        <tr>
            <td>角色ID</td>
            <td>角色名称</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>4003187</td>
            <td><b>产品管理</b></td>
            <td>
                <a href="/System/edit_role/id/4003187" class="btn btn-mini btn-primary" title="编辑">编辑</a>
                <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="4003187" title="删除"
                   onclick="">删除</a>
            </td>
        </tr>
        <tr>
            <td>4003188</td>
            <td><b>网站总编</b></td>
            <td>
                <a href="/System/edit_role/id/4003188" class="btn btn-mini btn-primary" title="编辑">编辑</a>
                <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="4003188" title="删除"
                   onclick="">删除</a>
            </td>
        </tr>
        <tr>
            <td>4003189</td>
            <td><b>订单管理</b></td>
            <td>
                <a href="/System/edit_role/id/4003189" class="btn btn-mini btn-primary" title="编辑">编辑</a>
                <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="4003189" title="删除"
                   onclick="">删除</a>
            </td>
        </tr>
        <tr>
            <td>4003190</td>
            <td><b>会员分销</b></td>
            <td>
                <a href="/System/edit_role/id/4003190" class="btn btn-mini btn-primary" title="编辑">编辑</a>
                <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="4003190" title="删除"
                   onclick="">删除</a>
            </td>
        </tr>
        <tr>
            <td>4003654</td>
            <td><b>财务</b></td>
            <td>
                <a href="/System/edit_role/id/4003654" class="btn btn-mini btn-primary" title="编辑">编辑</a>
                <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="4003654" title="删除"
                   onclick="">删除</a>
            </td>
        </tr>
        <tr>
            <td>4003747</td>
            <td><b>仓管</b></td>
            <td>
                <a href="/System/edit_role/id/4003747" class="btn btn-mini btn-primary" title="编辑">编辑</a>
                <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="4003747" title="删除"
                   onclick="">删除</a>
            </td>
        </tr>
        <tr>
            <td>4004210</td>
            <td><b>全部功能</b></td>
            <td>
                <a href="/System/edit_role/id/4004210" class="btn btn-mini btn-primary" title="编辑">编辑</a>
                <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="4004210" title="删除"
                   onclick="">删除</a>
            </td>
        </tr>
        <tr>
            <td>4004248</td>
            <td><b>供应商</b></td>
            <td>
                <a href="/System/edit_role/id/4004248" class="btn btn-mini btn-primary" title="编辑">编辑</a>
                <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="4004248" title="删除"
                   onclick="">删除</a>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- end wxtables -->
    <div class="tables-btmctrl clearfix">
        <div class="fr">
            <div class="paginate">
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