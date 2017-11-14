require.config({
    baseUrl:"/public/js",
    paths:{
        "jquery":"dist/jquery.min",
        "css":"dist/css.min",
        "underscore":"dist/underscore-min",
        "layer":"dist/layer/layer",
        "util":"util",
    },
    shim:{
        "layer":{
            "deps":['css!dist/layer/layer.css']
        }
    }
});






