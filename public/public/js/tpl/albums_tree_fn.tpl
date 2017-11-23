<script type="text/j-template" id="tpl_albums_tree_fn">
    <% _.each(dataset,function(item){%>
    <%if(item.parent_id==0 || item.id==0){%>
    <dl>
    <%}else{%>
    <dl style="display:none;">
    <%}%>
    <%if(item.id==0){%>
    <dt data-id="<%=item.id%>" data-add="0" data-rename="0" data-del="0">
    <%}else{%>
    <dt data-id="<%=item.id%>" data-add="1" data-rename="1" data-del="1">
    <%}%>
    <i class="icon-folder"></i>
    <span class="j-treeShowTxt"><em class="j-name"><%=item.name%></em>(<em class="j-num"><%=item.picNum%></em>)</span>
    <%if(item.id!=0){%>
    <input type="text" class="ipt j-ip" maxlength="10" value="<%=item.name%>"><i class="icon-loading j-loading"></i>
    <%}%>
    </dt>
    <dd></dd>
    </dl>
    <%})%>
</script>