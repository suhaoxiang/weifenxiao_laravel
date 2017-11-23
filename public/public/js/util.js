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
        },
        imagePicker:function(){
            require(['text!tpl/albums_main.tpl','text!tpl/albums_overlay.tpl','text!tpl/albums_tree.tpl','text!tpl/albums_tree_fn.tpl','text!tpl/albums_imgs.tpl'],function(albums_main,albums_overlay,albums_tree,albums_tree_fn,albums_imgs){

                var d = $("#albums"),
                    a = {
                        main: $(albums_main).html(),
                        overlay: $(albums_overlay).html(),
                        tree: $(albums_tree).html(),
                        treeFn: $(albums_tree_fn).html(),
                        imgs: $(albums_imgs).html()
                    },
                    u = $("#albums-overlay");
                if(!d.length){
                    d = $(a.main), u = $(a.overlay),$("body").append(d.hide(), u.hide());

                    var g = d.find("#j-close"),
                        p = d.find("#j-addFolder"),
                        m = d.find("#j-renameFolder"),
                        f = d.find("#j-delFolder"),
                        h = d.find("#j-addImg"),
                        b = d.find("#j-moveImg"),
                        y = d.find("#j-cateImg"),
                        v = d.find("#j-delImg"),
                        tr = d.find("#j-panelTree"),
                        P = function() {
                            d.fadeOut("fast"),
                            u.fadeOut("fast"),
                            d.find("#j-panelImgs li").removeClass("selected")
                        };

                    var l= {
                        getFolderTree:'/images/getFolderTree',
                        renameImg:"images/renameImg"
                    };

                    //获取文件夹列表
                    $.ajax({
                        url: l.getFolderTree + "?v=" + Math.round(100 * Math.random()),
                        type: "post",
                        dataType: "json",
                        success: function(n) {
                            if (1 == n.status) {
                                var o = _.template(a.treeFn),
                                    i = o({ dataset: n.data.tree, templateFn: o }),
                                    t = $(_.template(a.tree, { dataset: n.data, nodes: i }));
                                tr.empty().append(t), d.find(".j-albumsNodes > dt:first").click()
                            } else {
                                layer.msg("对不起，文件夹获取失败：" + n.msg);
                            }
                        }
                    });


                }

                //将图片管理器显示出来
                d.appendTo("body").fadeIn("fast");
                u.appendTo("body").fadeIn("fast");
                d.css({ position: "absolute", marginTop: "0", top: $(window).scrollTop() + 10 });

                //重命名图片
                d.on("click", ".renameImg", function() {
                    var n = $(this),
                        o = n.closest("li").data("id"),
                        i = n.siblings("input.file_name").val();
                    $.ajax({
                        url: l.renameImg + "?v=" + Math.round(100 * Math.random()),
                        type: "post",
                        dataType: "json",
                        data: {
                            file_id: o,
                            file_name: i
                        },
                        success: function(e) {
                            1 == e.status ? (n.closest(".albums-edit").children(".img-name-edit").hide(), n.closest(".albums-edit").children("p").html(i), n.closest(".albums-edit").children("input.file_name").val(i), HYD.hint("success", "恭喜您，操作成功！")) : HYD.hint("danger", "对不起，操作失败")
                        }
                    })
                });

                d.on("click", ".searchImg", function() {
                    var n = $(this).prev().val();
                    r(d, s.folderID, 1, n)
                })

            });

        }
    };
});