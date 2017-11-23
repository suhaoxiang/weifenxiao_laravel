function(e, n, o) {
    var i = { callback: null },
        t = {},
        c = { width: e(o).width(), height: e(o).height() },
        a = { main: e("#tpl_albums_main").html(), overlay: e("#tpl_albums_overlay").html(), tree: e("#tpl_albums_tree").html(), treeFn: e("#tpl_albums_tree_fn").html(), imgs: e("#tpl_albums_imgs").html() },
        s = { folderID: "", moveFolderID: 0, imgs: {} },
        l = { getFolderTree: "/Design/getFolderTree", getSubFolderTree: "/Design/getSubFolderTree", getImgList: "/Design/getImgList", addImg: "/Design/uploadFile/sid/" + e.cookie("shop_id"), moveImg: "/Design/moveImg", delImg: "/Design/delImg", addFolder: "/Design/addFolder", renameFolder: "/Design/renameFolder", delFolder: "/Design/delFolder", moveCateImg: "/Design/moveCateImg", renameImg: "/Design/renameImg" },
        r = function(n, o, i, t) {
            var c = arguments.callee,
                r = n.find("#j-panelImgs"),
                d = n.find("#j-panelPaginate"),
                u = o >= 0 ? { id: o, p: i, file_name: t } : { p: i, file_name: t };
            "undefined" == typeof GLOBAL_NEED_COMPRESS || 0 == GLOBAL_NEED_COMPRESS ? u.need_compress = 0 : u.need_compress = 1, e.ajax({
                url: l.getImgList + "?v=" + Math.round(100 * Math.random()),
                type: "post",
                dataType: "json",
                data: u,
                beforeSend: function() { r.find(".j-loading").show() },
                success: function(i) {
                    if (1 == i.status) {
                        s.imgs = _.isArray(i.data) ? i.data : null;
                        var l = e(_.template(a.imgs, { dataset: s.imgs })),
                            u = e(i.page);
                        r.find(".j-loading").hide().end().find("ul,.j-noPic").remove().end().append(l), d.empty().append(u), u.filter("a:not(.disabled,.cur)").click(function() {
                            var i = e(this).attr("href"),
                                a = i.split("/");
                            return a = a[a.length - 1], a = a.replace(/.html/, ""), c(n, o, a, t), !1
                        })
                    } else HYD.hint("danger", "对不起，图片获取失败：" + i.msg)
                }
            })
        };
    UpdateSubTreeNums = function(o) {
        if ("undefined" == typeof o) var o = e(n).find(".j-albumsNodes .selected").data("id");
        e.ajax({
            url: "/Design/getAllSubFolderTree?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: { id: o },
            success: function(o) {
                if (1 == o.status) {
                    var i = o.data.tree,
                        t = e(n).find("#j-panelTree");
                    i.push({ id: "-1", picNum: o.data.total }, { id: "0", picNum: o.data.nocat_total });
                    var c = function(e) {
                        var n = arguments.callee;
                        _.each(e, function(e) { t.find("dt[data-id=" + e.id + "]").find(".j-num").text(e.picNum), e.subFolder && e.subFolder.length && n(e.subFolder) })
                    };
                    c(i)
                } else console.log("更新文件夹树图片数量失败")
            }
        })
    }, e.albums = function(o) {
        t = e.extend(!0, {}, i, o);
        var d = e("#albums"),
            u = e("#albums-overlay");
        if (!d.length) {
            d = e(a.main), u = e(a.overlay), e("body").append(d.hide(), u.hide());
            var g = d.find("#j-close"),
                p = d.find("#j-addFolder"),
                m = d.find("#j-renameFolder"),
                f = d.find("#j-delFolder"),
                h = d.find("#j-addImg"),
                b = d.find("#j-moveImg"),
                y = d.find("#j-cateImg"),
                v = d.find("#j-delImg"),
                $ = d.find("#j-panelTree"),
                P = function() { d.fadeOut("fast"), u.fadeOut("fast"), d.find("#j-panelImgs li").removeClass("selected") };
            e.ajax({
                url: l.getFolderTree + "?v=" + Math.round(100 * Math.random()),
                type: "post",
                dataType: "json",
                success: function(n) {
                    if (1 == n.status) {
                        var o = _.template(a.treeFn),
                            i = o({ dataset: n.data.tree, templateFn: o }),
                            t = e(_.template(a.tree, { dataset: n.data, nodes: i }));
                        $.empty().append(t), d.find(".j-albumsNodes > dt:first").click()
                    } else HYD.hint("danger", "对不起，文件夹获取失败：" + n.msg)
                }
            }), e(n).on("click", ".j-albumsNodes dt", function(n) {
                var o = e(this),
                    i = o.data("id");
                if (o.parents(".j-albumsNodes").find("dt").removeClass("selected"), o.addClass("selected"), e(n.currentTarget).parents(".j-propagation").length) s.moveFolderID = i;
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
                e.ajax({
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
            e(n).on("click", ".j-albumsNodes dt i", function() {
                var n = e(this),
                    o = n.parent("dt").siblings("dd").find(" > dl"),
                    i = o.length,
                    t = n.parent("dt").data("id");
                return n.hasClass("open") ? (n.removeClass("open"), o.slideUp(200)) : (n.addClass("open"), i ? o.slideDown(200) : j(n, t)), !1
            });
            var x = 0;
            d.on("click", "#j-panelImgs li", function() { return e(this).toggleClass("selected"), e(this).find(".img-name-edit").hide(), e(this).data("selectindex", x++), !1 }), d.on("click", "#j-panelImgs li .albums-edit", function() { return e(this).children(".img-name-edit").show(), !1 }), d.on("click", "#j-useImg", function() {
                if (!d.find("#j-panelImgs li.selected").length) return void HYD.hint("warning", "请选择图片！");
                var n = {},
                    o = [];
                d.find("#j-panelImgs li.selected").each(function() { n[e(this).data("selectindex")] = s.imgs[e(this).index()].file });
                for (var i in n) o.push(n[i]);
                return t.callback && (t.callback(o), P()), !1
            }), p.click(function() {
                var n = [{ id: 0, name: "未命名文件夹", picNum: 0 }];
                e.ajax({
                    url: l.addFolder + "?v=" + Math.round(100 * Math.random()),
                    type: "post",
                    dataType: "json",
                    data: { name: n.name, parent_id: s.folderID },
                    success: function(o) {
                        if (1 == o.status) {
                            n[0].id = o.data;
                            var i = _.template(a.treeFn, { dataset: n });
                            $render = e(i), $.find("dt[data-id='" + s.folderID + "']").siblings("dd").append($render), $render.css("display", "block"), $render.parent().siblings("dt").find(".icon-folder").addClass("open"), $render.find("dt:first").click(), m.click()
                        } else HYD.hint("danger", "对不起，添加失败：" + o.msg)
                    }
                })
            }), m.click(function() {
                var n = $.find("dt[data-id='" + s.folderID + "']"),
                    o = n.find(".j-treeShowTxt"),
                    i = n.find(".j-ip"),
                    t = n.find(".j-loading");
                o.hide(), i.show().focus().select(), i.blur(function() {
                    var n = e(this).val();
                    e.ajax({ url: l.renameFolder + "?v=" + Math.round(100 * Math.random()), type: "post", dataType: "json", data: { name: n, category_img_id: s.folderID }, beforeSend: function() { t.css("display", "inline-block") }, success: function(e) { 1 == e.status ? o.find(".j-name").text(n) : HYD.hint("danger", "对不起，重命名失败：" + e.msg), o.show(), i.hide(), t.hide() } })
                })
            }), f.click(function() {
                var n = e("#tpl_albums_delFolder").html(),
                    o = e(n),
                    i = o.find("input[name=isDelImgs]");
                e.jBox.show({
                    title: "提示",
                    content: o,
                    btnOK: {
                        onBtnClick: function(n) {
                            var o = i.filter(":checked").val();
                            e.ajax({
                                url: l.delFolder + "?v=" + Math.round(100 * Math.random()),
                                type: "post",
                                dataType: "json",
                                data: { type: o, id: s.folderID },
                                success: function(e) {
                                    if (1 == e.status) {
                                        UpdateSubTreeNums();
                                        var n = $.find("dt[data-id=" + s.folderID + "]").parent("dl");
                                        n.parent("dd").siblings("dt").click(), n.remove()
                                    } else HYD.hint("danger", "对不起，删除失败失败：" + e.msg)
                                }
                            }), e.jBox.close(n)
                        }
                    }
                })
            }), v.click(function() {
                if (!d.find("#j-panelImgs li.selected").length) return void HYD.hint("warning", "请选择要删除的图片！");
                var n = [];
                d.find("#j-panelImgs li.selected").each(function() { n.push(e(this).data("id")) }), e.ajax({ url: l.delImg + "?v=" + Math.round(100 * Math.random()), type: "post", dataType: "json", data: { file_id: n }, success: function(n) { 1 == n.status ? (d.find("#j-panelImgs li.selected").fadeOut(300, function() { e(this).remove() }), UpdateSubTreeNums()) : HYD.hint("danger", "对不起，删除失败：" + n.msg) } })
            }),
                function() {
                    var n = navigator.userAgent.toLowerCase(),
                        o = "ipad" == n.match(/ipad/i),
                        i = "iphone os" == n.match(/iphone os/i),
                        t = "midp" == n.match(/midp/i),
                        c = "rv:1.2.3.4" == n.match(/rv:1.2.3.4/i),
                        a = "ucweb" == n.match(/ucweb/i),
                        u = "android" == n.match(/android/i),
                        g = "windows ce" == n.match(/windows ce/i),
                        p = "windows mobile" == n.match(/windows mobile/i);
                    o || i || t || c || a || u || g || p ? (e("#j-addImg").parent("#addImg_load").addClass("btn btn-success").children(".addImg_load_text").text("上传图片"), e("#j-addImg").change(function() {
                        var n = e(this),
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
                    })) : h.uploadify({
                        debug: !1,
                        auto: !0,
                        width: 86,
                        height: 28,
                        multi: !0,
                        swf: "/Public/plugins/uploadify/uploadify.swf",
                        uploader: l.addImg,
                        buttonText: "上传图片",
                        fileSizeLimit: "5MB",
                        fileTypeExts: "*.jpg; *.jpeg; *.png; *.gif; *.bmp",
                        onUploadStart: function() { h.uploadify("settings", "formData", { cate_id: s.folderID == -1 ? 0 : s.folderID, PHPSESSID: e.cookie("PHPSESSID") }) },
                        onSelectError: function(e, n, o) {
                            switch (n) {
                                case -100:
                                    HYD.hint("danger", "对不起，系统只允许您一次最多上传10个文件");
                                    break;
                                case -110:
                                    HYD.hint("danger", "对不起，文件 [" + e.name + "] 大小超出5MB！");
                                    break;
                                case -120:
                                    HYD.hint("danger", "文件 [" + e.name + "] 大小异常！");
                                    break;
                                case -130:
                                    HYD.hint("danger", "文件 [" + e.name + "] 类型不正确！")
                            }
                        },
                        onFallback: function() { HYD.hint("danger", "您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。") },
                        onUploadSuccess: function(e, n, o) { console.log(e, n, o) },
                        onQueueComplete: function(e) { r(d, s.folderID, 1), UpdateSubTreeNums() },
                        onUploadError: function(e, n, o, i) { HYD.hint("danger", "对不起：" + e.name + "上传失败：" + i) }
                    })
                }(), b.click(function() {
                if (!d.find("#j-panelImgs li.selected").length) return void HYD.hint("warning", "请选择要移动的图片！");
                var n = e("<div class='albums-cl-tree j-albumsNodes j-propagation'></div>");
                n.append($.find("dd:first").contents().clone()), e.jBox.show({
                    title: "请选择移动文件夹",
                    content: n,
                    onOpen: function() { n.find("dt:first").click() },
                    btnOK: {
                        onBtnClick: function(n) {
                            var o = [];
                            d.find("#j-panelImgs li.selected").each(function() { o.push(e(this).data("id")) }), e.ajax({
                                url: l.moveImg + "?v=" + Math.round(100 * Math.random()),
                                type: "post",
                                dataType: "json",
                                data: { file_id: o, cate_id: s.moveFolderID },
                                success: function(o) {
                                    if (1 == o.status) {
                                        var i = e(n).find(".j-albumsNodes .selected").data("id");
                                        d.find("#j-panelImgs li.selected").fadeOut(300, function() { e(this).remove() }), UpdateSubTreeNums(), UpdateSubTreeNums(i), HYD.hint("success", "恭喜您，操作成功！")
                                    } else HYD.hint("danger", "对不起，移动失败：" + o.msg)
                                }
                            }), e.jBox.close(n)
                        }
                    }
                })
            }), y.click(function() {
                if (!s.folderID) return void HYD.hint("warning", "请选择要移动的分类！");
                var n = e("<div class='albums-cl-tree j-albumsNodes j-propagation'></div>");
                n.append($.find("dd:first").contents().clone()), e.jBox.show({
                    title: "请选择移动文件夹",
                    content: n,
                    onOpen: function() { n.find("dt:first").click() },
                    btnOK: {
                        onBtnClick: function(n) {
                            e.ajax({
                                url: l.moveCateImg + "?v=" + Math.round(100 * Math.random()),
                                type: "post",
                                dataType: "json",
                                data: { cid: s.folderID, cate_id: s.moveFolderID },
                                success: function(o) {
                                    if (1 == o.status) {
                                        var i = e(n).find(".j-albumsNodes .selected").data("id");
                                        d.find("#j-panelImgs li.selected").fadeOut(300, function() { e(this).remove() }), UpdateSubTreeNums(), UpdateSubTreeNums(i), HYD.hint("success", "恭喜您，操作成功！")
                                    } else HYD.hint("danger", "对不起，移动失败：" + o.msg)
                                }
                            }), e.jBox.close(n)
                        }
                    }
                })
            }), g.click(P)
        }
        d.appendTo("body").fadeIn("fast"), u.appendTo("body").fadeIn("fast"), d.outerHeight() >= c.height && d.css({ position: "absolute", marginTop: "0", top: e(n).scrollTop() + 10 }), d.on("click", ".renameImg", function() {
            var n = e(this),
                o = n.closest("li").data("id"),
                i = n.siblings("input.file_name").val();
            return e.ajax({ url: l.renameImg + "?v=" + Math.round(100 * Math.random()), type: "post", dataType: "json", data: { file_id: o, file_name: i }, success: function(e) { 1 == e.status ? (n.closest(".albums-edit").children(".img-name-edit").hide(), n.closest(".albums-edit").children("p").html(i), n.closest(".albums-edit").children("input.file_name").val(i), HYD.hint("success", "恭喜您，操作成功！")) : HYD.hint("danger", "对不起，操作失败") } }), !1
        }), d.on("click", ".searchImg", function() {
            var n = e(this).prev().val();
            r(d, s.folderID, 1, n)
        })
    }
}(jQuery, document, window);