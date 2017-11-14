require.config({
    baseUrl:"/public/js",
    paths:{
        "jquery":"dist/jquery.min",
        "jquery10":"dist/jquery/jquery_1.10.2",
        "jquery20":"dist/jquery/jquery_2.2.4",
        "css":"dist/css.min",
        "underscore":"dist/underscore-min",
        "layer":"dist/layer/layer",
        "iconpicker":"dist/iconpicker/bootstrap-iconpicker",
        "util":"util",
    },
    shim:{
        "layer":{
            "deps":['css!dist/layer/layer.css']
        },
        "iconpicker":{
            "deps":['css!dist/bootstrap/css/bootstrap_diy.css','css!dist/iconpicker/bootstrap-iconpicker.css','jquery20',"dist/bootstrap/js/bootstrap","dist/iconpicker/bootstrap-iconpicker-iconset-all"],

        }
    }
});






