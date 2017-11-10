@extends('vendor.menu.main')

@section('main')
<h1 class="content-right-title">管理及权限-管理员</h1>

<a href="/adminuser/create" class="btn btn-success">添加管理员</a>
<form action="" method="post">
    <div class="tables-searchbox">
        <select name="admin_group_id" class="select">
            <option value="0">全部</option>
            <option value="4003187">产品管理</option>
            <option value="4003188">网站总编</option>
            <option value="4003189">订单管理</option>
            <option value="4003190">会员分销</option>
            <option value="4003654">财务</option>
            <option value="4003747">仓管</option>
            <option value="4004210">全部功能</option>
            <option value="4004248">供应商</option>
        </select>
        <input type="text" placeholder="联系人" class="input" name="name" value="">
        <button class="btn" style="line-height:26px;"><i class="gicon-search"></i>查询</button>
    </div>
</form>
<table class="wxtables mgt15">
    <colgroup>
        <col width="20%">
        <col width="20%">
        <col width="40%">
        <col width="20%">
    </colgroup>
    <thead>
    <tr>
        <td>联系人</td>
        <td>所在角色（分组）</td>
        <td>登陆账号</td>
        <td>操作</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>张三</td>
        <td>产品管理</td>
        <td>13396048861</td>
        <td>
            <a href="/System/edit_admin/id/4005659" class="btn btn-mini btn-primary" title="编辑">编辑</a>
            <a class="btn btn-mini btn-danger j-del" title="删除" href="javascript:;" data-id="4005659">删除</a>
        </td>
    </tr>
    <tr>
        <td>王亚辉</td>
        <td>网站总编</td>
        <td>15515651778</td>
        <td>
            <a href="/System/edit_admin/id/4004112" class="btn btn-mini btn-primary" title="编辑">编辑</a>
            <a class="btn btn-mini btn-danger j-del" title="删除" href="javascript:;" data-id="4004112">删除</a>
        </td>
    </tr>
    <tr>
        <td>李元龙</td>
        <td>仓管</td>
        <td>18267901550</td>
        <td>
            <a href="/System/edit_admin/id/4004905" class="btn btn-mini btn-primary" title="编辑">编辑</a>
            <a class="btn btn-mini btn-danger j-del" title="删除" href="javascript:;" data-id="4004905">删除</a>
        </td>
    </tr>
    <tr>
        <td>小张</td>
        <td>全部功能</td>
        <td>18815282684</td>
        <td>
            <a href="/System/edit_admin/id/4005670" class="btn btn-mini btn-primary" title="编辑">编辑</a>
            <a class="btn btn-mini btn-danger j-del" title="删除" href="javascript:;" data-id="4005670">删除</a>
        </td>
    </tr>
    </tbody>

</table>
<div class="tables-btmctrl clearfix">
    <div class="fr">
        <div class="paginate">
        </div>
        <!-- end paginate -->
    </div>
</div>

@endsection


@section('js')

@endsection
