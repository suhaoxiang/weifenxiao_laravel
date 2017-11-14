define(['jquery','underscore','layer'],function($,_,layer){
    return {
        alert:function(e,n,o){
            require(['text!tpl/alert.tpl'],function(alert){
                var t = _.template($(alert).html(), { type:e, content: n }),
                    c=$(t),
                    a = 200,
                    o = o || 1500;
                $("body").append(c.css({ opacity: "0", zIndex: "999999" })), c.animate({ opacity: 1, top: 200 }, a, function() { setTimeout(function() { c.animate({ opacity: 0, top: 600 }, a, function() { $(this).remove() }) }, o) })
            })
        },
        delete:function(e){
            layer.confirm('提示', {
                title:'提示',
                content:"删除后将不可恢复，是否继续？",
                btn: ['确认','取消'],
                yes: function(index){
                    layer.close(index);
                    layer.load(0);
                    $.ajax({
                        url: e.data('href') +'?v='+ Math.round(100 * Math.random()),
                        type: "post",
                        dataType: "json",
                        data: {
                            '_method':'DELETE',
                            '_token':$("meta[name='csrf-token']").attr('content')
                        },
                        success: function(e) {
                            layer.closeAll('loading');
                            layer.msg(e.data);
                            if(e.url != ''){
                                setTimeout(function(){
                                    window.location.href=e.url;
                                },1500);
                            }else{
                                setTimeout(function(){
                                    window.location.reload()
                                },1500);
                            }
                        },
                        error:function(){
                            layer.closeAll('loading');
                            layer.msg('请求错误，请稍后再试！');
                        }
                    })
                }
            });

        }
    };
});