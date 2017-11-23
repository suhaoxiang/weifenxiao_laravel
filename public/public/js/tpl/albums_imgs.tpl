<script type="text/j-template" id="tpl_albums_imgs">
    <%if(dataset){%>
    <ul class="clearfix">

    <% _.each(dataset,function(item,index){ %>
    <li class="fl" data-id="<%=item.id%>">
    <img src="<%=item.file%>">
    <div class="albums-cr-imgs-selected"><i></i></div>
    <div class="albums-edit">
    <span><i class="gicon-pencil edit-img-name"></span></i>
    <p><%=item.name%></p>
    <div class="img-name-edit">
    <input type="text" value="<%=item.name%>" style="width:60%;" name="rename" class="file_name"/>
    <a href="javascript:;" class="renameImg">确定</a>
    </div>
    </div>
    </li>
    <% }) %>
    </ul>
    <%}else{%>
    <p class="albums-cr-imgs-noPic j-noPic">暂无图片</p>
    <%}%>
</script>