<script type="text/j-template" id="tpl_albums_main">
    <div id="albums">
        <div class="albums-title clearfix">
            <span class="fl">我的图库</span>
            <a href="javascript:;" class="fr" id="j-close" title="关闭"><i class="gicon-remove"></i></a>
        </div>
        <div class="albums-container clearfix">
            <div class="albums-cl fl">
                <div class="albums-cl-actions">
                    <a href="javascript:;" id="j-addFolder"><i class="gicon-plus"></i><span>添加</span></a>
                    <a href="javascript:;" id="j-renameFolder"><i class="gicon-pencil"></i><span>重命名</span></a>
                    <a href="javascript:;" id="j-delFolder"><i class="gicon-trash"></i><span>删除</span></a>
                </div>
                <div class="albums-cl-tree" id="j-panelTree">
                    <p class="txtCenter pdt10 loading j-loading"><i class="icon-loading"></i></p>
                </div>
            </div>
            <div class="albums-cr fl">
                <div class="albums-cr-actions">
                    <a href="javascript:;" id="addImg_load" style="position:relitive;"><span class="addImg_load_text"></span><input type="file" name="imgpicker_upload_input" id="j-addImg" style="opacity: 0;width:100%;position:absolute;top:5px;left:0;"></a>
                    <a href="javascript:;" id="j-moveImg" class="btn btn-primary mgl10">移动图片到</a>
                    <a href="javascript:;" id="j-delImg" class="btn btn-danger mgl5">删除所选图片</a>
                    <input type="text" placeholder="请输入图片名称" style="width: 210px;padding:6px;vertical-align: 0;border-radius: 2px;border: 1px solid #ccc;"><a href="javascript:;" class="btn btn-primary mgl10 searchImg">搜索</a>
                </div>
                <div class="albums-cr-imgs" id="j-panelImgs">
                    <p class="txtCenter pdt10 loading j-loading"><i class="icon-loading"></i></p>
                </div>
                <div class="albums-cr-ctrls clearfix">
                    <a href="javascript:;" id="j-useImg" class="btn btn-primary fl">使用选中的图片</a>
                    <div class="paginate fr" id="j-panelPaginate"></div>
                </div>
            </div>
        </div>
    </div>
</script>