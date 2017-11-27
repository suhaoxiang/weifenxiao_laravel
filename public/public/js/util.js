define(['jquery','underscore','layer','uploadify'],function($,_,layer){
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
            require(['text!tpl/albums_main.tpl','text!tpl/albums_overlay.tpl','text!tpl/albums_tree.tpl','text!tpl/albums_tree_fn.tpl','text!tpl/albums_imgs.tpl','text!tpl/ablums_delFolder.tpl','jbox'],function(albums_main,albums_overlay,albums_tree,albums_tree_fn,albums_imgs,ablums_delFolder){
                //定义一些变量
                var i = { callback: null },
                    t = {},
                    c = { width: $(document).width(), height: $(document).height() },
                    a = {
                        main: $(albums_main).html(),
                        overlay: $(albums_overlay).html(),
                        tree: $(albums_tree).html(),
                        treeFn: $(albums_tree_fn).html(),
                        imgs: $(albums_imgs).html()
                    },
                    s = { folderID: "", moveFolderID: 0, imgs: {} },
                    l= {
                        getFolderTree:'/images/getFolderTree',
                        renameImg:"/images/renameImg",
                        getImgList:"/images/getImgList",
                        getSubFolderTree:"/images/getSubFolderTree",
                        addFolder:"/images/addFolder",
                        addImg:"/images/addImg",
                        delImg:"/images/delImg",
                        renameImg:"/images/renameImg",
                        addFolder:"/images/addFolder",
                        renameFolder:"/images/renameFolder",
                        delFolder:"/images/delFolder",
                        moveImg:"/images/moveImg",
                        getAllFolderTree:"/images/getAllFolderTree",
                        swf:"/public/js/dist/uploadify/uploadify.swf",
                    };

                //定义一些函数
                r = function(n, o, i, t) {
                    var c = arguments.callee,
                        r = n.find("#j-panelImgs"),
                        d = n.find("#j-panelPaginate"),
                        u = o >= 0 ? { id: o, page: i, file_name: t } : { page: i, file_name: t };
                    "undefined" == typeof GLOBAL_NEED_COMPRESS || 0 == GLOBAL_NEED_COMPRESS ? u.need_compress = 0 : u.need_compress = 1, $.ajax({
                        url: l.getImgList + "?v=" + Math.round(100 * Math.random()),
                        type: "post",
                        dataType: "json",
                        data: u,
                        beforeSend: function() { r.find(".j-loading").show() },
                        success: function(i) {
                            if (1 == i.status) {
                                s.imgs = _.isArray(i.data) ? i.data : null;
                                var l = $(_.template(a.imgs, { dataset: s.imgs })),
                                    u = $(i.page);
                                r.find(".j-loading").hide().end().find("ul,.j-noPic").remove().end().append(l), d.empty().append(u), u.filter("a:not(.disabled,.cur)").click(function() {
                                    var i = e(this).attr("href"),
                                        a = i.split("/");
                                    return a = a[a.length - 1], a = a.replace(/.html/, ""), c(n, o, a, t), !1
                                })
                            } else layer.msg("对不起，图片获取失败：" + i.msg);
                        }
                    })
                };

                UpdateSubTreeNums = function(o) {
                    if ("undefined" == typeof o) var o = $(document).find(".j-albumsNodes .selected").data("id");
                    $.ajax({
                        url: l.getAllFolderTree + "?v=" + Math.round(100 * Math.random()),
                        type: "post",
                        dataType: "json",
                        data: { id: o },
                        success: function(o) {
                            if (1 == o.status) {
                                var i = o.data.tree,
                                    t = $(document).find("#j-panelTree");
                                i.push({ id: "-1", picNum: o.data.total }, { id: "0", picNum: o.data.nocat_total });
                                var c = function(e) {
                                    var n = arguments.callee;
                                    _.each(e, function(e) { t.find("dt[data-id=" + e.id + "]").find(".j-num").text(e.picNum), e.subFolder && e.subFolder.length && n(e.subFolder) })
                                };
                                c(i)
                            } else layer.msg("更新文件夹树图片数量失败")
                        }
                    })
                };

                var d = $("#albums"),
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

                    //获取文件夹列表
                    $.ajax({
                        url: l.getFolderTree + "?v=" + Math.round(100 * Math.random()),
                        type: "post",
                        dataType: "json",
                        success: function(n) {
                            if (1 == n.status) {
                                var o = _.template(a.treeFn),
                                    i = o({ dataset: n.data.tree, templateFn: o }),
                                    t = _.template(a.tree, { dataset: n.data, nodes: i });
                                tr.empty().append(t);
                                d.find(".j-albumsNodes > dt:first").click()
                            } else {
                                layer.msg("对不起，文件夹获取失败：" + n.msg);
                            }
                        }
                    });
                    //选择文件夹
                    $(document).on("click", ".j-albumsNodes dt", function(n) {
                        var o = $(this),
                            i = o.data("id");
                        if (o.parents(".j-albumsNodes").find("dt").removeClass("selected"), o.addClass("selected"), $(n.currentTarget).parents(".j-propagation").length) s.moveFolderID = i;
                        else {
                            if (s.folderID == i) return;
                            s.folderID = i;
                            var t = o.data("add"),
                                c = o.data("rename"),
                                a = o.data("del");
                            1 == t ? p.show() : p.hide(), 1 == c ? m.show() : m.hide(), 1 == a ? f.show() : f.hide(), r(d, s.folderID, 1)
                        }
                        return !1
                    });

                    var j = function(n, o) {
                        $.ajax({
                            url: l.getSubFolderTree + "?v=" + Math.round(100 * Math.random()),
                            type: "post",
                            dataType: "json",
                            data: { id: o },
                            success: function(o) {
                                if (1 == o.status) {
                                    var i = _.template(a.treeFn),
                                        t = i({ dataset: o.data, templateFn: i });
                                    $render = e(t), n.parent("dt").siblings("dd").empty().append($render), $render.filter("dl").slideDown(200)
                                }
                            }
                        })
                    };

                    $(document).on("click", ".j-albumsNodes dt i", function() {
                        var n = $(this),
                            o = n.parent("dt").siblings("dd").find(" > dl"),
                            i = o.length,
                            t = n.parent("dt").data("id");
                        return n.hasClass("open") ? (n.removeClass("open"), o.slideUp(200)) : (n.addClass("open"), i ? o.slideDown(200) : j(n, t)), !1
                    });

                    var x = 0;
                    //选择文件
                    d.on("click", "#j-panelImgs li", function() {
                        return $(this).toggleClass("selected"), $(this).find(".img-name-edit").hide(), $(this).data("selectindex", x++), !1
                    });
                    //编辑文件
                    d.on("click", "#j-panelImgs li .albums-edit", function() {
                        return $(this).children(".img-name-edit").show(), !1
                    });
                    //使用文件
                    d.on("click", "#j-useImg", function() {
                        if (!d.find("#j-panelImgs li.selected").length) return void layer.msg("warning", "请选择图片！");
                        var n = {},
                            o = [];
                        d.find("#j-panelImgs li.selected").each(function() {
                            n[e(this).data("selectindex")] = s.imgs[e(this).index()].file
                        });
                        for (var i in n) o.push(n[i]);
                        return t.callback && (t.callback(o), P()), !1
                    });
                    p.click(function() {
                        //添加文件夹
                        var n = [{ id: 0, name: "未命名文件夹", picNum: 0 }];
                        $.ajax({
                            url: l.addFolder + "?v=" + Math.round(100 * Math.random()),
                            type: "post",
                            dataType: "json",
                            data: { name: n.name, parent_id: s.folderID },
                            success: function(o) {
                                if (1 == o.status) {
                                    n[0].id = o.data.id;
                                    var i = _.template(a.treeFn, { dataset: n });
                                    $render = $(i), tr.find("dt[data-id='" + s.folderID + "']").siblings("dd").append($render), $render.css("display", "block"), $render.parent().siblings("dt").find(".icon-folder").addClass("open"), $render.find("dt:first").click(), m.click()
                                } else layer.msg("对不起，添加失败：" + o.msg)
                            }
                        })
                    }), m.click(function() {
                        //双击重命名
                        var n = tr.find("dt[data-id='" + s.folderID + "']"),
                            o = n.find(".j-treeShowTxt"),
                            i = n.find(".j-ip"),
                            t = n.find(".j-loading");
                        o.hide(), i.show().focus().select(), i.blur(function() {
                            var n = $(this).val();
                            $.ajax({
                                url: l.renameFolder + "?v=" + Math.round(100 * Math.random()),
                                type: "post",
                                dataType: "json",
                                data: {
                                    name: n,
                                    folder_id:s.folderID
                                },
                                beforeSend: function() {
                                    t.css("display", "inline-block")
                                },
                                success: function(e) {
                                    1 == e.status ? o.find(".j-name").text(n) : layer.msg("对不起，重命名失败：" + e.msg), o.show(), i.hide(), t.hide()
                                }
                            })
                        })
                    }), f.click(function() {
                        //删除文件夹
                        var n = $(ablums_delFolder).html(),
                            o = $(n),
                            i = o.find("input[name=isDelImgs]");
                        layer.confirm('提示', {
                            title:'提示',
                            content:"删除后将不可恢复，是否继续？",
                            btn: ['确认','取消'],
                            yes: function(index){
                                $.ajax({
                                    url: l.delFolder + "?v=" + Math.round(100 * Math.random()),
                                    type: "post",
                                    dataType: "json",
                                    data: { id: s.folderID },
                                    success: function(e) {
                                        if (1 == e.status) {
                                            UpdateSubTreeNums();
                                            var n = tr.find("dt[data-id=" + s.folderID + "]").parent("dl");
                                            n.parent("dd").siblings("dt").click(), n.remove()
                                        } else layer.msg("对不起，删除失败失败：" + e.msg)
                                    }
                                });
                                layer.close(index);
                                layer.load(0);
                                layer.closeAll('loading');
                            }
                        });

                    }), v.click(function() {
                        //删除文件按钮
                        if (!d.find("#j-panelImgs li.selected").length) return layer.msg("请选择要删除的图片！");
                        var n = [];
                        d.find("#j-panelImgs li.selected").each(function() {
                            n.push($(this).data("id"))
                        });
                        $.ajax({
                            url: l.delImg + "?v=" + Math.round(100 * Math.random()),
                            type: "post",
                            dataType: "json",
                            data: { file_id: n },
                            success: function(n) {
                                1 == n.status ? (d.find("#j-panelImgs li.selected").fadeOut(300, function() { $(this).remove() }), UpdateSubTreeNums()) : layer.msg("对不起，删除失败：" + n.msg)
                            }
                        })
                    }),
                    function() {
                        //上传按钮
                        var n = navigator.userAgent.toLowerCase(),
                            o = "ipad" == n.match(/ipad/i),
                            i = "iphone os" == n.match(/iphone os/i),
                            t = "midp" == n.match(/midp/i),
                            c = "rv:1.2.3.4" == n.match(/rv:1.2.3.4/i),
                            a = "ucweb" == n.match(/ucweb/i),
                            u = "android" == n.match(/android/i),
                            g = "windows ce" == n.match(/windows ce/i),
                            p = "windows mobile" == n.match(/windows mobile/i);
                        if(o || i || t || c || a || u || g || p){
                            $("#j-addImg").parent("#addImg_load").addClass("btn btn-success").children(".addImg_load_text").text("上传图片");
                            $("#j-addImg").change(function() {
                                var n = $(this),
                                    o = n.get(0).files[0],
                                    i = ((new Date).getTime(), 5242880);
                                if (o.size > i) return void alert("上传的图片不得大于5MB");
                                var t = new XMLHttpRequest,
                                    c = new FormData;
                                t.open("POST", l.addImg, !0), e.jBox.showloading("正在上传..."), t.onreadystatechange = function() {
                                    if (4 == t.readyState && 200 == t.status) {
                                        var n = e.parseJSON(t.responseText);
                                        1 == n.status ? (r(d, s.folderID, 1), UpdateSubTreeNums()) : HYD.hint(n.msg), e.jBox.hideloading()
                                    }
                                }, c.append("Filedata", o), t.send(c)
                            })
                        }else{
                            h.uploadify({
                                debug: !1,
                                auto: !0,
                                width: 86,
                                height: 28,
                                multi: !0,
                                swf: l.swf,
                                uploader: l.addImg,
                                buttonText: "上传图片",
                                fileSizeLimit: "5MB",
                                fileTypeExts: "*.jpg; *.jpeg; *.png; *.gif; *.bmp",
                                onUploadStart: function() {
                                    h.uploadify("settings", "formData", {
                                        cate_id: s.folderID == -1 ? 0 : s.folderID,
                                        PHPSESSID: $.cookie("PHPSESSID"),
                                        '_token':$('meta[name="csrf-token"]').attr('content'),
                                    })
                                },
                                onSelectError: function(e, n, o) {
                                    switch (n) {
                                        case -100:
                                            layer.msg("对不起，系统只允许您一次最多上传10个文件");
                                            break;
                                        case -110:
                                            layer.msg("对不起，文件 [" + e.name + "] 大小超出5MB！");
                                            break;
                                        case -120:
                                            layer.msg("文件 [" + e.name + "] 大小异常！");
                                            break;
                                        case -130:
                                            layer.msg("文件 [" + e.name + "] 类型不正确！")
                                    }
                                },
                                onFallback: function() {
                                    layer.msg("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。")
                                },
                                onUploadSuccess: function(e, n, o) {
                                    // console.log(e, n, o)
                                },
                                onQueueComplete: function(e) {
                                    r(d, s.folderID, 1), UpdateSubTreeNums()
                                },
                                onUploadError: function(e, n, o, i) {
                                    layer.msg("对不起：" + e.name + "上传失败：" + i)
                                }
                            })
                        }
                    }();
                    b.click(function() {
                        //移动文件
                        if (!d.find("#j-panelImgs li.selected").length) return void layer.msg("请选择要移动的图片！");
                        var n = $("<div class='albums-cl-tree j-albumsNodes j-propagation'></div>");
                        n.append(tr.find("dd:first").contents().clone());
                        layer.confirm('请选择移动文件夹', {
                            title:"请选择移动文件夹",
                            content:"<div class='albums-cl-tree j-albumsNodes j-propagation'>"+n.html()+"</div>",
                            yes:function(){
                                var o = [];
                                d.find("#j-panelImgs li.selected").each(function() {
                                    o.push($(this).data("id"))
                                });
                                $.ajax({
                                    url: l.moveImg + "?v=" + Math.round(100 * Math.random()),
                                    type: "post",
                                    dataType: "json",
                                    data: { file_id: o, folder_id: s.moveFolderID },
                                    success: function(o) {
                                        if (1 == o.status) {
                                            var i = $(".layui-layer").find(".selected").data("id");
                                            console.log(i);
                                            d.find("#j-panelImgs li.selected").fadeOut(300, function() { $(this).remove() }), UpdateSubTreeNums(), UpdateSubTreeNums(i), layer.msg("恭喜您，操作成功！")
                                        } else layer.msg("对不起，移动失败：" + o.msg)
                                    }
                                })
                            }
                        });
                    }), g.click(P)
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
                            1 == e.status ? (n.closest(".albums-edit").children(".img-name-edit").hide(), n.closest(".albums-edit").children("p").html(i), n.closest(".albums-edit").children("input.file_name").val(i), layer.msg("success", "恭喜您，操作成功！")) : layer.msg("danger", "对不起，操作失败")
                        }
                    })
                });
                //搜索文件
                d.on("click", ".searchImg", function() {
                    var n = $(this).prev().val();
                    r(d, s.folderID, 1, n)
                });
                //分页跳转
                d.on("click","#j-panelPaginate a",function(e){
                    e.preventDefault();
                    r(d, s.folderID,$(this).attr('href').split('page=')[1],$(".searchImg").prev().val());
                });
            });

        }
    };
});