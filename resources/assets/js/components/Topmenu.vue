<template>
    <div class="header">
        <div class="inner clearfix">
            <div class="fl">
                <a href="/" class="header-logo" style="width:auto; margin-right:4px;">
                    <img src="/Public/images/logo.jpg" width="auto" height="100%"> </a>
            </div>
            <!-- end logo -->
            <div class="header-nav fl">
                <ul class="header-nav-list clearfix">
                    <li v-for="item in menuList" class="fl">
                        <a :href="item.url"><p>{{item.name}}</p></a>
                    </li>

                </ul>
            </div>
            <!-- end header-nav -->
            <div class="fr">
                <ul class="header-ctrl clearfix">
                    <li class="header-ctrl-item fl">
                        <a href="javascript:;" class="header-ctrl-item-parent">
                            <i class="gicon-user white"></i>
                            <i class="gicon-user"></i>
                            账户
                        </a>
                        <ul class="header-ctrl-item-children">
                            <li><a href="http://www.wifenxiao.com/NewNotice" target="_blank">更新日志</a></li>
                            <li><a href="http://www.wifenxiao.com/Index/help_list/lm/help.html" target="_blank">帮助中心</a>
                            </li>
                            <li><a href="/System/shopInfo">设置</a></li>
                            <li><a href="/System/updatepwd">修改密码</a></li>
                            <li><a href="/Public/logout">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- end list -->
            <span class="account_inbox_switch fr">
                <a href="/System/notice_list" class="header_mail"></a>
            </span>
            <span class="header-welcome fr ">
            <a href="javascript:;" title="窗帘" class="tips" data-trigger="hover" data-placement="top"
               data-content=" <strong>集团演示版有效期至：</strong><font style=&quot;color:red&quot;>2060-09-27</font>">窗帘</a>
                    </span>
            <!-- end header-welcome -->
        </div>
    </div>
</template>
<script>
    var axios=require('axios');
    export default {
        data:function(){
            return {
                menuList:""
            }
        },
        created:function(){
            axios.get('api/getTopMenu').then((resq)=>{
                this.menuList=resq.data.data;

            })
        }
    }

</script>