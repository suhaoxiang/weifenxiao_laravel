define(['jquery','underscore'],function($,_){
    return {
        alert:function(e,n,o){
            require(['text!tpl/alert.tpl'],function(alert){
                var t = _.template($(alert).html(), { type:e, content: n }),
                    c=$(t),
                    a = 200,
                    o = o || 1500;
                $("body").append(c.css({ opacity: "0", zIndex: "999999" })), c.animate({ opacity: 1, top: 200 }, a, function() { setTimeout(function() { c.animate({ opacity: 0, top: 600 }, a, function() { $(this).remove() }) }, o) })
            })
        }
    };
});