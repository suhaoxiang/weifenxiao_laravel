!function (e, n, o) {
    var i = {selectMod: 1, selectIds: [], callback: null}, t = {selectGoods: e("#tpl_popup_selectGoods").html()},
        c = null, a = {}, s = {getItem: "/Design/getItem"}, l = function (n, o, i) {
            e.ajax({
                url: s.getItem + "?v=" + Math.round(100 * Math.random()),
                type: "POST",
                dataType: "json",
                data: i,
                beforeSend: function () {
                    e.jBox.showloading()
                },
                success: function (s) {
                    if (1 == s.status) {
                        c = s.list;
                        var l = _.template(t.selectGoods, {
                            dataset: s.list,
                            classlists: s.class_lists,
                            page: s.page,
                            formdata: i,
                            selectMod: o.selectMod,
                            selectIds: o.selectIds,
                            curPageCache: a[i.p]
                        }), r = e(l);
                        n.find(".jbox-container").empty().html(r)
                    } else HYD.hint("danger", "获取数据失败，" + s.msg), e.jBox.close(n);
                    e.jBox.hideloading()
                }
            })
        }, r = function (e) {
            var n = e.attr("href");
            if (n.length) {
                var o = n.split("/"), i = o[o.length - 1].replace(/.html/, "");
                return i
            }
        };
    _QV_ = "%E6%9D%AD%E5%B7%9E%E5%90%AF%E5%8D%9A%E7%A7%91%E6%8A%80%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8%E7%89%88%E6%9D%83%E6%89%80%E6%9C%89", e.selectGoods = function (n) {
        var o = e.extend(!0, {}, i, n);
        c = null, a = {}, e.jBox.show({
            title: "选择商品", width: 1e3, minHeight: 605, content: "", onOpen: function (n) {
                l(n, o, {p: 1});
                var i = function () {
                    var o = n.find(".paginate a.cur").text(), i = [], t = [];
                    n.find(".j-chkbox:checked").each(function () {
                        var n = e(this), o = n.data("itemid"), a = n.data("index"), s = c[a];
                        i.push(o), t.push(s)
                    }), a[o] = {ids: i, data: t}
                };
                n.on("click", ".paginate a", function () {
                    if (!e(this).hasClass("cur")) {
                        i();
                        var t = r(e(this)), c = n.find("input[name=title]").val(),
                            a = n.find("select[name=status]").val(), s = n.find("select[name=class_id]").val();
                        return l(n, o, {p: t, title: c, status: a, class_id: s}), !1
                    }
                }), n.on("click", ".j-search", function () {
                    var e = n.find("input[name=title]").val(), i = n.find("select[name=status]").val(),
                        t = n.find("select[name=class_id]").val();
                    l(n, o, {p: 1, title: e, status: i, class_id: t})
                }), 1 == o.selectMod ? n.on("click", ".j-select", function () {
                    var i = e(this).data("index");
                    o.callback && o.callback(c[i]), e.jBox.close(n)
                }) : (n.on("click", ".j-select", function () {
                    var n = e(this), o = n.siblings(".j-chkbox");
                    n.hasClass("cur") ? (n.removeClass("cur"), o.attr("checked", !1)) : (n.addClass("cur"), o.attr("checked", !0))
                }), n.on("click", ".j-use", function () {
                    i();
                    var t = [], c = [];
                    for (var s in a) t = t.concat(a[s].ids), c = c.concat(a[s].data);
                    o.callback && o.callback(c, t), e.jBox.close(n)
                }), n.on("click", ".j-selectAll", function () {
                    n.find(".j-select").addClass("cur"), n.find(".j-chkbox").attr("checked", !0)
                }), n.on("click", ".j-selectReverse", function () {
                    n.find(".j-select").each(function () {
                        var n = e(this), o = n.siblings(".j-chkbox");
                        n.hasClass("cur") ? (n.removeClass("cur"), o.attr("checked", !1)) : (n.addClass("cur"), o.attr("checked", !0))
                    })
                }), n.on("click", ".j-cancelSelectAll", function () {
                    n.find(".j-select").removeClass("cur"), n.find(".j-chkbox").attr("checked", !1)
                }))
            }, btnOK: {show: !1}, btnCancel: {show: !1}
        })
    }
}(jQuery, document, window), $(function () {
    var e = null, n = null, o = null, i = {content: "", callback: null};
    $.composeBox = function (t) {
        var c = $.extend(!0, {}, i, t), a = $("#tpl_popup_selectCompose").html(), s = $(a);
        $("body").append(s);
        var l = ($(".J-composeBox").height(), $(window).height());
        $("body").append('<div class="box-overlay"></div>'), $(".box-overlay").css("height", l);
        var r = $(window).height(), d = $(".compose_top").height(), u = $("#tmpl h2").height(), g = r - d - u;
        s.find(".compose_lists").css({height: g, overflow: "auto"});
        var p = function () {
            $(".J-composeBox").remove(), $(".box-overlay").remove(), $("body").css({height: "auto", overflow: "auto"})
        };
        renderData(s, "10"), s.on("click", ".J-okClk", function () {
            c.content = e.getContent(), n = c.content, o = html_encode(c.content), c.callback && c.callback(n, o), p(), e.destroy()
        }), s.on("click", ".J-noClk", function () {
            p(), e.destroy()
        }), s.find("#nav li").click(function () {
            var e = $(this), n = e.data("id");
            e.addClass("active").siblings().removeClass("active"), renderData(s, n)
        }), s.on("click", ".compose_lists li", function () {
            var n = $(this).find(".pEditor").html() + "<p></p>";
            e.focus(), e.execCommand("inserthtml", n)
        }), e = UE.getEditor("edit_content", {
            autoHeight: !1,
            autoHeightEnabled: !1,
            autoClearinitialContent: !1,
            initialFrameHeight: g - 74
        }), e.ready(function () {
            e.setContent(c.content)
        })
    }, _QV_ = "%E6%9D%AD%E5%B7%9E%E5%90%AF%E5%8D%9A%E7%A7%91%E6%8A%80%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8%E7%89%88%E6%9D%83%E6%89%80%E6%9C%89", renderData = function (e, n) {
        $.ajax({
            url: "/Public/mockdata/composedata/dataset" + n + ".json?v=" + Math.round(100 * Math.random()),
            type: "GET",
            dataType: "json",
            beforeSend: function () {
                $.jBox.showloading()
            },
            success: function (n) {
                if (1 == n.status) {
                    var o = $("#tpl_Compose_lists").html(), i = _.template(o, {dataset: n.data}), t = $(i);
                    $("#tmpl .compose_lists").empty().append(t)
                } else HYD.hint("danger", "获取数据失败，"), $.jBox.close(e);
                $.jBox.hideloading()
            }
        })
    }, html_encode = function (e) {
        var n = "";
        return 0 == e.length ? "" : (n = e.replace(/&/g, "&amp;"), n = n.replace(/</g, "&lt;"), n = n.replace(/>/g, "&gt;"), n = n.replace(/ /g, "&nbsp;"), n = n.replace(/\'/g, "&#39;"), n = n.replace(/\"/g, "&quot;"))
    }, html_decode = function (e) {
        var n = "";
        return 0 == e.length ? "" : (n = e.replace(/&amp;/g, "&"), n = n.replace(/&lt;/g, "<"), n = n.replace(/&gt;/g, ">"), n = n.replace(/&nbsp;/g, " "), n = n.replace(/&#39;/g, "'"), n = n.replace(/&quot;/g, '"'))
    }
});
var HYD = HYD ? HYD : {};
HYD.Constant = HYD.Constant ? HYD.Constant : {}, HYD.popbox = HYD.popbox ? HYD.popbox : {}, HYD.linkType = {
    1: "选择商品",
    2: "商品分组",
    3: "专题页面",
    4: "页面分类",
    5: "营销活动",
    6: "店铺主页",
    7: "会员主页",
    8: "分销申请",
    9: "购物车",
    10: "全部商品",
    12: "商品分类",
    11: "自定义链接",
    13: "我的订单"
}, HYD.getTimestamp = function () {
    var e = new Date;
    return "" + e.getFullYear() + parseInt(e.getMonth() + 1) + e.getDate() + e.getHours() + e.getMinutes() + e.getSeconds() + e.getMilliseconds()
}, HYD.hint = function (e, n, o) {
    if (e && n) {
        var i = $("#tpl_hint").html(), t = _.template(i, {type: e, content: n}), c = $(t), a = 200, o = o || 1500;
        $("body").append(c.css({opacity: "0", zIndex: "999999"})), c.animate({opacity: 1, top: 200}, a, function () {
            setTimeout(function () {
                c.animate({opacity: 0, top: 600}, a, function () {
                    $(this).remove()
                })
            }, o)
        })
    }
}, HYD.FormShowError = function (e, n, o) {
    e && n && (void 0 == o && (o = !0), e.addClass("error").siblings(".fi-help-text").addClass("error").text(n).show(), o && e.focus(), "select" == e[0].nodeName.toLowerCase() && e.siblings(".select-sim").addClass("error"), e.one("change", function () {
        HYD.FormClearError($(this))
    }))
}, HYD.FormClearError = function (e) {
    e && (e.removeClass("error").siblings(".fi-help-text").hide(), "select" == e[0].nodeName.toLowerCase() && e.siblings(".select-sim").removeClass("error"))
}, HYD.showQrcode = function (e) {
    var n = $("#qrcode");
    if (!n.length) {
        var o = _.template($("#tpl_qrcode").html(), {src: e});
        n = $(o), n.click(function () {
            n.fadeOut(300)
        }), $("body").append(n)
    }
    n.find("img").attr("src", e), n.fadeIn(300)
}, HYD.changeWizardStep = function (e, n) {
    var o = $(e), i = o.find(".wizard-item");
    i.removeClass("process complete");
    for (var t = 0; t <= n - 1; t++) i.filter(":eq(" + t + ")").addClass("complete");
    i.filter(":eq(" + n + ")").addClass("process")
}, HYD.autoLocation = function (e, n) {
    if (e) {
        var n = n ? n : 2e3;
        timer = setInterval(function () {
            n <= 1e3 ? (clearInterval(timer), window.location.href = e) : (n -= 1e3, $("#j-autoLocation-second").text(n / 1e3))
        }, 1e3)
    }
}, HYD.ajaxPopTable = function (e) {
    var n, o, i = {title: "", url: "", data: {p: 1}, tpl: "", onOpen: null, onPageChange: null},
        t = $.extend(!0, {}, i, e), c = $("<div></div>"), a = function (e) {
            var i = t.tpl, s = t.url, l = function (s) {
                n = s;
                var l = _.template(i, s), r = $(l);
                c.empty().append(r), c.find(".paginate a:not(.disabled,.cur)").click(function () {
                    for (var e = $(this).attr("href"), n = e.split("/"), o = 0; o < n.length; o++) if ("p" == n[o]) {
                        t.data.p = n[o + 1], a();
                        break
                    }
                    return !1
                }), e && e(), t.onPageChange && t.onPageChange(o, n)
            };
            $.ajax({
                url: s + "?v=" + Math.round(100 * Math.random()),
                type: "post",
                dataType: "json",
                data: t.data,
                success: function (e) {
                    1 == e.status ? l(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
                }
            })
        };
    a(function () {
        $.jBox.show({
            title: t.title, content: c, btnOK: {show: !1}, btnCancel: {show: !1}, onOpen: function (e) {
                o = e, t.onOpen && t.onOpen(e, n)
            }
        })
    })
}, HYD.popbox.ImgPicker = function (e) {
    var n, o = $("#tpl_popbox_ImgPicker").html(), i = $(o), t = function (e, o) {
        var c = function (e) {
            if (n = e.list, n && n.length) {
                var c = _.template($("#tpl_popbox_ImgPicker_listItem").html(), {dataset: n}), a = $(c);
                a.filter("li").click(function () {
                    $(this).toggleClass("selected")
                }), i.find(".imgpicker-list").empty().append(a);
                var s = e.page, l = $(s);
                l.filter("a:not(.disabled,.cur)").click(function () {
                    var e = $(this).attr("href"), n = e.split("/");
                    return n = n[n.length - 1], n = n.replace(/.html/, ""), t(n), !1
                }), i.find(".paginate").empty().append(l)
            } else i.find(".imgpicker-list").append("<p class='txtCenter'>对不起，暂无图片</p>");
            o && o()
        };
        $.ajax({
            url: "/Design/getImg?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: {p: parseInt(e)},
            success: function (e) {
                1 == e.status ? c(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
            }
        })
    }, c = function (n) {
        var o = [];
        i.find("#imgpicker_upload_input").uploadify({
            debug: !1,
            auto: !0,
            formData: {PHPSESSID: $.cookie("PHPSESSID")},
            width: 60,
            height: 60,
            multi: !0,
            swf: "/Public/plugins/uploadify/uploadify.swf",
            uploader: "/Design/uploadFile",
            buttonText: "+",
            fileSizeLimit: "5MB",
            fileTypeExts: "*.jpg; *.jpeg; *.png; *.gif; *.bmp",
            onSelectError: function (e, n, o) {
                switch (n) {
                    case-100:
                        HYD.hint("danger", "对不起，系统只允许您一次最多上传10个文件");
                        break;
                    case-110:
                        HYD.hint("danger", "对不起，文件 [" + e.name + "] 大小超出5MB！");
                        break;
                    case-120:
                        HYD.hint("danger", "文件 [" + e.name + "] 大小异常！");
                        break;
                    case-130:
                        HYD.hint("danger", "文件 [" + e.name + "] 类型不正确！")
                }
            },
            onFallback: function () {
                HYD.hint("danger", "您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。")
            },
            onUploadSuccess: function (e, n, t) {
                var n = $.parseJSON(n), c = $("#tpl_popbox_ImgPicker_uploadPrvItem").html(),
                    a = i.find(".imgpicker-upload-preview"), s = n.file_path;
                o.push(s);
                var l = _.template(c, {url: s}), r = $(l);
                r.find(".j-imgpicker-upload-btndel").click(function () {
                    var e = i.find(".imgpicker-upload-preview li").index($(this).parent("li"));
                    r.fadeOut(300, function () {
                        o.splice(e, 1), $(this).remove()
                    })
                }), a.append(r)
            },
            onUploadError: function (e, n, o, i) {
                HYD.hint("danger", "对不起：" + e.name + "上传失败：" + i)
            }
        }), i.find("#j-btn-uploaduse").click(function () {
            e && e(o), $.jBox.close(n)
        })
    };
    t(1, function () {
        $.jBox.show({
            title: "选择图片", content: i, btnOK: {show: !1}, btnCancel: {show: !1}, onOpen: function (o) {
                var t = i.find("#j-btn-listuse");
                t.click(function () {
                    var t = [];
                    i.find(".imgpicker-list li.selected").each(function () {
                        t.push(n[$(this).index()])
                    }), e && e(t), $.jBox.close(o)
                }), i.find(".j-initupload").one("click", function () {
                    c(o)
                })
            }
        })
    })
}, HYD.popbox.IconPicker = function (e) {
    var n, o = $("#icon_imgPicker").html(), i = $(o);
    n = $.browser.chrome ? "body" : document.documentElement || document.body, $(n).append(i);
    var t = $("#icon_imglist").html(), c = {style: "style1", color: "color0"}, a = function (e) {
        c = e ? e : c;
        var n = _.template(t, {data: HYD.popbox.iconimgsrc.data[c.style][c.color]});
        i.find(".albums-icon-tab").html(n), i.find(".albums-icon-tab").find("li").click(function (e) {
            var n = $(this);
            n.hasClass("selected") || n.addClass("selected").siblings("li").removeClass("selected")
        })
    };
    a(c), i.find(".albums-cr-actions").children("a").click(function (e) {
        var n = $(this), o = n.data("style");
        c.style = o, n.addClass("cur").siblings("a").removeClass("cur"), a(c)
    }), i.find(".albums-color-tab").find("li").click(function (e) {
        var n = $(this), o = n.data("color");
        c.color = o, n.addClass("cur").siblings("li").removeClass("cur"), a(c), "color1" == o && $(".albums-icon-tab").find("li").css({background: "#333"})
    });
    var s = [];
    i.find("#j-useIcon").click(function (n) {
        var o = i.find(".albums-icon-tab").find("li.selected");
        if (0 == o.length) return HYD.hint("danger", "对不起，请选择一张小图标"), !1;
        var t = o.children("img").attr("src");
        t = t.replace("Public", "PublicMob"), s.push(t), l(), e && e(s)
    });
    var l = function () {
        i.remove()
    };
    i.find("#Jclose").click(function (e) {
        l()
    })
}, HYD.popbox.ModulePicker = function (e) {
    var n, o = $("#tpl_popbox_ModulePicker").html(), i = $(o), t = function (e, o) {
        var c = function (e) {
            if (n = e.list, n && n.length) {
                var c = $("#tpl_popbox_ModulePicker_item").html(), a = _.template(c, {dataset: n}), s = $(a);
                i.find(".modulePicker-list").empty().append(s);
                var l = e.page, r = $(l);
                r.filter("a:not(.disabled,.cur)").click(function () {
                    var e = $(this).attr("href"), n = e.split("/");
                    return n = n[n.length - 1], n = n.replace(/.html/, ""), t(n), !1
                }), i.find(".paginate").empty().append(r)
            } else i.find(".modulePicker-list").append("<p class='txtCenter'>对不起，暂无自定义模块</p>");
            o && o()
        };
        $.ajax({
            url: "/Design/getModule?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: {p: parseInt(e)},
            success: function (e) {
                1 == e.status ? c(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
            }
        })
    };
    t(1, function () {
        $.jBox.show({
            title: "选择自定义模块", content: i, btnOK: {show: !1}, btnCancel: {show: !1}, onOpen: function (o) {
                i.on("click", ".j-select", function () {
                    var i = $(".modulePicker-list li").index($(this).parent("li"));
                    e && e(n[i]), $.jBox.close(o)
                })
            }
        })
    })
}, HYD.popbox.GoodsAndGroupPicker = function (e, n) {
    var o, i, t = $("#tpl_popbox_GoodsAndGroupPicker").html(), c = $(t), a = [], s = [], l = function (e, n) {
        var i = function (e) {
            if (o = e.list, o && o.length) {
                var i = $("#tpl_popbox_GoodsAndGroupPicker_goodsitem").html(), t = _.template(i, {dataset: o}),
                    r = $(t);
                r.find(".j-select").click(function () {
                    var e, n = $(this), i = n.parent("li"), t = i.index(), c = i.data("item"), l = $(".j-verify").val();
                    if (e = "" != l ? l.split(",") : [], i.hasClass("selected")) {
                        if (i.removeClass("selected"), n.removeClass("btn-success").text("选取"), 0 != a.length) for (var r = 0; r < a.length; r++) if (c == a[r].item_id) {
                            a.splice(r, 1);
                            break
                        }
                        if (0 != s.length) for (var r = 0; r < s.length; r++) {
                            var d = s[r];
                            if (c == d) {
                                s.splice(r, 1);
                                break
                            }
                        }
                        if (0 != e.length) {
                            for (var r = 0; r < e.length; r++) {
                                var d = e[r];
                                if (c == d) {
                                    e.splice(r, 1);
                                    break
                                }
                            }
                            l = e.join(","), $(".j-verify").val(l)
                        }
                    } else i.addClass("selected"), n.addClass("btn-success").text("已选"), a.push(o[t]), s.push(c), e.push(c), l = e.join(","), $(".j-verify").val(l)
                }), c.find(".gagp-goodslist").empty().append(r);
                var d = e.page, u = $(d);
                u.filter("a:not(.disabled,.cur)").click(function () {
                    var e = $(this).attr("href"), n = e.split("/");
                    return n = n[n.length - 1], n = n.replace(/.html/, ""), l(n), !1
                }), c.find(".paginate:eq(0)").empty().append(u)
            } else c.find(".gagp-goodslist").append("<p class='txtCenter'>对不起，暂无数据</p>");
            var g = [];
            "" != $(".j-verify").val() ? g = $(".j-verify").val().split(",") : $(".img-list li").not(".img-list-add").each(function (e, n) {
                var o = $(this).data("item");
                g.push(o)
            }), c.find("li").each(function (e, n) {
                var o = $(this), i = o.data("item");
                $.each(g, function (e, n) {
                    i == n && (o.addClass("selected"), o.children(".j-select").addClass("btn-success").text("已选"))
                })
            }), n && n()
        };
        $.ajax({
            url: "/Design/getItem?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: {p: parseInt(e)},
            success: function (e) {
                1 == e.status ? i(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
            }
        })
    }, r = function (e, n) {
        var o = function (e) {
            if (i = e.list, i && i.length) {
                var o = $("#tpl_popbox_GoodsAndGroupPicker_groupitem").html(), t = _.template(o, {dataset: i}),
                    a = $(t);
                c.find(".gagp-grouplist").empty().append(a);
                var s = e.page, l = $(s);
                l.filter("a:not(.disabled,.cur)").click(function () {
                    var e = $(this).attr("href"), n = e.split("/");
                    return n = n[n.length - 1], n = n.replace(/.html/, ""), r(n), !1
                }), c.find(".paginate").empty().append(l)
            } else c.find(".gagp-grouplist").append("<p class='txtCenter'>对不起，暂无数据</p>");
            var d = $(".badge-success").data("group");
            void 0 != d && c.find(".gagp-grouplist li").each(function (e, n) {
                var o = $(this), i = o.data("group");
                d == i && o.find(".j-select").addClass("btn-success").text("已选")
            }), n && n()
        };
        $.ajax({
            url: "/Design/getGroup?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: {p: parseInt(e)},
            success: function (e) {
                1 == e.status ? o(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
            }
        })
    }, d = function (e, o) {
        c.on("click", ".j-btn-goodsuse", function () {
            var o = 1;
            n && n(a, o, s), $.jBox.close(e)
        })
    }, u = function (e) {
        var i = 1;
        c.find(".j-btn-goodsuse").remove(), c.on("click", ".gagp-goodslist .j-select", function () {
            var t = $(".gagp-goodslist li").index($(this).parent("li"));
            n && n(o[t], i), $.jBox.close(e)
        })
    }, g = function (e) {
        var o = 2;
        c.on("click", ".gagp-grouplist .j-select", function () {
            var t = $(".gagp-grouplist li").index($(this).parent("li"));
            n && n(i[t], o), $.jBox.close(e)
        })
    }, p = function (e) {
        u(e), c.find(".j-tab-group").one("click", function () {
            r(1, function () {
                g(e)
            })
        })
    };
    switch (e) {
        case"goods":
        case"goodsMulti":
            c.find(".tabs").remove(), c.find(".gagp-goodslist").unwrap().unwrap(), c.find(".tc[data-index='2']").remove(), l(1, function () {
                var n = '<span class="fl">选择商品</span><div class="goodsearch"><input type="text" name="title" placeholder="请输入商品名称" /><select class="select small newselect" style="width:90px;"><option value="-1">在售中</option><option value="3">仓库中</option></select><a href="javascript:;" class="btn btn-primary jGetgood"><i class="gicon-search white"></i>查询</a></div>';
                $.jBox.show({
                    title: n, content: c, btnOK: {show: !1}, btnCancel: {show: !1}, onOpen: function (n) {
                        if ("goodsMulti" == e) {
                            var i = [];
                            $(".img-list li").not(".img-list-add").each(function (e, n) {
                                var o = $(this).data("item");
                                i.push(o)
                            }), c.find("li").each(function (e, n) {
                                var o = $(this), t = o.data("item");
                                $.each(i, function (e, n) {
                                    t == n && (o.addClass("selected"), o.children(".j-select").addClass("btn-success").text("已选"))
                                })
                            }), d(n, i)
                        } else u(n);
                        $(document).on("click", ".jGetgood", function (e) {
                            var n = $(this).siblings("input").val(), i = $(this).siblings("select").val(),
                                t = function (e, l) {
                                    e = e ? e : 1;
                                    var r = function (e) {
                                        if (o = e.list, o && o.length) {
                                            var n = $("#tpl_popbox_GoodsAndGroupPicker_goodsitem").html(),
                                                i = _.template(n, {dataset: o}), r = $(i);
                                            r.find(".j-select").click(function () {
                                                var e, n = $(this), i = n.parent("li"), t = i.index(),
                                                    c = i.data("item"), l = $(".j-verify").val();
                                                if (e = "" != l ? l.split(",") : [], i.hasClass("selected")) {
                                                    if (i.removeClass("selected"), n.removeClass("btn-success").text("选取"), 0 != a.length) for (var r = 0; r < a.length; r++) if (c == a[r].item_id) {
                                                        a.splice(r, 1);
                                                        break
                                                    }
                                                    if (0 != s.length) for (var r = 0; r < s.length; r++) {
                                                        var d = s[r];
                                                        if (c == d) {
                                                            s.splice(r, 1);
                                                            break
                                                        }
                                                    }
                                                    if (0 != e.length) {
                                                        for (var r = 0; r < e.length; r++) {
                                                            var d = e[r];
                                                            if (c == d) {
                                                                e.splice(r, 1);
                                                                break
                                                            }
                                                        }
                                                        l = e.join(","), $(".j-verify").val(l)
                                                    }
                                                } else i.addClass("selected"), n.addClass("btn-success").text("已选"), a.push(o[t]), s.push(c), e.push(c), l = e.join(","), $(".j-verify").val(l)
                                            }), c.find(".gagp-goodslist").empty().append(r);
                                            var d = e.page, u = $(d);
                                            u.filter("a:not(.disabled,.cur)").click(function () {
                                                var e = $(this).attr("href"), n = e.split("/");
                                                return n = n[n.length - 1], n = n.replace(/.html/, ""), t(n), !1
                                            }), c.find(".paginate:eq(0)").empty().append(u)
                                        } else c.find(".gagp-goodslist").empty().append("<p class='txtCenter'>对不起，暂无数据</p>"), c.find(".paginate").empty();
                                        l && l()
                                    };
                                    $.ajax({
                                        url: "/Design/getItem?v=" + Math.round(100 * Math.random()),
                                        type: "post",
                                        dataType: "json",
                                        data: {p: parseInt(e), title: n, status: i},
                                        success: function (e) {
                                            1 == e.status ? r(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
                                        }
                                    })
                                };
                            t()
                        })
                    }
                })
            });
            break;
        case"group":
            c.find(".tabs").remove(), c.find(".gagp-grouplist").unwrap().unwrap(), c.find(".tc[data-index='1']").remove(), r(1, function () {
                $.jBox.show({
                    title: "选择商品分组",
                    content: c,
                    btnOK: {show: !1},
                    btnCancel: {show: !1},
                    onOpen: function (e) {
                        g(e)
                    }
                })
            });
            break;
        case"all":
            l(1, function () {
                $.jBox.show({
                    title: "选择商品或商品分组",
                    content: c,
                    btnOK: {show: !1},
                    btnCancel: {show: !1},
                    onOpen: function (e) {
                        p(e)
                    }
                })
            })
    }
}, HYD.popbox.MgzAndMgzCate = function (e, n) {
    var o, i, t = $("#tpl_popbox_MgzAndMgzCate").html(), c = $(t), a = function (e, n) {
        var i = function (e) {
            if (o = e.list, o && o.length) {
                var i = $("#tpl_popbox_MgzAndMgzCate_item").html(), t = _.template(i, {dataset: o}), s = $(t);
                s.find(".j-select").click(function () {
                    var e = $(this), n = e.parent("li");
                    n.hasClass("selected") ? (n.removeClass("selected"), e.removeClass("btn-success").text("选取")) : (n.addClass("selected"), e.addClass("btn-success").text("已选"))
                }), c.find(".mgz-list-panel1").empty().append(s);
                var l = e.page, r = $(l);
                r.filter("a:not(.disabled,.cur)").click(function () {
                    var e = $(this).attr("href"), n = e.split("/");
                    return n = n[n.length - 1], n = n.replace(/.html/, ""), a(n), !1
                }), c.find(".paginate").empty().append(r)
            } else c.find(".mgz-list-panel1").empty().append("<p class='txtCenter'>对不起，暂无数据</p>");
            n && n()
        };
        $.ajax({
            url: "/Design/getMagazine?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: {p: parseInt(e)},
            success: function (e) {
                1 == e.status ? i(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
            }
        })
    }, s = function (e, n) {
        var o = function (e) {
            if (i = e.list, i && i.length) {
                var o = $("#tpl_popbox_MgzAndMgzCate_item").html(), t = _.template(o, {dataset: i}), a = $(t);
                a.find(".j-select").click(function () {
                    var e = $(this), n = e.parent("li");
                    n.hasClass("selected") ? (n.removeClass("selected"), e.removeClass("btn-success").text("选取")) : (n.addClass("selected"), e.addClass("btn-success").text("已选"))
                }), c.find(".mgz-list-panel2").empty().append(a);
                var l = e.page, r = $(l);
                r.filter("a:not(.disabled,.cur)").click(function () {
                    var e = $(this).attr("href"), n = e.split("/");
                    return n = n[n.length - 1], n = n.replace(/.html/, ""), s(n), !1
                }), c.find(".paginate").empty().append(r)
            } else c.find(".mgz-list-panel2").empty().append("<p class='txtCenter'>对不起，暂无数据</p>");
            n && n()
        };
        $.ajax({
            url: "/Design/getMagazineCategory?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: {p: parseInt(e)},
            success: function (e) {
                1 == e.status ? o(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
            }
        })
    }, l = function (e) {
        c.on("click", ".mgz-list-panel1 .j-select", function () {
            var i = $(".mgz-list-panel1 li").index($(this).parent("li"));
            n && n(o[i], 3), $.jBox.close(e)
        })
    }, r = function (e) {
        c.on("click", ".mgz-list-panel2 .j-select", function () {
            var o = $(".mgz-list-panel2 li").index($(this).parent("li"));
            n && n(i[o], 4), $.jBox.close(e)
        })
    }, d = function (e) {
        c.on("click", ".j-btn-use", function () {
            var o = [], t = 4;
            c.find(".mgz-list-panel2 li.selected").each(function () {
                o.push(i[$(this).index()])
            }), n && n(o, t), $.jBox.close(e)
        })
    }, u = function (e) {
        l(e), c.find(".j-tab-mgzcate").one("click", function () {
            s(1, function () {
                r(e)
            })
        })
    };
    switch (e) {
        case"mgzCate":
            c.find(".tabs").remove(), c.find(".mgz-list-panel2").unwrap().unwrap(), c.find(".tc[data-index='1']").remove(), c.find(".j-btn-use").remove(), s(1, function () {
                $.jBox.show({
                    title: "选择专题分类",
                    content: c,
                    btnOK: {show: !1},
                    btnCancel: {show: !1},
                    onOpen: function (e) {
                        r(e)
                    }
                })
            });
            break;
        case"mgzCateMulti":
            c.find(".tabs").remove(), c.find(".mgz-list-panel2").unwrap().unwrap(), c.find(".tc[data-index='1']").remove(), s(1, function () {
                $.jBox.show({
                    title: "选择专题分类",
                    content: c,
                    btnOK: {show: !1},
                    btnCancel: {show: !1},
                    onOpen: function (e) {
                        d(e)
                    }
                })
            });
            break;
        case"mgz":
            c.find(".tabs").remove(), c.find(".mgz-list-panel1").unwrap().unwrap(), c.find(".tc[data-index='2']").remove(), c.find(".j-btn-use").remove(), a(1, function () {
                $.jBox.show({
                    title: "选择专题页面",
                    content: c,
                    btnOK: {show: !1},
                    btnCancel: {show: !1},
                    onOpen: function (e) {
                        u(e)
                    }
                })
            });
            break;
        case"all":
            c.find(".j-btn-use").remove(), a(1, function () {
                $.jBox.show({
                    title: "选择专题页面或者分类",
                    content: c,
                    btnOK: {show: !1},
                    btnCancel: {show: !1},
                    onOpen: function (e) {
                        u(e)
                    }
                })
            })
    }
    switch (e) {
        case"goods":
        case"goodsMulti":
            c.find(".tabs").remove(), c.find(".gagp-goodslist").unwrap().unwrap(), c.find(".tc[data-index='2']").remove(), showListRender_goods(1, function () {
                $.jBox.show({
                    title: "选择商品", content: c, btnOK: {show: !1}, btnCancel: {show: !1}, onOpen: function (n) {
                        "goodsMulti" == e ? selectEvent_goods_multi(n) : selectEvent_goods(n)
                    }
                })
            });
            break;
        case"group":
            c.find(".tabs").remove(), c.find(".gagp-grouplist").unwrap().unwrap(), c.find(".tc[data-index='1']").remove(), showListRender_group(1, function () {
                $.jBox.show({
                    title: "选择商品分组",
                    content: c,
                    btnOK: {show: !1},
                    btnCancel: {show: !1},
                    onOpen: function (e) {
                        selectEvent_group(e)
                    }
                })
            });
            break;
        case"all":
            showListRender_goods(1, function () {
                $.jBox.show({
                    title: "选择商品或商品分组",
                    content: c,
                    btnOK: {show: !1},
                    btnCancel: {show: !1},
                    onOpen: function (e) {
                        selectEvent_goodsAndGroup(e)
                    }
                })
            })
    }
}, HYD.popbox.GamePicker = function (e, n) {
    var o = $("#tpl_popbox_GamePicker").html(), i = $(o), t = {1: [], 2: [], 3: [], 4: []}, c = function (e, n, o) {
        var a = function (n) {
            if (t[e] = n.list, t[e] && t[e].length) {
                var a = $("#tpl_popbox_GamePicker_item").html(), s = _.template(a, {dataset: t[e]}), l = $(s);
                l.find(".j-select").click(function () {
                    var e = $(this), n = e.parent("li");
                    n.hasClass("selected") ? (n.removeClass("selected"), e.removeClass("btn-success").text("选取")) : (n.addClass("selected"), e.addClass("btn-success").text("已选"))
                }), i.find(".game-list-panel" + e).empty().append(l);
                var r = n.page, d = $(r);
                d.filter("a:not(.disabled,.cur)").click(function () {
                    var n = $(this).attr("href"), o = n.split("/");
                    return o = o[o.length - 1], o = o.replace(/.html/, ""), c(e, o), !1
                }), i.find(".paginate:eq(" + (e - 1) + ")").empty().append(d)
            } else i.find(".game-list-panel" + e).empty().append("<p class='txtCenter'>对不起，暂无数据</p>");
            o && o(e)
        }, s = {1: 1, 2: 4, 3: 3, 4: 5};
        $.ajax({
            url: "/Design/getGame?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: {p: parseInt(n), type: parseInt(s[e])},
            success: function (e) {
                1 == e.status ? a(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
            }
        })
    }, a = function (e, o) {
        i.on("click", ".game-list-panel" + o + " .j-select", function () {
            var i = $(".game-list-panel" + o + " li").index($(this).parent("li"));
            n && n(t[o][i], 5), $.jBox.close(e)
        })
    };
    c(1, 1, function (e) {
        $.jBox.show({
            title: "选择营销活动", content: i, btnOK: {show: !1}, btnCancel: {show: !1}, onOpen: function (n) {
                a(n, e), i.find(".j-tab-game").one("click", function () {
                    var e = $(this).data("index");
                    c(e, 1, function (e) {
                        a(n, e)
                    })
                })
            }
        })
    })
}, HYD.popbox.dplPickerColletion = function (e) {
    var n = {linkType: 1, callback: null}, o = $.extend(!0, {}, n, e);
    switch (parseInt(o.linkType)) {
        case 1:
            $.selectGoods({
                selectMod: 1, callback: function (e) {
                    o.callback(e, 1)
                }
            });
            break;
        case 2:
            HYD.popbox.GoodsAndGroupPicker("group", o.callback);
            break;
        case 3:
            HYD.popbox.MgzAndMgzCate("mgz", o.callback);
            break;
        case 4:
            HYD.popbox.MgzAndMgzCate("mgzCate", o.callback);
            break;
        case 5:
            HYD.popbox.GamePicker("all", o.callback);
            break;
        case 6:
            var i = {title: "店铺主页", link: "/Shop/index"};
            o.callback(i, 6);
            break;
        case 7:
            var i = {title: "会员主页", link: "/User/index"};
            o.callback(i, 7);
            break;
        case 8:
            var i = {title: "分销申请", link: "/User/dist_apply"};
            o.callback(i, 8);
            break;
        case 9:
            var i = {title: "购物车", link: " /Item/cart"};
            o.callback(i, 9);
            break;
        case 10:
            var i = {title: "全部商品", link: " /Item/lists"};
            o.callback(i, 10);
            break;
        case 11:
            var i = {title: "", link: ""};
            o.callback(i, 11);
            break;
        case 12:
            var i = {title: "商品分类", link: "/Item/item_class"};
            o.callback(i, 12);
            break;
        case 13:
            var i = {title: "我的订单", link: "/Order/lists"};
            o.callback(i, 13)
    }
}, HYD.ajaxPopTable = function (e) {
    var n, o, i = {
        title: "",
        url: "",
        width: "auto",
        minHeight: "auto",
        data: {p: 1},
        tpl: "",
        onOpen: null,
        onPageChange: null
    }, t = $.extend(!0, {}, i, e), c = $("<div></div>"), a = function (e) {
        var i = t.tpl, s = t.url, l = function (s) {
            n = s;
            var l = _.template(i, s), r = $(l);
            c.empty().append(r), c.find(".paginate a:not(.disabled,.cur)").click(function () {
                for (var e = $(this).attr("href"), n = e.split("/"), o = 0; o < n.length; o++) if ("p" == n[o]) {
                    t.data.p = n[o + 1].replace(/.html/, ""), a();
                    break
                }
                return !1
            }), e && e(), t.onPageChange && t.onPageChange(o, n)
        };
        $.ajax({
            url: s + "?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: t.data,
            success: function (e) {
                1 == e.status ? l(e) : HYD.hint("danger", "对不起，获取数据失败：" + e.msg)
            }
        })
    };
    a(function () {
        $.jBox.show({
            title: t.title,
            width: t.width,
            minHeight: t.minHeight,
            content: c,
            btnOK: {show: !1},
            btnCancel: {show: !1},
            onOpen: function (e) {
                o = e, t.onOpen && t.onOpen(e, n)
            }
        })
    })
}, HYD.regRules = {
    email: /^[a-z]([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i,
    mobphone: /^(1(([35][0-9])|(47)|[8][01236789]))\d{8}$/,
    telphone: /^0\d{2,3}(\-)?\d{7,8}$/,
    integer: /^\d+$/,
    "float": /^[\d]*\.?[\d]+$/
}, HYD.popbox.iconimgsrc = {
    data: {
        style1: {
            color0: ["/Public/images/icon/style1/color0/icon_home.png", "/Public/images/icon/style1/color0/icon_allgoods.png", "/Public/images/icon/style1/color0/icon_newgoods.png", "/Public/images/icon/style1/color0/icon_user.png", "/Public/images/icon/style1/color0/icon_fx.png", "/Public/images/icon/style1/color0/icon_active.png", "/Public/images/icon/style1/color0/icon_hotsale.png", "/Public/images/icon/style1/color0/icon_subject.png", "/Public/images/icon/style1/color0/style1_gz0.png", "/Public/images/icon/style1/color0/style1_shopcar0.png"],
            color1: ["/Public/images/icon/style1/color1/icon_home.png", "/Public/images/icon/style1/color1/icon_allgoods.png", "/Public/images/icon/style1/color1/icon_newgoods.png", "/Public/images/icon/style1/color1/icon_user.png", "/Public/images/icon/style1/color1/icon_fx.png", "/Public/images/icon/style1/color1/icon_active.png", "/Public/images/icon/style1/color1/icon_hotsale.png", "/Public/images/icon/style1/color1/icon_subject.png", "/Public/images/icon/style1/color1/style1_gz1.png", "/Public/images/icon/style1/color1/style1_shopcar1.png"],
            color2: ["/Public/images/icon/style1/color2/icon_home.png", "/Public/images/icon/style1/color2/icon_allgoods.png", "/Public/images/icon/style1/color2/icon_newgoods.png", "/Public/images/icon/style1/color2/icon_user.png", "/Public/images/icon/style1/color2/icon_fx.png", "/Public/images/icon/style1/color2/icon_active.png", "/Public/images/icon/style1/color2/icon_hotsale.png", "/Public/images/icon/style1/color2/icon_subject.png", "/Public/images/icon/style1/color2/style1_gz2.png", "/Public/images/icon/style1/color2/style1_shopcar2.png"],
            color3: ["/Public/images/icon/style1/color3/icon_home.png", "/Public/images/icon/style1/color3/icon_allgoods.png", "/Public/images/icon/style1/color3/icon_newgoods.png", "/Public/images/icon/style1/color3/icon_user.png", "/Public/images/icon/style1/color3/icon_fx.png", "/Public/images/icon/style1/color3/icon_active.png", "/Public/images/icon/style1/color3/icon_hotsale.png", "/Public/images/icon/style1/color3/icon_subject.png", "/Public/images/icon/style1/color3/style1_gz3.png", "/Public/images/icon/style1/color3/style1_shopcar3.png"],
            color4: ["/Public/images/icon/style1/color4/icon_home.png", "/Public/images/icon/style1/color4/icon_allgoods.png", "/Public/images/icon/style1/color4/icon_newgoods.png", "/Public/images/icon/style1/color4/icon_user.png", "/Public/images/icon/style1/color4/icon_fx.png", "/Public/images/icon/style1/color4/icon_active.png", "/Public/images/icon/style1/color4/icon_hotsale.png", "/Public/images/icon/style1/color4/icon_subject.png", "/Public/images/icon/style1/color4/style1_gz4.png", "/Public/images/icon/style1/color4/style1_shopcar4.png"],
            color5: ["/Public/images/icon/style1/color5/icon_home.png", "/Public/images/icon/style1/color5/icon_allgoods.png", "/Public/images/icon/style1/color5/icon_newgoods.png", "/Public/images/icon/style1/color5/icon_user.png", "/Public/images/icon/style1/color5/icon_fx.png", "/Public/images/icon/style1/color5/icon_active.png", "/Public/images/icon/style1/color5/icon_hotsale.png", "/Public/images/icon/style1/color5/icon_subject.png", "/Public/images/icon/style1/color5/style1_gz5.png", "/Public/images/icon/style1/color5/style1_shopcar5.png"],
            color6: ["/Public/images/icon/style1/color6/icon_home.png", "/Public/images/icon/style1/color6/icon_allgoods.png", "/Public/images/icon/style1/color6/icon_newgoods.png", "/Public/images/icon/style1/color6/icon_user.png", "/Public/images/icon/style1/color6/icon_fx.png", "/Public/images/icon/style1/color6/icon_active.png", "/Public/images/icon/style1/color6/icon_hotsale.png", "/Public/images/icon/style1/color6/icon_subject.png", "/Public/images/icon/style1/color6/style1_gz6.png", "/Public/images/icon/style1/color6/style1_shopcar6.png"],
            color7: ["/Public/images/icon/style1/color7/icon_home.png", "/Public/images/icon/style1/color7/icon_allgoods.png", "/Public/images/icon/style1/color7/icon_newgoods.png", "/Public/images/icon/style1/color7/icon_user.png", "/Public/images/icon/style1/color7/icon_fx.png", "/Public/images/icon/style1/color7/icon_active.png", "/Public/images/icon/style1/color7/icon_hotsale.png", "/Public/images/icon/style1/color7/icon_subject.png", "/Public/images/icon/style1/color7/style1_gz7.png", "/Public/images/icon/style1/color7/style1_shopcar7.png"],
            color8: ["/Public/images/icon/style1/color8/icon_home.png", "/Public/images/icon/style1/color8/icon_allgoods.png", "/Public/images/icon/style1/color8/icon_newgoods.png", "/Public/images/icon/style1/color8/icon_user.png", "/Public/images/icon/style1/color8/icon_fx.png", "/Public/images/icon/style1/color8/icon_active.png", "/Public/images/icon/style1/color8/icon_hotsale.png", "/Public/images/icon/style1/color8/icon_subject.png", "/Public/images/icon/style1/color8/style1_gz8.png", "/Public/images/icon/style1/color8/style1_shopcar8.png"]
        },
        style2: {
            color0: ["/Public/images/icon/style2/color0/icon_home.png", "/Public/images/icon/style2/color0/icon_allgoods.png", "/Public/images/icon/style2/color0/icon_newgoods.png", "/Public/images/icon/style2/color0/icon_user.png", "/Public/images/icon/style2/color0/icon_fx.png", "/Public/images/icon/style2/color0/icon_active.png", "/Public/images/icon/style2/color0/icon_hotsale.png", "/Public/images/icon/style2/color0/icon_subject.png", "/Public/images/icon/style2/color0/style2_gz0.png", "/Public/images/icon/style2/color0/style2_shopcar0.png"],
            color1: ["/Public/images/icon/style2/color1/icon_home.png", "/Public/images/icon/style2/color1/icon_allgoods.png", "/Public/images/icon/style2/color1/icon_newgoods.png", "/Public/images/icon/style2/color1/icon_user.png", "/Public/images/icon/style2/color1/icon_fx.png", "/Public/images/icon/style2/color1/icon_active.png", "/Public/images/icon/style2/color1/icon_hotsale.png", "/Public/images/icon/style2/color1/icon_subject.png", "/Public/images/icon/style2/color1/style2_gz1.png", "/Public/images/icon/style2/color1/style2_shopcar1.png"],
            color2: ["/Public/images/icon/style2/color2/icon_home.png", "/Public/images/icon/style2/color2/icon_allgoods.png", "/Public/images/icon/style2/color2/icon_newgoods.png", "/Public/images/icon/style2/color2/icon_user.png", "/Public/images/icon/style2/color2/icon_fx.png", "/Public/images/icon/style2/color2/icon_active.png", "/Public/images/icon/style2/color2/icon_hotsale.png", "/Public/images/icon/style2/color2/icon_subject.png", "/Public/images/icon/style2/color2/style2_gz2.png", "/Public/images/icon/style2/color2/style2_shopcar2.png"],
            color3: ["/Public/images/icon/style2/color3/icon_home.png", "/Public/images/icon/style2/color3/icon_allgoods.png", "/Public/images/icon/style2/color3/icon_newgoods.png", "/Public/images/icon/style2/color3/icon_user.png", "/Public/images/icon/style2/color3/icon_fx.png", "/Public/images/icon/style2/color3/icon_active.png", "/Public/images/icon/style2/color3/icon_hotsale.png", "/Public/images/icon/style2/color3/icon_subject.png", "/Public/images/icon/style2/color3/style2_gz3.png", "/Public/images/icon/style2/color3/style2_shopcar3.png"],
            color4: ["/Public/images/icon/style2/color4/icon_home.png", "/Public/images/icon/style2/color4/icon_allgoods.png", "/Public/images/icon/style2/color4/icon_newgoods.png", "/Public/images/icon/style2/color4/icon_user.png", "/Public/images/icon/style2/color4/icon_fx.png", "/Public/images/icon/style2/color4/icon_active.png", "/Public/images/icon/style2/color4/icon_hotsale.png", "/Public/images/icon/style2/color4/icon_subject.png", "/Public/images/icon/style2/color4/style2_gz4.png", "/Public/images/icon/style2/color4/style2_shopcar4.png"],
            color5: ["/Public/images/icon/style2/color5/icon_home.png", "/Public/images/icon/style2/color5/icon_allgoods.png", "/Public/images/icon/style2/color5/icon_newgoods.png", "/Public/images/icon/style2/color5/icon_user.png", "/Public/images/icon/style2/color5/icon_fx.png", "/Public/images/icon/style2/color5/icon_active.png", "/Public/images/icon/style2/color5/icon_hotsale.png", "/Public/images/icon/style2/color5/icon_subject.png", "/Public/images/icon/style2/color5/style2_gz5.png", "/Public/images/icon/style2/color5/style2_shopcar5.png"],
            color6: ["/Public/images/icon/style2/color6/icon_home.png", "/Public/images/icon/style2/color6/icon_allgoods.png", "/Public/images/icon/style2/color6/icon_newgoods.png", "/Public/images/icon/style2/color6/icon_user.png", "/Public/images/icon/style2/color6/icon_fx.png", "/Public/images/icon/style2/color6/icon_active.png", "/Public/images/icon/style2/color6/icon_hotsale.png", "/Public/images/icon/style2/color6/icon_subject.png", "/Public/images/icon/style2/color6/style2_gz6.png", "/Public/images/icon/style2/color6/style2_shopcar6.png"],
            color7: ["/Public/images/icon/style2/color7/icon_home.png", "/Public/images/icon/style2/color7/icon_allgoods.png", "/Public/images/icon/style2/color7/icon_newgoods.png", "/Public/images/icon/style2/color7/icon_user.png", "/Public/images/icon/style2/color7/icon_fx.png", "/Public/images/icon/style2/color7/icon_active.png", "/Public/images/icon/style2/color7/icon_hotsale.png", "/Public/images/icon/style2/color7/icon_subject.png", "/Public/images/icon/style2/color7/style2_gz7.png", "/Public/images/icon/style2/color7/style2_shopcar7.png"],
            color8: ["/Public/images/icon/style2/color8/icon_home.png", "/Public/images/icon/style2/color8/icon_allgoods.png", "/Public/images/icon/style2/color8/icon_newgoods.png", "/Public/images/icon/style2/color8/icon_user.png", "/Public/images/icon/style2/color8/icon_fx.png", "/Public/images/icon/style2/color8/icon_active.png", "/Public/images/icon/style2/color8/icon_hotsale.png", "/Public/images/icon/style2/color8/icon_subject.png", "/Public/images/icon/style2/color8/style2_gz8.png", "/Public/images/icon/style2/color8/style2_shopcar8.png"]
        },
        style3: {
            color0: ["/Public/images/icon/style3/color0/icon_home.png", "/Public/images/icon/style3/color0/icon_allgoods.png", "/Public/images/icon/style3/color0/icon_newgoods.png", "/Public/images/icon/style3/color0/icon_user.png", "/Public/images/icon/style3/color0/icon_fx.png", "/Public/images/icon/style3/color0/icon_active.png", "/Public/images/icon/style3/color0/icon_hotsale.png", "/Public/images/icon/style3/color0/icon_subject.png", "/Public/images/icon/style3/color0/style3_gz0.png", "/Public/images/icon/style3/color0/style3_shopcar0.png"],
            color1: ["/Public/images/icon/style3/color1/icon_home.png", "/Public/images/icon/style3/color1/icon_allgoods.png", "/Public/images/icon/style3/color1/icon_newgoods.png", "/Public/images/icon/style3/color1/icon_user.png", "/Public/images/icon/style3/color1/icon_fx.png", "/Public/images/icon/style3/color1/icon_active.png", "/Public/images/icon/style3/color1/icon_hotsale.png", "/Public/images/icon/style3/color1/icon_subject.png", "/Public/images/icon/style3/color1/style3_gz1.png", "/Public/images/icon/style3/color1/style3_shopcar1.png"],
            color2: ["/Public/images/icon/style3/color2/icon_home.png", "/Public/images/icon/style3/color2/icon_allgoods.png", "/Public/images/icon/style3/color2/icon_newgoods.png", "/Public/images/icon/style3/color2/icon_user.png", "/Public/images/icon/style3/color2/icon_fx.png", "/Public/images/icon/style3/color2/icon_active.png", "/Public/images/icon/style3/color2/icon_hotsale.png", "/Public/images/icon/style3/color2/icon_subject.png", "/Public/images/icon/style3/color2/style3_gz2.png", "/Public/images/icon/style3/color2/style3_shopcar2.png"],
            color3: ["/Public/images/icon/style3/color3/icon_home.png", "/Public/images/icon/style3/color3/icon_allgoods.png", "/Public/images/icon/style3/color3/icon_newgoods.png", "/Public/images/icon/style3/color3/icon_user.png", "/Public/images/icon/style3/color3/icon_fx.png", "/Public/images/icon/style3/color3/icon_active.png", "/Public/images/icon/style3/color3/icon_hotsale.png", "/Public/images/icon/style3/color3/icon_subject.png", "/Public/images/icon/style3/color3/style3_gz3.png", "/Public/images/icon/style3/color3/style3_shopcar3.png"],
            color4: ["/Public/images/icon/style3/color4/icon_home.png", "/Public/images/icon/style3/color4/icon_allgoods.png", "/Public/images/icon/style3/color4/icon_newgoods.png", "/Public/images/icon/style3/color4/icon_user.png", "/Public/images/icon/style3/color4/icon_fx.png", "/Public/images/icon/style3/color4/icon_active.png", "/Public/images/icon/style3/color4/icon_hotsale.png", "/Public/images/icon/style3/color4/icon_subject.png", "/Public/images/icon/style3/color4/style3_gz4.png", "/Public/images/icon/style3/color4/style3_shopcar4.png"],
            color5: ["/Public/images/icon/style3/color5/icon_home.png", "/Public/images/icon/style3/color5/icon_allgoods.png", "/Public/images/icon/style3/color5/icon_newgoods.png", "/Public/images/icon/style3/color5/icon_user.png", "/Public/images/icon/style3/color5/icon_fx.png", "/Public/images/icon/style3/color5/icon_active.png", "/Public/images/icon/style3/color5/icon_hotsale.png", "/Public/images/icon/style3/color5/icon_subject.png", "/Public/images/icon/style3/color5/style3_gz5.png", "/Public/images/icon/style3/color5/style3_shopcar5.png"],
            color6: ["/Public/images/icon/style3/color6/icon_home.png", "/Public/images/icon/style3/color6/icon_allgoods.png", "/Public/images/icon/style3/color6/icon_newgoods.png", "/Public/images/icon/style3/color6/icon_user.png", "/Public/images/icon/style3/color6/icon_fx.png", "/Public/images/icon/style3/color6/icon_active.png", "/Public/images/icon/style3/color6/icon_hotsale.png", "/Public/images/icon/style3/color6/icon_subject.png", "/Public/images/icon/style3/color6/style3_gz6.png", "/Public/images/icon/style3/color6/style3_shopcar6.png"],
            color7: ["/Public/images/icon/style3/color7/icon_home.png", "/Public/images/icon/style3/color7/icon_allgoods.png", "/Public/images/icon/style3/color7/icon_newgoods.png", "/Public/images/icon/style3/color7/icon_user.png", "/Public/images/icon/style3/color7/icon_fx.png", "/Public/images/icon/style3/color7/icon_active.png", "/Public/images/icon/style3/color7/icon_hotsale.png", "/Public/images/icon/style3/color7/icon_subject.png", "/Public/images/icon/style3/color7/style3_gz7.png", "/Public/images/icon/style3/color7/style3_shopcar7.png"],
            color8: ["/Public/images/icon/style3/color8/icon_home.png", "/Public/images/icon/style3/color8/icon_allgoods.png", "/Public/images/icon/style3/color8/icon_newgoods.png", "/Public/images/icon/style3/color8/icon_user.png", "/Public/images/icon/style3/color8/icon_fx.png", "/Public/images/icon/style3/color8/icon_active.png", "/Public/images/icon/style3/color8/icon_hotsale.png", "/Public/images/icon/style3/color8/icon_subject.png", "/Public/images/icon/style3/color8/style3_gz8.png", "/Public/images/icon/style3/color8/style3_shopcar8.png"]
        }
    }
}, HYD.urgencyPopup = function () {
    var e = $.cookie("urgencyPopup"), n = (new Date).getTime(), o = 36e5;
    if (e || (e = 0), console.log(e, o, n), 0 == e || parseInt(e) + o < n) {
        $.cookie("urgencyPopup", n, {expires: 30, path: "/"});
        var i = function (e) {
            $.jBox.show({
                title: "提示",
                content: "<p style='font-size:14px;'>" + e + "</p>",
                btnOK: {
                    onBtnClick: function (e) {
                        $.jBox.close(e)
                    }
                },
                btnCancel: {show: !1}
            })
        };
        $("#urgency-content").jBox({
            title: "紧急通知", onOpen: function (e) {
                e.addClass("jbox-urgencyPopup"), $chk = e.find(".j-urgency-checkbox"), $btn = e.find(".j-urgency-submit"), $btn.click(function () {
                    $chk.is(":checked") ? $.ajax({
                        url: "/Shop/apply_temporary_domain",
                        type: "get",
                        dataType: "json",
                        beforeSend: function () {
                            $.jBox.showloading()
                        },
                        success: function (n) {
                            $.jBox.hideloading(), 1 == n.status ? ($.jBox.close(e), HYD.hint("success", "恭喜您，临时域名申请成功！")) : HYD.hint("danger", "对不起，" + n.msg)
                        }
                    }) : i("请先注册域名并提交备案信息!")
                })
            }, btnOK: {show: !1}, btnCancel: {show: !1}
        })
    }
}, $(function () {
    top.location != self.location && (top.location.href = self.location.href), $(".header-ctrl-item").hover(function () {
        var e = $(this);
        e.data("type"), e.data("cache");
        e.find(".header-ctrl-item-children").length && e.addClass("show")
    }, function () {
        $(this).removeClass("show")
    }), $(".tips").tooltips();
    var e = $(".container .inner");
    if (e.length) {
        var n = function () {
            HYD.Constant.windowHeight = $(this).height(), HYD.Constant.windowWidth = $(this).width(), HYD.Constant.containerOffset = e.offset(), HYD.Constant.containerWidth = e.outerWidth()
        }, o = function () {
            $("#j-gotop").css("left", HYD.Constant.containerWidth + HYD.Constant.containerOffset.left + 10)
        };
        $(window).resize(function () {
            n(), o()
        }), n(), o()
    }
    $(window).scroll(function () {
        $(this).scrollTop() >= 150 ? $("#j-gotop").fadeIn(300) : $("#j-gotop").fadeOut(300)
    }), $.ajaxSetup({
        timeout: 2e4, error: function (e, n, o) {
            "timeout" == n && (HYD && HYD.hint ? HYD.hint("warning", "请求超时，请重试！") : alert("请求超时，请重试！"), $.jBox.hideloading())
        }
    }), function () {
        var e = function () {
            $.jBox.show({
                title: "温馨提示",
                width: 520,
                content: $("#tpl_jbox_domain_tip").html(),
                btnOK: {show: !1},
                btnCancel: {show: !1},
                onOpen: function () {
                },
                onClosed: function () {
                }
            })
        };
        window.is_domain_tip && e()
    }(), $(".js-save-btn").click(function () {
        HYD.hint("success", "恭喜，保存成功！")
    }), $(".content-left .left-menu dt").toggle(function () {
        $(this).siblings("dd").hide()
    }, function () {
        $(this).siblings("dd").show()
    }), $(".member_down_box .user_privs_link").mouseenter(function () {
        $(this).prev().find("a").css("border-bottom-color", "#fff")
    }).mouseleave(function () {
        $(this).prev().find("a").css("border-bottom-color", "#f2f2f2")
    }), function () {
        var e = $(".content-left");
        $("#j-btn-leftMenuFold").click(function () {
            e.is(":visible") ? (e.hide(), $(this).addClass("hideStatus")) : (e.show(), $(this).removeClass("hideStatus"))
        })
    }()
}), $(function () {
    var e = $(".wxtables").find("input[type='checkbox'].table-ckbs");
    $(".btn_table_selectAll").click(function () {
        e.attr("checked", !0)
    }), $(".btn_table_Cancle").click(function () {
        e.attr("checked", !1)
    }), $(".paginate").each(function () {
        var e = $(this), n = e.find("input"), o = e.find(".goto"), i = window.location.href.toString();
        i = i.replace(/.html/g, ""), n.focus(function () {
            $(this).addClass("focus").siblings(".goto").addClass("focus")
        }), n.blur(function () {
            "" == $(this).val() && $(this).removeClass("focus").siblings(".goto").removeClass("focus")
        }), n.keypress(function (e) {
            var n = window.event ? e.keyCode : e.which;
            return 13 == n && (window.location.href = $(this).siblings("a.goto").attr("href")), 8 == n || 46 == n || 37 == n || 39 == n || !(n < 48 || n > 57)
        }), n.keyup(function (e) {
            var n = $(this).val(), t = i.split("/"), c = t.length, a = !1, s = !1;
            "" == t[c - 1] && (t.pop(), c = t.length, a = !0), (a || "p" != t[c - 2]) && (t.push("p"), c = t.length, s = !0), a || s ? t[c] = n + ".html" : t[c - 1] = n + ".html", o.attr("href", t.join("/"))
        })
    })
}), $(function () {
    $(document).on("click", ".tabs .tabs_a", function () {
        var e = $(this), n = e.data("origin"), o = 0;
        e.parent().hasClass("wizardstep") || e.parent().hasClass("nochange") || (e.addClass("active").siblings(".tabs_a").removeClass("active"), e.data("index") ? (o = e.data("index"), $(".tabs-content[data-origin='" + n + "']").find(".tc[data-index='" + o + "']").removeClass("hide").siblings(".tc").addClass("hide")) : (o = e.index(), $(".tabs-content[data-origin='" + n + "']").find(".tc:eq(" + o + ")").removeClass("hide").siblings(".tc").addClass("hide")))
    })
}), $(function () {
    $(".alert.disable-del").each(function () {
        var e = $('<a href="javascript:;" class="alert-delete" title="隐藏"><i class="gicon-remove"></i></a>');
        e.click(function () {
            $(this).parent(".alert").fadeOut()
        }), $(this).append(e)
    }), _QV_ = "%E6%9D%AD%E5%B7%9E%E5%90%AF%E5%8D%9A%E7%A7%91%E6%8A%80%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8%E7%89%88%E6%9D%83%E6%89%80%E6%9C%89"
}), function (e, n, o) {
    var i = {trigger: "hover"};
    e.fn.tooltips = function () {
        return this.each(function () {
            var n = function () {
                var n = e(this), o = n.data("content"), i = n.offset(),
                    t = {width: n.outerWidth(!0), height: n.outerHeight(!0)}, c = n.data("placement");
                if (this.tip = null, o = void 0 == o || "" == o ? o = n.text() : o, null == this.$tip) {
                    var a = e("#tpl_tooltips").html();
                    if (void 0 == a || "" == a) return void console.log("Please check template!");
                    var s = _.template(a, {content: o, placement: c});
                    this.$tip = e(s), e("body").append(this.$tip);
                    var l = 0, r = 0, d = this.$tip.outerWidth(!0), u = this.$tip.outerHeight(!0);
                    switch (c) {
                        case"top":
                            l = i.top + t.height + 5, r = i.left - 5;
                            break;
                        case"bottom":
                            l = i.top - u - 5, r = i.left - 5;
                            break;
                        case"left":
                            l = i.top - t.height / 2, r = i.left + t.width + 5;
                            break;
                        case"right":
                            l = i.top + t.height / 2 - u / 2, r = i.left - d - 5
                    }
                    this.$tip.css({top: l, left: r})
                }
                this.$tip.stop(!0, !0).fadeIn(300)
            }, o = function () {
                this.$tip && this.$tip.stop(!0, !0).fadeOut(300)
            }, t = e(this).data("trigger");
            switch (t = void 0 != t && "" != t ? t : i.trigger) {
                case"hover":
                    e(this).hover(n, o);
                    break;
                case"click":
                    e(this).click(n).mouseleave(o)
            }
        })
    }
}(jQuery, document, window), $(function () {
    $(document).on("mouseover", ".droplist .j-droplist-toggle", function () {
        $(this).siblings(".droplist-menu").show()
    }), $(document).on("mouseleave", ".droplist .droplist-menu", function () {
        $(this).hide()
    }), $(document).on("mouseleave", ".droplist", function () {
        $(this).find(".droplist-menu").hide()
    }), $(document).on("click", ".droplist .droplist-menu a", function () {
        $(this).parents(".droplist-menu").hide()
    })
}), function (e, n, o) {
    var i = {callback: null}, t = {}, c = {width: e(o).width(), height: e(o).height()}, a = {
        main: e("#tpl_albums_main").html(),
        overlay: e("#tpl_albums_overlay").html(),
        tree: e("#tpl_albums_tree").html(),
        treeFn: e("#tpl_albums_tree_fn").html(),
        imgs: e("#tpl_albums_imgs").html()
    }, s = {folderID: "", moveFolderID: 0, imgs: {}}, l = {
        getFolderTree: "/Design/getFolderTree",
        getSubFolderTree: "/Design/getSubFolderTree",
        getImgList: "/Design/getImgList",
        addImg: "/Design/uploadFile/sid/" + e.cookie("shop_id"),
        moveImg: "/Design/moveImg",
        delImg: "/Design/delImg",
        addFolder: "/Design/addFolder",
        renameFolder: "/Design/renameFolder",
        delFolder: "/Design/delFolder",
        moveCateImg: "/Design/moveCateImg",
        renameImg: "/Design/renameImg"
    }, r = function (n, o, i, t) {
        var c = arguments.callee, r = n.find("#j-panelImgs"), d = n.find("#j-panelPaginate"),
            u = o >= 0 ? {id: o, p: i, file_name: t} : {p: i, file_name: t};
        "undefined" == typeof GLOBAL_NEED_COMPRESS || 0 == GLOBAL_NEED_COMPRESS ? u.need_compress = 0 : u.need_compress = 1, e.ajax({
            url: l.getImgList + "?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: u,
            beforeSend: function () {
                r.find(".j-loading").show()
            },
            success: function (i) {
                if (1 == i.status) {
                    s.imgs = _.isArray(i.data) ? i.data : null;
                    var l = e(_.template(a.imgs, {dataset: s.imgs})), u = e(i.page);
                    r.find(".j-loading").hide().end().find("ul,.j-noPic").remove().end().append(l), d.empty().append(u), u.filter("a:not(.disabled,.cur)").click(function () {
                        var i = e(this).attr("href"), a = i.split("/");
                        return a = a[a.length - 1], a = a.replace(/.html/, ""), c(n, o, a, t), !1
                    })
                } else HYD.hint("danger", "对不起，图片获取失败：" + i.msg)
            }
        })
    };
    UpdateSubTreeNums = function (o) {
        if ("undefined" == typeof o) var o = e(n).find(".j-albumsNodes .selected").data("id");
        e.ajax({
            url: "/Design/getAllSubFolderTree?v=" + Math.round(100 * Math.random()),
            type: "post",
            dataType: "json",
            data: {id: o},
            success: function (o) {
                if (1 == o.status) {
                    var i = o.data.tree, t = e(n).find("#j-panelTree");
                    i.push({id: "-1", picNum: o.data.total}, {id: "0", picNum: o.data.nocat_total});
                    var c = function (e) {
                        var n = arguments.callee;
                        _.each(e, function (e) {
                            t.find("dt[data-id=" + e.id + "]").find(".j-num").text(e.picNum), e.subFolder && e.subFolder.length && n(e.subFolder)
                        })
                    };
                    c(i)
                } else console.log("更新文件夹树图片数量失败")
            }
        })
    }, e.albums = function (o) {
        t = e.extend(!0, {}, i, o);
        var d = e("#albums"), u = e("#albums-overlay");
        if (!d.length) {
            d = e(a.main), u = e(a.overlay), e("body").append(d.hide(), u.hide());
            var g = d.find("#j-close"), p = d.find("#j-addFolder"), m = d.find("#j-renameFolder"),
                f = d.find("#j-delFolder"), h = d.find("#j-addImg"), b = d.find("#j-moveImg"), y = d.find("#j-cateImg"),
                v = d.find("#j-delImg"), $ = d.find("#j-panelTree"), P = function () {
                    d.fadeOut("fast"), u.fadeOut("fast"), d.find("#j-panelImgs li").removeClass("selected")
                };
            e.ajax({
                url: l.getFolderTree + "?v=" + Math.round(100 * Math.random()),
                type: "post",
                dataType: "json",
                success: function (n) {
                    if (1 == n.status) {
                        var o = _.template(a.treeFn), i = o({dataset: n.data.tree, templateFn: o}),
                            t = e(_.template(a.tree, {dataset: n.data, nodes: i}));
                        $.empty().append(t), d.find(".j-albumsNodes > dt:first").click()
                    } else HYD.hint("danger", "对不起，文件夹获取失败：" + n.msg)
                }
            }), e(n).on("click", ".j-albumsNodes dt", function (n) {
                var o = e(this), i = o.data("id");
                if (o.parents(".j-albumsNodes").find("dt").removeClass("selected"), o.addClass("selected"), e(n.currentTarget).parents(".j-propagation").length) s.moveFolderID = i; else {
                    if (s.folderID == i) return;
                    s.folderID = i;
                    var t = o.data("add"), c = o.data("rename"), a = o.data("del");
                    1 == t ? p.show() : p.hide(), 1 == c ? m.show() : m.hide(), 1 == a ? f.show() : f.hide(), r(d, s.folderID, 1)
                }
                return !1
            });
            var j = function (n, o) {
                e.ajax({
                    url: l.getSubFolderTree + "?v=" + Math.round(100 * Math.random()),
                    type: "post",
                    dataType: "json",
                    data: {id: o},
                    success: function (o) {
                        if (1 == o.status) {
                            var i = _.template(a.treeFn), t = i({dataset: o.data, templateFn: i});
                            $render = e(t), n.parent("dt").siblings("dd").empty().append($render), $render.filter("dl").slideDown(200)
                        }
                    }
                })
            };
            e(n).on("click", ".j-albumsNodes dt i", function () {
                var n = e(this), o = n.parent("dt").siblings("dd").find(" > dl"), i = o.length,
                    t = n.parent("dt").data("id");
                return n.hasClass("open") ? (n.removeClass("open"), o.slideUp(200)) : (n.addClass("open"), i ? o.slideDown(200) : j(n, t)), !1
            });
            var x = 0;
            d.on("click", "#j-panelImgs li", function () {
                return e(this).toggleClass("selected"), e(this).find(".img-name-edit").hide(), e(this).data("selectindex", x++), !1
            }), d.on("click", "#j-panelImgs li .albums-edit", function () {
                return e(this).children(".img-name-edit").show(), !1
            }), d.on("click", "#j-useImg", function () {
                if (!d.find("#j-panelImgs li.selected").length) return void HYD.hint("warning", "请选择图片！");
                var n = {}, o = [];
                d.find("#j-panelImgs li.selected").each(function () {
                    n[e(this).data("selectindex")] = s.imgs[e(this).index()].file
                });
                for (var i in n) o.push(n[i]);
                return t.callback && (t.callback(o), P()), !1
            }), p.click(function () {
                var n = [{id: 0, name: "未命名文件夹", picNum: 0}];
                e.ajax({
                    url: l.addFolder + "?v=" + Math.round(100 * Math.random()),
                    type: "post",
                    dataType: "json",
                    data: {name: n.name, parent_id: s.folderID},
                    success: function (o) {
                        if (1 == o.status) {
                            n[0].id = o.data;
                            var i = _.template(a.treeFn, {dataset: n});
                            $render = e(i), $.find("dt[data-id='" + s.folderID + "']").siblings("dd").append($render), $render.css("display", "block"), $render.parent().siblings("dt").find(".icon-folder").addClass("open"), $render.find("dt:first").click(), m.click()
                        } else HYD.hint("danger", "对不起，添加失败：" + o.msg)
                    }
                })
            }), m.click(function () {
                var n = $.find("dt[data-id='" + s.folderID + "']"), o = n.find(".j-treeShowTxt"), i = n.find(".j-ip"),
                    t = n.find(".j-loading");
                o.hide(), i.show().focus().select(), i.blur(function () {
                    var n = e(this).val();
                    e.ajax({
                        url: l.renameFolder + "?v=" + Math.round(100 * Math.random()),
                        type: "post",
                        dataType: "json",
                        data: {name: n, category_img_id: s.folderID},
                        beforeSend: function () {
                            t.css("display", "inline-block")
                        },
                        success: function (e) {
                            1 == e.status ? o.find(".j-name").text(n) : HYD.hint("danger", "对不起，重命名失败：" + e.msg), o.show(), i.hide(), t.hide()
                        }
                    })
                })
            }), f.click(function () {
                var n = e("#tpl_albums_delFolder").html(), o = e(n), i = o.find("input[name=isDelImgs]");
                e.jBox.show({
                    title: "提示", content: o, btnOK: {
                        onBtnClick: function (n) {
                            var o = i.filter(":checked").val();
                            e.ajax({
                                url: l.delFolder + "?v=" + Math.round(100 * Math.random()),
                                type: "post",
                                dataType: "json",
                                data: {type: o, id: s.folderID},
                                success: function (e) {
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
            }), v.click(function () {
                if (!d.find("#j-panelImgs li.selected").length) return void HYD.hint("warning", "请选择要删除的图片！");
                var n = [];
                d.find("#j-panelImgs li.selected").each(function () {
                    n.push(e(this).data("id"))
                }), e.ajax({
                    url: l.delImg + "?v=" + Math.round(100 * Math.random()),
                    type: "post",
                    dataType: "json",
                    data: {file_id: n},
                    success: function (n) {
                        1 == n.status ? (d.find("#j-panelImgs li.selected").fadeOut(300, function () {
                            e(this).remove()
                        }), UpdateSubTreeNums()) : HYD.hint("danger", "对不起，删除失败：" + n.msg)
                    }
                })
            }), function () {
                var n = navigator.userAgent.toLowerCase(), o = "ipad" == n.match(/ipad/i),
                    i = "iphone os" == n.match(/iphone os/i), t = "midp" == n.match(/midp/i),
                    c = "rv:1.2.3.4" == n.match(/rv:1.2.3.4/i), a = "ucweb" == n.match(/ucweb/i),
                    u = "android" == n.match(/android/i), g = "windows ce" == n.match(/windows ce/i),
                    p = "windows mobile" == n.match(/windows mobile/i);
                o || i || t || c || a || u || g || p ? (e("#j-addImg").parent("#addImg_load").addClass("btn btn-success").children(".addImg_load_text").text("上传图片"), e("#j-addImg").change(function () {
                    var n = e(this), o = n.get(0).files[0], i = ((new Date).getTime(), 5242880);
                    if (o.size > i) return void alert("上传的图片不得大于5MB");
                    var t = new XMLHttpRequest, c = new FormData;
                    t.open("POST", l.addImg, !0), e.jBox.showloading("正在上传..."), t.onreadystatechange = function () {
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
                    onUploadStart: function () {
                        h.uploadify("settings", "formData", {
                            cate_id: s.folderID == -1 ? 0 : s.folderID,
                            PHPSESSID: e.cookie("PHPSESSID")
                        })
                    },
                    onSelectError: function (e, n, o) {
                        switch (n) {
                            case-100:
                                HYD.hint("danger", "对不起，系统只允许您一次最多上传10个文件");
                                break;
                            case-110:
                                HYD.hint("danger", "对不起，文件 [" + e.name + "] 大小超出5MB！");
                                break;
                            case-120:
                                HYD.hint("danger", "文件 [" + e.name + "] 大小异常！");
                                break;
                            case-130:
                                HYD.hint("danger", "文件 [" + e.name + "] 类型不正确！")
                        }
                    },
                    onFallback: function () {
                        HYD.hint("danger", "您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。")
                    },
                    onUploadSuccess: function (e, n, o) {
                        console.log(e, n, o)
                    },
                    onQueueComplete: function (e) {
                        r(d, s.folderID, 1), UpdateSubTreeNums()
                    },
                    onUploadError: function (e, n, o, i) {
                        HYD.hint("danger", "对不起：" + e.name + "上传失败：" + i)
                    }
                })
            }(), b.click(function () {
                if (!d.find("#j-panelImgs li.selected").length) return void HYD.hint("warning", "请选择要移动的图片！");
                var n = e("<div class='albums-cl-tree j-albumsNodes j-propagation'></div>");
                n.append($.find("dd:first").contents().clone()), e.jBox.show({
                    title: "请选择移动文件夹",
                    content: n,
                    onOpen: function () {
                        n.find("dt:first").click()
                    },
                    btnOK: {
                        onBtnClick: function (n) {
                            var o = [];
                            d.find("#j-panelImgs li.selected").each(function () {
                                o.push(e(this).data("id"))
                            }), e.ajax({
                                url: l.moveImg + "?v=" + Math.round(100 * Math.random()),
                                type: "post",
                                dataType: "json",
                                data: {file_id: o, cate_id: s.moveFolderID},
                                success: function (o) {
                                    if (1 == o.status) {
                                        var i = e(n).find(".j-albumsNodes .selected").data("id");
                                        d.find("#j-panelImgs li.selected").fadeOut(300, function () {
                                            e(this).remove()
                                        }), UpdateSubTreeNums(), UpdateSubTreeNums(i), HYD.hint("success", "恭喜您，操作成功！")
                                    } else HYD.hint("danger", "对不起，移动失败：" + o.msg)
                                }
                            }), e.jBox.close(n)
                        }
                    }
                })
            }), y.click(function () {
                if (!s.folderID) return void HYD.hint("warning", "请选择要移动的分类！");
                var n = e("<div class='albums-cl-tree j-albumsNodes j-propagation'></div>");
                n.append($.find("dd:first").contents().clone()), e.jBox.show({
                    title: "请选择移动文件夹",
                    content: n,
                    onOpen: function () {
                        n.find("dt:first").click()
                    },
                    btnOK: {
                        onBtnClick: function (n) {
                            e.ajax({
                                url: l.moveCateImg + "?v=" + Math.round(100 * Math.random()),
                                type: "post",
                                dataType: "json",
                                data: {cid: s.folderID, cate_id: s.moveFolderID},
                                success: function (o) {
                                    if (1 == o.status) {
                                        var i = e(n).find(".j-albumsNodes .selected").data("id");
                                        d.find("#j-panelImgs li.selected").fadeOut(300, function () {
                                            e(this).remove()
                                        }), UpdateSubTreeNums(), UpdateSubTreeNums(i), HYD.hint("success", "恭喜您，操作成功！")
                                    } else HYD.hint("danger", "对不起，移动失败：" + o.msg)
                                }
                            }), e.jBox.close(n)
                        }
                    }
                })
            }), g.click(P)
        }
        d.appendTo("body").fadeIn("fast"), u.appendTo("body").fadeIn("fast"), d.outerHeight() >= c.height && d.css({
            position: "absolute",
            marginTop: "0",
            top: e(n).scrollTop() + 10
        }), d.on("click", ".renameImg", function () {
            var n = e(this), o = n.closest("li").data("id"), i = n.siblings("input.file_name").val();
            return e.ajax({
                url: l.renameImg + "?v=" + Math.round(100 * Math.random()),
                type: "post",
                dataType: "json",
                data: {file_id: o, file_name: i},
                success: function (e) {
                    1 == e.status ? (n.closest(".albums-edit").children(".img-name-edit").hide(), n.closest(".albums-edit").children("p").html(i), n.closest(".albums-edit").children("input.file_name").val(i), HYD.hint("success", "恭喜您，操作成功！")) : HYD.hint("danger", "对不起，操作失败")
                }
            }), !1
        }), d.on("click", ".searchImg", function () {
            var n = e(this).prev().val();
            r(d, s.folderID, 1, n)
        })
    }
}(jQuery, document, window), _QV_ = "%E6%9D%AD%E5%B7%9E%E5%90%AF%E5%8D%9A%E7%A7%91%E6%8A%80%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8%E7%89%88%E6%9D%83%E6%89%80%E6%9C%89", HYD.popbox.ImgPicker = function (e) {
    $.albums({callback: e})
}, $(function () {
    var e = '<span class="autosave-loading"></span>',
        n = '<span class="save-success"><em class="gicon-ok white"></em>已自动保存</span>',
        o = "undefined" != typeof URL_virChkb && URL_virChkb.length ? URL_virChkb : window.location.href;
    $(".j-vir-chkb").each(function () {
        var e = $(this), n = e.find(".vir-chkb-actions"), i = e.find(".vir-chkb-enable"),
            t = e.find(".vir-chkb-disable"), c = e.find(".j-vir-checkbox"), a = !!c.is(":checked");
        a ? (n.removeClass("disable").addClass("enable"), i.show(), t.hide()) : (n.removeClass("enable").addClass("disable"), i.hide(), t.show()), c.change(function () {
            var e, n = $(this), i = n.attr("name"), t = {};
            e = "undefined" == typeof n.data("enableval") ? n.is(":checked") ? 1 : 0 : n.is(":checked") ? n.data("enableval") : n.data("disableval"), t.name = i, t.value = e;
            var c = n.siblings(".j-vir-formdata");
            c.each(function () {
                var e = $(this);
                t[e.data("name")] = e.val()
            }), $.ajax({
                url: o + "?v=" + Math.round(100 * Math.random()),
                type: "POST",
                dataType: "json",
                data: t,
                success: function (e) {
                    1 != e.status && HYD.hint("danger", "对不起，保存失败：" + e.msg)
                }
            })
        }), n.show().click(function () {
            a ? (t.show(), n.animate({left: -66}, 150, function () {
                i.hide()
            }), c.attr("checked", !1), a = !1) : (i.show(), n.animate({left: 0}, 150, function () {
                t.hide()
            }), c.attr("checked", !0), a = !0), c.trigger("change")
        })
    }), $(".j-text-autosave,.j-select-autosave").change(function () {
        var i = $(this), t = i.attr("name"), c = i.val(), a = $(e), s = i.get(0).nextSibling, l = s ? $(s) : i;
        $.ajax({
            url: o + "?v=" + Math.round(100 * Math.random()),
            type: "POST",
            dataType: "json",
            data: {name: t, value: c},
            beforeSend: function () {
                a.insertAfter(l)
            },
            success: function (e) {
                a.fadeOut("fast", function () {
                    if ($(this).remove(), 1 == e.status) {
                        var o = $(n);
                        o.insertAfter(l).animate({opacity: 1}, 200, function () {
                            setTimeout(function () {
                                o.fadeOut("fast", function () {
                                    o.remove()
                                })
                            }, 1e3)
                        })
                    } else HYD.hint("danger", "对不起，保存失败：" + e.msg)
                })
            }
        })
    }), $(".j-radio-autosave").change(function () {
        var i = $(this), t = i.parents(".form-controls").find(".j-autosavePanel"), c = i.attr("type"),
            a = i.attr("name"), s = i.val();
        if ("radio" == c) {
            var l = $(e);
            $.ajax({
                url: o + "?v=" + Math.round(100 * Math.random()),
                type: "POST",
                dataType: "json",
                data: {name: a, value: s},
                beforeSend: function () {
                    t.append(l)
                },
                success: function (e) {
                    l.fadeOut("fast", function () {
                        if ($(this).remove(), 1 == e.status) {
                            var o = $(n);
                            t.append(o), o.animate({opacity: 1}, 200, function () {
                                setTimeout(function () {
                                    o.fadeOut("fast", function () {
                                        o.remove(), location.reload()
                                    })
                                }, 200)
                            })
                        } else HYD.hint("danger", "对不起，保存失败：" + e.msg)
                    })
                }
            })
        }
    });
    var i = {};
    $(".j-checkbox-autosave").each(function () {
        var t = $(this), c = t.parents(".form-controls").find(".j-autosavePanel"), a = (t.attr("type"), t.attr("name")),
            s = function () {
                var i = [];
                $("input[name='" + a + "']").each(function () {
                    $(this).is(":checked") && i.push($(this).val())
                });
                var t = $(e);
                $.ajax({
                    url: o + "?v=" + Math.round(100 * Math.random()),
                    type: "POST",
                    dataType: "json",
                    data: {name: a, value: i},
                    beforeSend: function () {
                        c.append(t)
                    },
                    success: function (e) {
                        t.fadeOut("fast", function () {
                            if ($(this).remove(), 1 == e.status) {
                                var o = $(n);
                                c.append(o), o.animate({opacity: 1}, 200, function () {
                                    setTimeout(function () {
                                        o.fadeOut("fast", function () {
                                            o.remove()
                                        })
                                    }, 1e3)
                                })
                            } else HYD.hint("danger", "对不起，保存失败：" + e.msg)
                        })
                    }
                })
            };
        i[a] = null, t.change(function () {
            i[a] && clearTimeout(i[a]), i[a] = setTimeout(s, 800)
        })
    });
    var t = /^[\u4E00-\u9FA5]{0,}$/;
    $(".j-text-autosave-judge").change(function () {
        var i = $(this), c = i.attr("name"), a = i.val(), s = (i.attr("placeholder"), $(e)), l = i.get(0).nextSibling,
            r = l ? $(l) : i;
        a ? t.test(a) ? $.ajax({
            url: o + "?v=" + Math.round(100 * Math.random()),
            type: "POST",
            dataType: "json",
            data: {name: c, value: a},
            beforeSend: function () {
                s.insertAfter(r)
            },
            success: function (e) {
                s.fadeOut("fast", function () {
                    if ($(this).remove(), 1 == e.status) {
                        var o = $(n);
                        o.insertAfter(r).animate({opacity: 1}, 200, function () {
                            setTimeout(function () {
                                o.fadeOut("fast", function () {
                                    o.remove()
                                })
                            }, 1e3)
                        })
                    } else HYD.hint("danger", "对不起，保存失败：" + e.msg)
                })
            }
        }) : (HYD.hint("danger", "对不起，保存失败：只能输入文字!"), window.location.reload()) : (HYD.hint("danger", "对不起，保存失败：输入项不能为空!"), window.location.reload())
    });
    var c = /^([1-9]\d*|[0]{1,1})$/;
    $(".j-text-autosave-judge2").change(function () {
        var i = !0, t = $(this), a = t.attr("name"), s = t.val(), l = (t.attr("placeholder"), $(e)),
            r = t.get(0).nextSibling, d = r ? $(r) : t;
        return "" == s || c.test(s) ? void(i && $.ajax({
            url: o + "?v=" + Math.round(100 * Math.random()),
            type: "POST",
            dataType: "json",
            data: {name: a, value: s},
            beforeSend: function () {
                l.insertAfter(d)
            },
            success: function (e) {
                l.fadeOut("fast", function () {
                    if ($(this).remove(), 1 == e.status) {
                        var o = $(n);
                        o.insertAfter(d).animate({opacity: 1}, 200, function () {
                            setTimeout(function () {
                                o.fadeOut("fast", function () {
                                    o.remove()
                                })
                            }, 1e3)
                        })
                    } else HYD.hint("danger", "对不起，保存失败：" + e.msg)
                })
            }
        })) : (HYD.hint("danger", "只能设置0或者正整数!"), i = !1, !1)
    })
}), $(function () {
    var e = $(".fixedBar").width();
    $(".fixedBar").height();
    $(".fixedBar").css({right: -e}), $("#j-fixedBar-btn").click(function () {
        $(".fixedBar").hasClass("show") ? $(".fixedBar").animate({right: -e}, "fast").removeClass("show") : $(".fixedBar").animate({right: 5}, "fast").addClass("show")
    }), $(".fixedBar>ul>li").click(function (e) {
        $(this).addClass("cur").siblings("li").removeClass("cur")
    }), $(".fixedBar>ul>li").eq(0).addClass("cur");
    var n = $(".fixedBar>ul").children("li").length;
    if (0 == n) $(".fixedBar").hide(); else {
        var o = $(".left-menu"), i = {};
        i.array_id = [], i.array_height = [], o.each(function (e, n) {
            var o = $(this), t = $(this).children("dt").children("span"), c = t.data("id"), a = o.offset().top,
                s = o.outerHeight(!0), l = parseInt(a) + parseInt(s);
            i.array_id.push(c), i.array_height.push(l)
        });
        for (var t = 0; t < i.array_height.length; t++) {
            i.array_height[t];
            $(window).scroll(function () {
                $(window).scrollTop()
            })
        }
        $(window).scroll(function (e) {
            for (var n = $(window).scrollTop(), o = 0; o < i.array_height.length; o++) {
                var t = i.array_height[o];
                if (0 == o) n < t && $(".shopManager" + i.array_id[o]).addClass("cur").siblings("li").removeClass("cur"); else {
                    var c = i.array_height[o - 1];
                    n > c && n < t && $(".shopManager" + i.array_id[o]).addClass("cur").siblings("li").removeClass("cur")
                }
            }
        })
    }
    $(".fixedBar>ul>li>a").click(function (e) {
        var n = $(this), o = n.data("target"), i = $(o).offset().top;
        $.browser.chrome ? elem = "body" : elem = document.documentElement || document.body, $(elem).animate({scrollTop: i}, 600)
    }), $("#j-showfixedBar").click(function () {
        $(this).fadeOut("fast"), $(".fixedBar").fadeIn("fast")
    })
});