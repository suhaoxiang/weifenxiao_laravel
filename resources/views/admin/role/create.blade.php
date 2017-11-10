@extends('vendor.menu.main')

@section('css')

@endsection

@section('main')
<h1 class="content-right-title">管理及权限-添加权限角色</h1>


<form method="POST" action="" name="add_role_form" id="add_role_form">
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span> 角色名称：</label>
        <div class="form-controls">
            <input type="text" name="role_name" class="input" id="role_name" placeholder="">
            <span class="fi-help-text"></span>
        </div>
    </div>
    <div class="add_role_box">
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox8" class="che-t">
                <label for="checkbox8">首页</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="0901" class="che-li" value="0901"> <label
                        for="0901">首页</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox0" class="che-t">
                <label for="checkbox0">店铺</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="0102" class="che-li" value="0102"> <label
                        for="0102">店铺主页</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0103" class="che-li" value="0103"> <label
                        for="0103">会员主页</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0104" class="che-li" value="0104"> <label
                        for="0104">店铺导航</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0105" class="che-li" value="0105"> <label
                        for="0105">分销说明</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0107" class="che-li" value="0107"> <label
                        for="0107">添加通用模块</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0108" class="che-li" value="0108"> <label
                        for="0108">编辑通用模块</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0109" class="che-li" value="0109"> <label
                        for="0109">删除通用模块</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0110" class="che-li" value="0110"> <label
                        for="0110">批量删除通用模块</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0112" class="che-li" value="0112"> <label
                        for="0112">编辑店铺</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0111" class="che-li" value="0111"> <label
                        for="0111">店铺首页备份列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0113" class="che-li" value="0113"> <label
                        for="0113">店铺首页备份操作</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0139" class="che-li" value="0139"> <label
                        for="0139">会员名片</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0126" class="che-li" value="0126"> <label
                        for="0126">分销名片</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0151" class="che-li" value="0151"> <label
                        for="0151">清除名片缓存</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0106" class="che-li" value="0106"> <label
                        for="0106">自定义通用模块</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0127" class="che-li" value="0127"> <label
                        for="0127">详情页公共模块</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0129" class="che-li" value="0129"> <label
                        for="0129">商品限购提示页</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0132" class="che-li" value="0132"> <label
                        for="0132">微社区</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0133" class="che-li" value="0133"> <label
                        for="0133">微社区详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0134" class="che-li" value="0134"> <label
                        for="0134">发布贴子</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0135" class="che-li" value="0135"> <label
                        for="0135">批量删除帖子</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0136" class="che-li" value="0136"> <label
                        for="0136">回复贴子</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0137" class="che-li" value="0137"> <label
                        for="0137">删除回帖</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0146" class="che-li" value="0146"> <label
                        for="0146">自定义会员名片</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0147" class="che-li" value="0147"> <label
                        for="0147">自定义分销名片</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0149" class="che-li" value="0149"> <label
                        for="0149">图片分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0150" class="che-li" value="0150"> <label
                        for="0150">图片列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0114" class="che-li" value="0114"> <label
                        for="0114">分销专题</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0115" class="che-li" value="0115"> <label
                        for="0115">专题分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0116" class="che-li" value="0116"> <label
                        for="0116">创建分销专题</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0117" class="che-li" value="0117"> <label
                        for="0117">编辑分销专题</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0118" class="che-li" value="0118"> <label
                        for="0118">删除分销专题</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0119" class="che-li" value="0119"> <label
                        for="0119">批量删除分销专题</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0120" class="che-li" value="0120"> <label
                        for="0120">批量下架分销专题</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0121" class="che-li" value="0121"> <label
                        for="0121">批量上架分销专题</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0152" class="che-li" value="0152"> <label
                        for="0152">查看留言</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0153" class="che-li" value="0153"> <label
                        for="0153">回复留言</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0154" class="che-li" value="0154"> <label
                        for="0154">修改回复</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0155" class="che-li" value="0155"> <label
                        for="0155">删除留言</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0122" class="che-li" value="0122"> <label
                        for="0122">创建专题分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0123" class="che-li" value="0123"> <label
                        for="0123">编辑专题分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0124" class="che-li" value="0124"> <label
                        for="0124">删除专题分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0125" class="che-li" value="0125"> <label
                        for="0125">批量删除专题分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0130" class="che-li" value="0130"> <label
                        for="0130">APP设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0128" class="che-li" value="0128"> <label
                        for="0128">APP下载</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0131" class="che-li" value="0131"> <label
                        for="0131">APP会员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="01100" class="che-li" value="01100"> <label
                        for="01100">ERP列表</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox1" class="che-t">
                <label for="checkbox1">商品</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="0201" class="che-li" value="0201"> <label
                        for="0201">发布商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0202" class="che-li" value="0202"> <label
                        for="0202">删除商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0218" class="che-li" value="0218"> <label
                        for="0218">添加评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0261" class="che-li" value="0261"> <label
                        for="0261">批量待上架</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0203" class="che-li" value="0203"> <label
                        for="0203">批量上架商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0259" class="che-li" value="0259"> <label
                        for="0259">批量下架商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0260" class="che-li" value="0260"> <label
                        for="0260">批量删除商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0204" class="che-li" value="0204"> <label
                        for="0204">商品批量分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0205" class="che-li" value="0205"> <label
                        for="0205">批量(开启/关闭)等级折扣</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0206" class="che-li" value="0206"> <label
                        for="0206">出售中的商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0207" class="che-li" value="0207"> <label
                        for="0207">仓库中的商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0208" class="che-li" value="0208"> <label
                        for="0208">已售罄的商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0236" class="che-li" value="0236"> <label
                        for="0236">警戒的商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0247" class="che-li" value="0247"> <label
                        for="0247">待上架</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0244" class="che-li" value="0244"> <label
                        for="0244">商品销售排行</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0245" class="che-li" value="0245"> <label
                        for="0245">商品销售详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0220" class="che-li" value="0220"> <label
                        for="0220">更新商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0224" class="che-li" value="0224"> <label
                        for="0224">是否置顶</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0223" class="che-li" value="0223"> <label
                        for="0223">自定义类目</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0225" class="che-li" value="0225"> <label
                        for="0225">添加自定义类目</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0226" class="che-li" value="0226"> <label
                        for="0226">编辑自定义类目</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0227" class="che-li" value="0227"> <label
                        for="0227">删除自定义类目</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0228" class="che-li" value="0228"> <label
                        for="0228">批量删除自定义类目</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0229" class="che-li" value="0229"> <label
                        for="0229">批量导出到1688</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0230" class="che-li" value="0230"> <label
                        for="0230">复制商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0231" class="che-li" value="0231"> <label
                        for="0231">批量修改价格</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0256" class="che-li" value="0256"> <label
                        for="0256">批量修改库存</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0238" class="che-li" value="0238"> <label
                        for="0238">批量修改分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0239" class="che-li" value="0239"> <label
                        for="0239">修改商品SKU价格,库存,标题</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0242" class="che-li" value="0242"> <label
                        for="0242">解除淘宝店铺绑定</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0243" class="che-li" value="0243"> <label
                        for="0243">商品导出</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0249" class="che-li" value="0249"> <label
                        for="0249">批量修改商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0250" class="che-li" value="0250"> <label
                        for="0250">虚拟商品库</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0251" class="che-li" value="0251"> <label
                        for="0251">操作虚拟商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0253" class="che-li" value="0253"> <label
                        for="0253">上传虚拟商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0257" class="che-li" value="0257"> <label
                        for="0257">导出虚拟商品订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0254" class="che-li" value="0254"> <label
                        for="0254">添加删除复购</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0255" class="che-li" value="0255"> <label
                        for="0255">门店自提</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0209" class="che-li" value="0209"> <label
                        for="0209">商品分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0210" class="che-li" value="0210"> <label
                        for="0210">编辑分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0211" class="che-li" value="0211"> <label
                        for="0211">添加分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0212" class="che-li" value="0212"> <label
                        for="0212">删除分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0213" class="che-li" value="0213"> <label
                        for="0213">批量删除分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0241" class="che-li" value="0241"> <label
                        for="0241">批量编辑分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0232" class="che-li" value="0232"> <label
                        for="0232">商品分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0233" class="che-li" value="0233"> <label
                        for="0233">添加分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0234" class="che-li" value="0234"> <label
                        for="0234">编辑分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0235" class="che-li" value="0235"> <label
                        for="0235">删除分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0237" class="che-li" value="0237"> <label
                        for="0237">批量删除分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0214" class="che-li" value="0214"> <label
                        for="0214">淘宝商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0240" class="che-li" value="0240"> <label
                        for="0240">一键更新此店商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0215" class="che-li" value="0215"> <label
                        for="0215">数据包导入</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0219" class="che-li" value="0219"> <label
                        for="0219">1688商品导入</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0222" class="che-li" value="0222"> <label
                        for="0222">备份商品导入</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0258" class="che-li" value="0258"> <label
                        for="0258">商品助手</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox2" class="che-t">
                <label for="checkbox2">订单</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="0301" class="che-li" value="0301"> <label
                        for="0301">所有订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0302" class="che-li" value="0302"> <label
                        for="0302">订单详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0303" class="che-li" value="0303"> <label
                        for="0303">标记发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0329" class="che-li" value="0329"> <label
                        for="0329">标记发货(免物流)</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0348" class="che-li" value="0348"> <label
                        for="0348">标记发货(送礼订单)</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0333" class="che-li" value="0333"> <label
                        for="0333">修改地址</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0304" class="che-li" value="0304"> <label
                        for="0304">批量标记发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0305" class="che-li" value="0305"> <label
                        for="0305">关闭订单,修改价格</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0326" class="che-li" value="0326"> <label
                        for="0326">确认付款</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0306" class="che-li" value="0306"> <label
                        for="0306">批量关闭订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0307" class="che-li" value="0307"> <label
                        for="0307">删除订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0336" class="che-li" value="0336"> <label
                        for="0336">恢复订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0308" class="che-li" value="0308"> <label
                        for="0308">批量删除订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0339" class="che-li" value="0339"> <label
                        for="0339">批量恢复删除订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0309" class="che-li" value="0309"> <label
                        for="0309">打印发货单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0310" class="che-li" value="0310"> <label
                        for="0310">批量打印快递单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0311" class="che-li" value="0311"> <label
                        for="0311">导出订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03103" class="che-li" value="03103"> <label
                        for="03103">导出身份证图片</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0312" class="che-li" value="0312"> <label
                        for="0312">删除日志</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0327" class="che-li" value="0327"> <label
                        for="0327">删除日志详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0328" class="che-li" value="0328"> <label
                        for="0328">备份订单导入</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0337" class="che-li" value="0337"> <label
                        for="0337">标记收货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0330" class="che-li" value="0330"> <label
                        for="0330">设置备注</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0331" class="che-li" value="0331"> <label
                        for="0331">修改发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0332" class="che-li" value="0332"> <label
                        for="0332">查看物流</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0334" class="che-li" value="0334"> <label
                        for="0334">修改自提地址</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0345" class="che-li" value="0345"> <label
                        for="0345">批量发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03100" class="che-li" value="03100"> <label
                        for="03100">电子面单批量发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0340" class="che-li" value="0340"> <label
                        for="0340">限时秒杀订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0341" class="che-li" value="0341"> <label
                        for="0341">限时打折订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0342" class="che-li" value="0342"> <label
                        for="0342">砍价订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03792" class="che-li" value="03792"> <label
                        for="03792">拼团活动订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0343" class="che-li" value="0343"> <label
                        for="0343">搭配套餐订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03632" class="che-li" value="03632"> <label
                        for="03632">积分兑换商品订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03104" class="che-li" value="03104"> <label
                        for="03104">删除积分兑换商品订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03647" class="che-li" value="03647"> <label
                        for="03647">游戏获奖订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03648" class="che-li" value="03648"> <label
                        for="03648">获奖订单详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0380" class="che-li" value="0380"> <label
                        for="0380">获奖订单标记发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0385" class="che-li" value="0385"> <label
                        for="0385">获奖订单批量标记发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0350" class="che-li" value="0350"> <label
                        for="0350">修改奖品自提地址</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0397" class="che-li" value="0397"> <label
                        for="0397">删除游戏获奖订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0398" class="che-li" value="0398"> <label
                        for="0398">查看删除游戏获奖订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0399" class="che-li" value="0399"> <label
                        for="0399">恢复游戏获奖订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03700" class="che-li" value="03700"> <label
                        for="03700">批量恢复游戏获奖订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0351" class="che-li" value="0351"> <label
                        for="0351">修改奖品快递信息</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0352" class="che-li" value="0352"> <label
                        for="0352">查看奖品物流</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0353" class="che-li" value="0353"> <label
                        for="0353">修改奖品收货地址</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0354" class="che-li" value="0354"> <label
                        for="0354">奖品标记收货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0344" class="che-li" value="0344"> <label
                        for="0344">试用活动订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03106" class="che-li" value="03106"> <label
                        for="03106">周期购订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03107" class="che-li" value="03107"> <label
                        for="03107">周期购订单标记发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03108" class="che-li" value="03108"> <label
                        for="03108">周期购订单修改物流</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0313" class="che-li" value="0313"> <label
                        for="0313">退换货审核</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0314" class="che-li" value="0314"> <label
                        for="0314">退换货审核详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0335" class="che-li" value="0335"> <label
                        for="0335">退换货操作</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0316" class="che-li" value="0316"> <label
                        for="0316">商品评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0317" class="che-li" value="0317"> <label
                        for="0317">删除评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0338" class="che-li" value="0338"> <label
                        for="0338">回复评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0318" class="che-li" value="0318"> <label
                        for="0318">批量删除评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0319" class="che-li" value="0319"> <label
                        for="0319">隐藏评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0320" class="che-li" value="0320"> <label
                        for="0320">显示评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0321" class="che-li" value="0321"> <label
                        for="0321">自定义评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0322" class="che-li" value="0322"> <label
                        for="0322">删除自定义评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0323" class="che-li" value="0323"> <label
                        for="0323">批量删除自定义评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0324" class="che-li" value="0324"> <label
                        for="0324">隐藏自定义评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0325" class="che-li" value="0325"> <label
                        for="0325">显示自定义评价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0346" class="che-li" value="0346"> <label
                        for="0346">商品评价导入</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03601" class="che-li" value="03601"> <label
                        for="03601">退货理由</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0347" class="che-li" value="0347"> <label
                        for="0347">ajax商品评价导入</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="03102" class="che-li" value="03102"> <label
                        for="03102">付款查询</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox7" class="che-t">
                <label for="checkbox7">会员</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="0801" class="che-li" value="0801"> <label
                        for="0801">会员列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0802" class="che-li" value="0802"> <label
                        for="0802">设置会员等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0803" class="che-li" value="0803"> <label
                        for="0803">批量设置会员等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0804" class="che-li" value="0804"> <label
                        for="0804">批量设置分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0805" class="che-li" value="0805"> <label
                        for="0805">送积分</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0845" class="che-li" value="0845"> <label
                        for="0845">送虚拟币</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0806" class="che-li" value="0806"> <label
                        for="0806">会员详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0807" class="che-li" value="0807"> <label
                        for="0807">会员编辑</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0808" class="che-li" value="0808"> <label
                        for="0808">设为分销商</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0833" class="che-li" value="0833"> <label
                        for="0833">批量设置分销商</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0809" class="che-li" value="0809"> <label
                        for="0809">调整余额</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0810" class="che-li" value="0810"> <label
                        for="0810">删除会员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0839" class="che-li" value="0839"> <label
                        for="0839">彻底删除会员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0835" class="che-li" value="0835"> <label
                        for="0835">恢复会员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0836" class="che-li" value="0836"> <label
                        for="0836">批量删除会员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0840" class="che-li" value="0840"> <label
                        for="0840">批量彻底删除会员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0837" class="che-li" value="0837"> <label
                        for="0837">批量恢复会员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0811" class="che-li" value="0811"> <label
                        for="0811">会员等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0812" class="che-li" value="0812"> <label
                        for="0812">编辑等级信息</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0831" class="che-li" value="0831"> <label
                        for="0831">添加等级信息</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0832" class="che-li" value="0832"> <label
                        for="0832">删除等级信息</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0813" class="che-li" value="0813"> <label
                        for="0813">设置上级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0814" class="che-li" value="0814"> <label
                        for="0814">会员权益</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0816" class="che-li" value="0816"> <label
                        for="0816">站内信</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0817" class="che-li" value="0817"> <label
                        for="0817">添加站内信</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0818" class="che-li" value="0818"> <label
                        for="0818">编辑站内信</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0819" class="che-li" value="0819"> <label
                        for="0819">删除站内信</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0820" class="che-li" value="0820"> <label
                        for="0820">批量删除站内信</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0821" class="che-li" value="0821"> <label
                        for="0821">发送站内信</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0822" class="che-li" value="0822"> <label
                        for="0822">会员分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0823" class="che-li" value="0823"> <label
                        for="0823">添加分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0824" class="che-li" value="0824"> <label
                        for="0824">编辑分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0825" class="che-li" value="0825"> <label
                        for="0825">删除分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0826" class="che-li" value="0826"> <label
                        for="0826">批量删除分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0827" class="che-li" value="0827"> <label
                        for="0827">送优惠券</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0829" class="che-li" value="0829"> <label
                        for="0829">批量送优惠券</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0844" class="che-li" value="0844"> <label
                        for="0844">发红包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0828" class="che-li" value="0828"> <label
                        for="0828">备份会员导入</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0830" class="che-li" value="0830"> <label
                        for="0830">发送站内信</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0838" class="che-li" value="0838"> <label
                        for="0838">重置会员支付密码</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0841" class="che-li" value="0841"> <label
                        for="0841">批量调整积分</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0842" class="che-li" value="0842"> <label
                        for="0842">批量调整余额</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0843" class="che-li" value="0843"> <label
                        for="0843">批量取消分销资质</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox3" class="che-t">
                <label for="checkbox3">分销代理</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="0401" class="che-li" value="0401"> <label
                        for="0401">分销商审核</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0402" class="che-li" value="0402"> <label
                        for="0402">分销商管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0403" class="che-li" value="0403"> <label
                        for="0403">分销商详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0404" class="che-li" value="0404"> <label
                        for="0404">设置分销商等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0405" class="che-li" value="0405"> <label
                        for="0405">批量设置分销商等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0406" class="che-li" value="0406"> <label
                        for="0406">取消分销商资格</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0407" class="che-li" value="0407"> <label
                        for="0407">分销商等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0408" class="che-li" value="0408"> <label
                        for="0408">添加分销商等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0409" class="che-li" value="0409"> <label
                        for="0409">编辑分销商等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0410" class="che-li" value="0410"> <label
                        for="0410">删除分销商等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0411" class="che-li" value="0411"> <label
                        for="0411">账务报表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0412" class="che-li" value="0412"> <label
                        for="0412">分销商订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0422" class="che-li" value="0422"> <label
                        for="0422">分销商分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0423" class="che-li" value="0423"> <label
                        for="0423">添加分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0424" class="che-li" value="0424"> <label
                        for="0424">编辑分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0425" class="che-li" value="0425"> <label
                        for="0425">删除分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0426" class="che-li" value="0426"> <label
                        for="0426">批量删除分组</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0413" class="che-li" value="0413"> <label
                        for="0413">佣金排名设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0414" class="che-li" value="0414"> <label
                        for="0414">添加分销商排名</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0415" class="che-li" value="0415"> <label
                        for="0415">编辑分销商排名</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0416" class="che-li" value="0416"> <label
                        for="0416">删除分销商排名</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0417" class="che-li" value="0417"> <label
                        for="0417">批量删除分销商排名</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0418" class="che-li" value="0418"> <label
                        for="0418">佣金调整日志</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0420" class="che-li" value="0420"> <label
                        for="0420">调整佣金</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0428" class="che-li" value="0428"> <label
                        for="0428">发红包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0421" class="che-li" value="0421"> <label
                        for="0421">分销商审核日志</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0427" class="che-li" value="0427"> <label
                        for="0427">分销商审核详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0456" class="che-li" value="0456"> <label
                        for="0456">设置分销商到期时间</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0473" class="che-li" value="0473"> <label
                        for="0473">批量设置分销商到期时间</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox4" class="che-t">
                <label for="checkbox4">财务</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="0501" class="che-li" value="0501"> <label
                        for="0501">提现申请管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0517" class="che-li" value="0517"> <label
                        for="0517">佣金转余额审核列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0518" class="che-li" value="0518"> <label
                        for="0518">佣金转余额审核</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0508" class="che-li" value="0508"> <label
                        for="0508">提现审核</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0509" class="che-li" value="0509"> <label
                        for="0509">提现发放</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0510" class="che-li" value="0510"> <label
                        for="0510">提现批量发放</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0514" class="che-li" value="0514"> <label
                        for="0514">微信批量发放</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0515" class="che-li" value="0515"> <label
                        for="0515">微信一键发放</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0512" class="che-li" value="0512"> <label
                        for="0512">提现驳回</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0524" class="che-li" value="0524"> <label
                        for="0524">线下充值管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0525" class="che-li" value="0525"> <label
                        for="0525">线下充值确认付款</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0526" class="che-li" value="0526"> <label
                        for="0526">线下充值删除</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0503" class="che-li" value="0503"> <label
                        for="0503">提现记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0520" class="che-li" value="0520"> <label
                        for="0520">驳回记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0519" class="che-li" value="0519"> <label
                        for="0519">红包记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0504" class="che-li" value="0504"> <label
                        for="0504">账号充值记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0513" class="che-li" value="0513"> <label
                        for="0513">资金监控日志</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0505" class="che-li" value="0505"> <label
                        for="0505">分销商佣金</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0507" class="che-li" value="0507"> <label
                        for="0507">佣金详情</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox5" class="che-t">
                <label for="checkbox5">营销</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="0639" class="che-li" value="0639"> <label
                        for="0639">限时秒杀</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0640" class="che-li" value="0640"> <label
                        for="0640">添加\编辑限时秒杀</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0655" class="che-li" value="0655"> <label
                        for="0655">批量删除限时秒杀</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0643" class="che-li" value="0643"> <label
                        for="0643">限时打折</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0659" class="che-li" value="0659"> <label
                        for="0659">砍价管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0662" class="che-li" value="0662"> <label
                        for="0662">投票管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0679" class="che-li" value="0679"> <label
                        for="0679">投票审核</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0644" class="che-li" value="0644"> <label
                        for="0644">添加\编辑限时打折</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0645" class="che-li" value="0645"> <label
                        for="0645">抢红包拉粉丝</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0646" class="che-li" value="0646"> <label
                        for="0646">添加\编辑微信红包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0660" class="che-li" value="0660"> <label
                        for="0660">添加\编辑砍价商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0661" class="che-li" value="0661"> <label
                        for="0661">批量删除砍价商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0669" class="che-li" value="0669"> <label
                        for="0669">砍价日志</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0663" class="che-li" value="0663"> <label
                        for="0663">添加/编辑投票</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0664" class="che-li" value="0664"> <label
                        for="0664">删除投票</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0665" class="che-li" value="0665"> <label
                        for="0665">投票详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06785" class="che-li" value="06785"> <label
                        for="06785">微助力管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06786" class="che-li" value="06786"> <label
                        for="06786">微助力添加</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06787" class="che-li" value="06787"> <label
                        for="06787">微助力修改</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06788" class="che-li" value="06788"> <label
                        for="06788">微助力删除</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06789" class="che-li" value="06789"> <label
                        for="06789">微助力排名</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06795" class="che-li" value="06795"> <label
                        for="06795">众筹列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06797" class="che-li" value="06797"> <label
                        for="06797">添加/编辑众筹</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06798" class="che-li" value="06798"> <label
                        for="06798">删除众筹</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06799" class="che-li" value="06799"> <label
                        for="06799">发布众筹</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067100" class="che-li" value="067100"> <label
                        for="067100">取消众筹</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067101" class="che-li" value="067101"> <label
                        for="067101">众筹装修</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067102" class="che-li" value="067102"> <label
                        for="067102">众筹进展</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067103" class="che-li" value="067103"> <label
                        for="067103">添加众筹进展</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067104" class="che-li" value="067104"> <label
                        for="067104">删除众筹进展</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067105" class="che-li" value="067105"> <label
                        for="067105">众筹订单列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067106" class="che-li" value="067106"> <label
                        for="067106">众筹订单详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067107" class="che-li" value="067107"> <label
                        for="067107">众筹订单标记发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067108" class="che-li" value="067108"> <label
                        for="067108">众筹订单确认收货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067233" class="che-li" value="067233"> <label
                        for="067233">众筹订单修改地址</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067109" class="che-li" value="067109"> <label
                        for="067109">添加/编辑众筹回报</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067110" class="che-li" value="067110"> <label
                        for="067110">删除众筹回报</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067111" class="che-li" value="067111"> <label
                        for="067111">导出众筹订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067200" class="che-li" value="067200"> <label
                        for="067200">微现场</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067201" class="che-li" value="067201"> <label
                        for="067201">微现场活动功能</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067202" class="che-li" value="067202"> <label
                        for="067202">微现场活动数据</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067203" class="che-li" value="067203"> <label
                        for="067203">添加微现场</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067204" class="che-li" value="067204"> <label
                        for="067204">删除微现场</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067227" class="che-li" value="067227"> <label
                        for="067227">周期购</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067228" class="che-li" value="067228"> <label
                        for="067228">添加/编辑周期购</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067229" class="che-li" value="067229"> <label
                        for="067229">批量删除周期购</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067230" class="che-li" value="067230"> <label
                        for="067230">打包一口价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067231" class="che-li" value="067231"> <label
                        for="067231">添加/编辑打包一口价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067232" class="che-li" value="067232"> <label
                        for="067232">批量删除打包一口价</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067205" class="che-li" value="067205"> <label
                        for="067205">微现场摇一摇</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067206" class="che-li" value="067206"> <label
                        for="067206">添加摇一摇</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067207" class="che-li" value="067207"> <label
                        for="067207">删除摇一摇</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067208" class="che-li" value="067208"> <label
                        for="067208">展示摇一摇</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067209" class="che-li" value="067209"> <label
                        for="067209">微现场抽奖</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067210" class="che-li" value="067210"> <label
                        for="067210">允许/禁止抽奖</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067211" class="che-li" value="067211"> <label
                        for="067211">添加奖品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067212" class="che-li" value="067212"> <label
                        for="067212">删除奖品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067213" class="che-li" value="067213"> <label
                        for="067213">展示奖品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067214" class="che-li" value="067214"> <label
                        for="067214">获奖情况</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067214" class="che-li" value="067214"> <label
                        for="067214">获奖情况</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067215" class="che-li" value="067215"> <label
                        for="067215">标记已兑奖</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067216" class="che-li" value="067216"> <label
                        for="067216">摇一摇统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067217" class="che-li" value="067217"> <label
                        for="067217">微现场抢红包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067218" class="che-li" value="067218"> <label
                        for="067218">添加/编辑抢红包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067219" class="che-li" value="067219"> <label
                        for="067219">删除抢红包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067223" class="che-li" value="067223"> <label
                        for="067223">抢红包统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067220" class="che-li" value="067220"> <label
                        for="067220">微现场投票</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067221" class="che-li" value="067221"> <label
                        for="067221">添加/编辑投票</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067222" class="che-li" value="067222"> <label
                        for="067222">删除投票</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067224" class="che-li" value="067224"> <label
                        for="067224">投票统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067225" class="che-li" value="067225"> <label
                        for="067225">我要送礼</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067225" class="che-li" value="067225"> <label
                        for="067225">添加送礼配置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067225" class="che-li" value="067225"> <label
                        for="067225">编辑送礼配置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067225" class="che-li" value="067225"> <label
                        for="067225">删除送礼配置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="067226" class="che-li" value="067226"> <label
                        for="067226">生日营销</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06790" class="che-li" value="06790"> <label
                        for="06790">添加拼团活动</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06791" class="che-li" value="06791"> <label
                        for="06791">拼团活动管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06793" class="che-li" value="06793"> <label
                        for="06793">拼团修改</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06794" class="che-li" value="06794"> <label
                        for="06794">拼团删除</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0601" class="che-li" value="0601"> <label
                        for="0601">每日签到</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0630" class="che-li" value="0630"> <label
                        for="0630">关注送积分</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0621" class="che-li" value="0621"> <label
                        for="0621">分享送积分</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0619" class="che-li" value="0619"> <label
                        for="0619">积分兑换商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0620" class="che-li" value="0620"> <label
                        for="0620">添加/编辑商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0633" class="che-li" value="0633"> <label
                        for="0633">删除商品</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0634" class="che-li" value="0634"> <label
                        for="0634">订单详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0635" class="che-li" value="0635"> <label
                        for="0635">标记发货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0636" class="che-li" value="0636"> <label
                        for="0636">标记发货(免物流)</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0637" class="che-li" value="0637"> <label
                        for="0637">修改快递单号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0641" class="che-li" value="0641"> <label
                        for="0641">标记收货</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0666" class="che-li" value="0666"> <label
                        for="0666">恢复已删除积分订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0667" class="che-li" value="0667"> <label
                        for="0667">批量恢复已删除积分订单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0668" class="che-li" value="0668"> <label
                        for="0668">删除积分订单日志</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0656" class="che-li" value="0656"> <label
                        for="0656">积分兑换红包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0657" class="che-li" value="0657"> <label
                        for="0657">添加\编辑红包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0682" class="che-li" value="0682"> <label
                        for="0682">积分兑换红包审核列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0683" class="che-li" value="0683"> <label
                        for="0683">积分兑换红包审核</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0681" class="che-li" value="0681"> <label
                        for="0681">积分抵现</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0638" class="che-li" value="0638"> <label
                        for="0638">积分日志</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06111" class="che-li" value="06111"> <label
                        for="06111">评价送积分</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06112" class="che-li" value="06112"> <label
                        for="06112">首次消费送积分</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06001" class="che-li" value="06001"> <label
                        for="06001">虚拟币比例</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06002" class="che-li" value="06002"> <label
                        for="06002">虚拟币抵现</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06003" class="che-li" value="06003"> <label
                        for="06003">虚拟币日志</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06405" class="che-li" value="06405"> <label
                        for="06405">优惠码管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06406" class="che-li" value="06406"> <label
                        for="06406">添加/编辑优惠码</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06407" class="che-li" value="06407"> <label
                        for="06407">优惠码库</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0603" class="che-li" value="0603"> <label
                        for="0603">优惠券管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0605" class="che-li" value="0605"> <label
                        for="0605">优惠券发放列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0606" class="che-li" value="0606"> <label
                        for="0606">添加/编辑优惠券</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06120" class="che-li" value="06120"> <label
                        for="06120">优惠券大礼包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06121" class="che-li" value="06121"> <label
                        for="06121">优惠券大礼包发放列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06122" class="che-li" value="06122"> <label
                        for="06122">添加/编辑优惠券大礼包</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0693" class="che-li" value="0693"> <label
                        for="0693">领取优惠券页面</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0602" class="che-li" value="0602"> <label
                        for="0602">扫码送优惠券</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0658" class="che-li" value="0658"> <label
                        for="0658">关注送优惠券</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0631" class="che-li" value="0631"> <label
                        for="0631">购物送优惠券</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0649" class="che-li" value="0649"> <label
                        for="0649">购物分享得优惠券</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0617" class="che-li" value="0617"> <label
                        for="0617">包邮设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0690" class="che-li" value="0690"> <label
                        for="0690">搭配套餐</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0691" class="che-li" value="0691"> <label
                        for="0691">创建/编辑搭配套餐</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06401" class="che-li" value="06401"> <label
                        for="06401">满减优惠</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06402" class="che-li" value="06402"> <label
                        for="06402">添加/编辑满减</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06403" class="che-li" value="06403"> <label
                        for="06403">删除满减</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06404" class="che-li" value="06404"> <label
                        for="06404">处理购物(充值)送优惠券规则</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0687" class="che-li" value="0687"> <label
                        for="0687">充值优惠</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0622" class="che-li" value="0622"> <label
                        for="0622">充值送积分</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0686" class="che-li" value="0686"> <label
                        for="0686">充值送优惠券</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0684" class="che-li" value="0684"> <label
                        for="0684">充值成为分销商</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0685" class="che-li" value="0685"> <label
                        for="0685">充值升等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06131" class="che-li" value="06131"> <label
                        for="06131">购物卡管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06132" class="che-li" value="06132"> <label
                        for="06132">购物卡编辑</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06133" class="che-li" value="06133"> <label
                        for="06133">购物卡添加</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06134" class="che-li" value="06134"> <label
                        for="06134">购物卡导出</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06135" class="che-li" value="06135"> <label
                        for="06135">购物卡删除</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="06136" class="che-li" value="06136"> <label
                        for="06136">购物卡详细</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0608" class="che-li" value="0608"> <label
                        for="0608">幸运大转盘</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0609" class="che-li" value="0609"> <label
                        for="0609">疯狂砸金蛋</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0610" class="che-li" value="0610"> <label
                        for="0610">好运翻翻看</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0611" class="che-li" value="0611"> <label
                        for="0611">骰子大王</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0612" class="che-li" value="0612"> <label
                        for="0612">添加游戏</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0613" class="che-li" value="0613"> <label
                        for="0613">编辑游戏</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0642" class="che-li" value="0642"> <label
                        for="0642">删除游戏</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0670" class="che-li" value="0670"> <label
                        for="0670">活动设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0672" class="che-li" value="0672"> <label
                        for="0672">增加活动</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0671" class="che-li" value="0671"> <label
                        for="0671">活动管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0673" class="che-li" value="0673"> <label
                        for="0673">审核试用活动</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0677" class="che-li" value="0677"> <label
                        for="0677">查看活动报告</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0678" class="che-li" value="0678"> <label
                        for="0678">试用跟踪</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0614" class="che-li" value="0614"> <label
                        for="0614">微信群发</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0615" class="che-li" value="0615"> <label
                        for="0615">微信群发统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0616" class="che-li" value="0616"> <label
                        for="0616">微信群发记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0692" class="che-li" value="0692"> <label
                        for="0692">站内信群发</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0623" class="che-li" value="0623"> <label
                        for="0623">站内信群发统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0624" class="che-li" value="0624"> <label
                        for="0624">APP群发</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0625" class="che-li" value="0625"> <label
                        for="0625">APP群发统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0626" class="che-li" value="0626"> <label
                        for="0626">APP群发记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0627" class="che-li" value="0627"> <label
                        for="0627">短信群发</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0628" class="che-li" value="0628"> <label
                        for="0628">短信群发统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0629" class="che-li" value="0629"> <label
                        for="0629">短信群发记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0694" class="che-li" value="0694"> <label
                        for="0694">手机号导入</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox14" class="che-t">
                <label for="checkbox14">统计</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="1501" class="che-li" value="1501"> <label
                        for="1501">订单统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1506" class="che-li" value="1506"> <label
                        for="1506">退换货统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1507" class="che-li" value="1507"> <label
                        for="1507">商品统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1508" class="che-li" value="1508"> <label
                        for="1508">提现统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1509" class="che-li" value="1509"> <label
                        for="1509">充值统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1514" class="che-li" value="1514"> <label
                        for="1514">返利统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1502" class="che-li" value="1502"> <label
                        for="1502">会员分析</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1515" class="che-li" value="1515"> <label
                        for="1515">佣金排名</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1516" class="che-li" value="1516"> <label
                        for="1516">积分排名</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1517" class="che-li" value="1517"> <label
                        for="1517">下级会员排名</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1504" class="che-li" value="1504"> <label
                        for="1504">积分统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1505" class="che-li" value="1505"> <label
                        for="1505">优惠券统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1511" class="che-li" value="1511"> <label
                        for="1511">拼团统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1512" class="che-li" value="1512"> <label
                        for="1512">试用统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1513" class="che-li" value="1513"> <label
                        for="1513">秒杀统计</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1520" class="che-li" value="1520"> <label
                        for="1520">砍价统计</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox6" class="che-t">
                <label for="checkbox6">设置</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="0701" class="che-li" value="0701"> <label
                        for="0701">店铺信息</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0705" class="che-li" value="0705"> <label
                        for="0705">分销商佣金设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0702" class="che-li" value="0702"> <label
                        for="0702">支付宝收款账号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0704" class="che-li" value="0704"> <label
                        for="0704">京东支付收款账号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0742" class="che-li" value="0742"> <label
                        for="0742">paypal收款账号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0752" class="che-li" value="0752"> <label
                        for="0752">贝宝收款账号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0798" class="che-li" value="0798"> <label
                        for="0798">银联收款账号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="07100" class="che-li" value="07100"> <label
                        for="07100">快钱收款账号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="07103" class="che-li" value="07103"> <label
                        for="07103">易宝收款账号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0776" class="che-li" value="0776"> <label
                        for="0776">找人代付</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="07101" class="che-li" value="07101"> <label
                        for="07101">线下付款</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0706" class="che-li" value="0706"> <label
                        for="0706">提现设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0741" class="che-li" value="0741"> <label
                        for="0741">积分比例</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0707" class="che-li" value="0707"> <label
                        for="0707">分销申请设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0708" class="che-li" value="0708"> <label
                        for="0708">分销商自动审核设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0765" class="che-li" value="0765"> <label
                        for="0765">成为分销商等级设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0736" class="che-li" value="0736"> <label
                        for="0736">自动确认收货设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0764" class="che-li" value="0764"> <label
                        for="0764">自动取消订单设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0779" class="che-li" value="0779"> <label
                        for="0779">功能名称设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0762" class="che-li" value="0762"> <label
                        for="0762">更新日志</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0763" class="che-li" value="0763"> <label
                        for="0763">通知中心</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0766" class="che-li" value="0766"> <label
                        for="0766">浮动公告</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0743" class="che-li" value="0743"> <label
                        for="0743">修改密码</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0797" class="che-li" value="0797"> <label
                        for="0797">服务承诺</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0744" class="che-li" value="0744"> <label
                        for="0744">绑定域名</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0780" class="che-li" value="0780"> <label
                        for="0780">开通微聊客服</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0781" class="che-li" value="0781"> <label
                        for="0781">微聊客服管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0709" class="che-li" value="0709"> <label
                        for="0709">首次关注</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0710" class="che-li" value="0710"> <label
                        for="0710">自动回复</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0711" class="che-li" value="0711"> <label
                        for="0711">编辑自动回复</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0712" class="che-li" value="0712"> <label
                        for="0712">删除自动回复</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0758" class="che-li" value="0758"> <label
                        for="0758">增加回复规则</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0771" class="che-li" value="0771"> <label
                        for="0771">信息托管</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0772" class="che-li" value="0772"> <label
                        for="0772">添加信息托管</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0773" class="che-li" value="0773"> <label
                        for="0773">编辑信息托管</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0774" class="che-li" value="0774"> <label
                        for="0774">删除信息托管</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0713" class="che-li" value="0713"> <label
                        for="0713">自定义菜单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0715" class="che-li" value="0715"> <label
                        for="0715">开通指引</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0716" class="che-li" value="0716"> <label
                        for="0716">一键关注</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0778" class="che-li" value="0778"> <label
                        for="0778">客服功能</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0740" class="che-li" value="0740"> <label
                        for="0740">消息设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0761" class="che-li" value="0761"> <label
                        for="0761">模板消息</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0717" class="che-li" value="0717"> <label
                        for="0717">素材库管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0718" class="che-li" value="0718"> <label
                        for="0718">添加单图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0758" class="che-li" value="0758"> <label
                        for="0758">编辑单图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0759" class="che-li" value="0759"> <label
                        for="0759">删除单图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0760" class="che-li" value="0760"> <label
                        for="0760">添加多图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0719" class="che-li" value="0719"> <label
                        for="0719">编辑多图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0720" class="che-li" value="0720"> <label
                        for="0720">删除多图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0737" class="che-li" value="0737"> <label
                        for="0737">发送记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0738" class="che-li" value="0738"> <label
                        for="0738">短信充值</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0739" class="che-li" value="0739"> <label
                        for="0739">充值记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0721" class="che-li" value="0721"> <label
                        for="0721">运费模版</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0722" class="che-li" value="0722"> <label
                        for="0722">添加运费模板</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0723" class="che-li" value="0723"> <label
                        for="0723">编辑运费模板</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0724" class="che-li" value="0724"> <label
                        for="0724">删除运费模板</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0725" class="che-li" value="0725"> <label
                        for="0725">添加区域</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0726" class="che-li" value="0726"> <label
                        for="0726">编辑区域</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0727" class="che-li" value="0727"> <label
                        for="0727">快递单模板</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0728" class="che-li" value="0728"> <label
                        for="0728">设为默认模板</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0729" class="che-li" value="0729"> <label
                        for="0729">取消默认模板</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0730" class="che-li" value="0730"> <label
                        for="0730">添加快递单模板</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0731" class="che-li" value="0731"> <label
                        for="0731">编辑快递单模板</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0732" class="che-li" value="0732"> <label
                        for="0732">删除快递单模板</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0733" class="che-li" value="0733"> <label
                        for="0733">货到付款</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0753" class="che-li" value="0753"> <label
                        for="0753">提货点管理</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0754" class="che-li" value="0754"> <label
                        for="0754">添加自提地址</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0755" class="che-li" value="0755"> <label
                        for="0755">编辑自提地址</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0756" class="che-li" value="0756"> <label
                        for="0756">删除自提地址</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0757" class="che-li" value="0757"> <label
                        for="0757">批量删除自提地址</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0782" class="che-li" value="0782"> <label
                        for="0782">电子面单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0783" class="che-li" value="0783"> <label
                        for="0783">同步淘宝电子面单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0784" class="che-li" value="0784"> <label
                        for="0784">电子面单服务商</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0785" class="che-li" value="0785"> <label
                        for="0785">电子面单模版</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0786" class="che-li" value="0786"> <label
                        for="0786">删除/批量删除电子面单模版</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0787" class="che-li" value="0787"> <label
                        for="0787">设置默认电子面单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0788" class="che-li" value="0788"> <label
                        for="0788">取消默认电子面单模版</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0789" class="che-li" value="0789"> <label
                        for="0789">电子面单号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0790" class="che-li" value="0790"> <label
                        for="0790">电子面单号详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0791" class="che-li" value="0791"> <label
                        for="0791">同步电子面单号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0792" class="che-li" value="0792"> <label
                        for="0792">取消电子面单号</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0793" class="che-li" value="0793"> <label
                        for="0793">编辑电子面单模版</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0795" class="che-li" value="0795"> <label
                        for="0795">打印电子面单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0796" class="che-li" value="0796"> <label
                        for="0796">更新电子面单</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0734" class="che-li" value="0734"> <label
                        for="0734">管理员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0746" class="che-li" value="0746"> <label
                        for="0746">添加管理员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0747" class="che-li" value="0747"> <label
                        for="0747">编辑管理员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0748" class="che-li" value="0748"> <label
                        for="0748">删除管理员</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0735" class="che-li" value="0735"> <label
                        for="0735">权限角色</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0749" class="che-li" value="0749"> <label
                        for="0749">添加角色</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0750" class="che-li" value="0750"> <label
                        for="0750">编辑角色</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0751" class="che-li" value="0751"> <label
                        for="0751">删除角色</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0770" class="che-li" value="0770"> <label
                        for="0770">查看日志</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox17" class="che-t">
                <label for="checkbox17">内容电商</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="1801" class="che-li" value="1801"> <label
                        for="1801">我的场景</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1803" class="che-li" value="1803"> <label
                        for="1803">场景中心</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1805" class="che-li" value="1805"> <label
                        for="1805">编辑场景</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1806" class="che-li" value="1806"> <label
                        for="1806">删除场景</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1807" class="che-li" value="1807"> <label
                        for="1807">发布场景</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1814" class="che-li" value="1814"> <label
                        for="1814">表单数据中心</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1815" class="che-li" value="1815"> <label
                        for="1815">删除表单记录</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1816" class="che-li" value="1816"> <label
                        for="1816">查看留言</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1817" class="che-li" value="1817"> <label
                        for="1817">回复留言</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1819" class="che-li" value="1819"> <label
                        for="1819">修改回复</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1820" class="che-li" value="1820"> <label
                        for="1820">删除留言</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1809" class="che-li" value="1809"> <label
                        for="1809">我的图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1810" class="che-li" value="1810"> <label
                        for="1810">图文中心</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1811" class="che-li" value="1811"> <label
                        for="1811">编辑图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1812" class="che-li" value="1812"> <label
                        for="1812">删除图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1813" class="che-li" value="1813"> <label
                        for="1813">发布图文</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0114" class="che-li" value="0114"> <label
                        for="0114">分销专题</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0115" class="che-li" value="0115"> <label
                        for="0115">专题分类</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0132" class="che-li" value="0132"> <label
                        for="0132">微社区</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0170" class="che-li" value="0170"> <label
                        for="0170">微社区标签</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0171" class="che-li" value="0171"> <label
                        for="0171">微社区标签增加</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0172" class="che-li" value="0172"> <label
                        for="0172">微社区标签编辑</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="0173" class="che-li" value="0173"> <label
                        for="0173">微社区标签删除</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox16" class="che-t">
                <label for="checkbox16">小程序</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="1711" class="che-li" value="1711"> <label
                        for="1711">店铺主页</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1701" class="che-li" value="1701"> <label
                        for="1701">主页装修</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1720" class="che-li" value="1720"> <label
                        for="1720">会员中心装修</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1712" class="che-li" value="1712"> <label
                        for="1712">详情页公共模块</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1703" class="che-li" value="1703"> <label
                        for="1703">店铺设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1719" class="che-li" value="1719"> <label
                        for="1719">导航设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1716" class="che-li" value="1716"> <label
                        for="1716">入驻申请列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1717" class="che-li" value="1717"> <label
                        for="1717">入驻申请设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1718" class="che-li" value="1718"> <label
                        for="1718">入驻申请详情</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1704" class="che-li" value="1704"> <label
                        for="1704">小程序设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1705" class="che-li" value="1705"> <label
                        for="1705">小程序下载</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1706" class="che-li" value="1706"> <label
                        for="1706">小程序介绍</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1710" class="che-li" value="1710"> <label
                        for="1710">小程序模版消息</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1702" class="che-li" value="1702"> <label
                        for="1702">会员列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1715" class="che-li" value="1715"> <label
                        for="1715">会员等级</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1713" class="che-li" value="1713"> <label
                        for="1713">分销商列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1714" class="che-li" value="1714"> <label
                        for="1714">佣金设置</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1707" class="che-li" value="1707"> <label
                        for="1707">订单列表</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1708" class="che-li" value="1708"> <label
                        for="1708">开通小程序</label></li>
                <li class="menu_li"><input type="checkbox" name="priv" id="1709" class="che-li" value="1709"> <label
                        for="1709">发布小程序</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox15" class="che-t">
                <label for="checkbox15">直播</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="1601" class="che-li" value="1601"> <label
                        for="1601">直播</label></li>
            </ul>
        </div>
        <div class="add-role-list sysPanel">
            <div class="add-role-tit">
                <input type="checkbox" name="checkbox" id="checkbox19" class="che-t">
                <label for="checkbox19">商学院</label>
            </div>
            <ul>
                <li class="menu_li"><input type="checkbox" name="priv" id="2001" class="che-li" value="2001"> <label
                        for="2001">商学院</label></li>
            </ul>
        </div>
        <input type="hidden" name="priv_list" id="priv_list">
        <span class="fi-help-text"></span>
    </div>
    <input type="hidden" name="act" value="add">
    <div style="margin-left:110px;">
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>

@endsection

@section('js')

@endsection