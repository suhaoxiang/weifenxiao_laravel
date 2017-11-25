require.config({
    baseUrl:"/public/js",
    paths:{
        "jquery":"dist/jquery.min",
        "jquery10":"dist/jquery/jquery_1.10.2",
        "jquery20":"dist/jquery/jquery_2.2.4",
        "css":"dist/css.min",
        "text":"dist/text",
        "underscore":"dist/underscore-min",
        "layer":"dist/layer/layer",
        "iconpicker":"dist/iconpicker/bootstrap-iconpicker",
        "uploadify":"dist/uploadify/jquery.uploadify.min",
        "util":"util",
        "cookie":"dist/jquery.cookie",
        "imagePicker":"dist/image-picker",
        "jbox":"dist/jbox/jBox",
    },
    shim:{
        "layer":{
            "deps":['css!dist/layer/layer.css']
        },
        "iconpicker":{
            "deps":['jquery','css!dist/bootstrap/css/bootstrap_diy.css','css!dist/iconpicker/bootstrap-iconpicker.css',"dist/bootstrap/js/bootstrap","dist/iconpicker/bootstrap-iconpicker-iconset-all"],

        },
        "uploadify":{
            "deps":["jquery","cookie","css!dist/uploadify/uploadify.css"]
        },
        "jbox":{
            "deps":['jquery','css!dist/jbox/jBox.css']
        }
    }
});
//为了防止jquery加载不成功,造成某些插件无法使用
require(['jquery'],function($){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});





