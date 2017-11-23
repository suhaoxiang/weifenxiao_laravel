@extends('vendor.menu.main')


@section('css')

@endsection

@section('main')
<form action="">
    <div class="panel-single panel-single-light mgt20">
        <div class="formitems">
            <label class="fi-name">上传图片：</label>
            <div class="form-controls pdt5 j-imglistPanel">
                <ul class="img-list clearfix">

                    <li data-index="0">
                        <span class="img-move img-move-left"></span>
                        <span class="img-move img-move-right"></span>
                        <span class="img-list-btndel j-delimg"><i class="gicon-trash white"></i></span>
                        <span class="img-list-overlay"></span>
                        <img src="http://image.wifenxiao.com/b1/6f/4018114/2017-11/5a0e3cd35355d.jpg@!w640">
                    </li>

                    <li class="img-list-add j-addimg">+</li>
                </ul>
                <input type="hidden" name="file_path" class="j-imglist-dataset" value="http://image.wifenxiao.com/b1/6f/4018114/2017-11/5a0e3cd35355d.jpg@!w640">
                <span class="fi-help-text">建议上传尺寸640px * 640px</span>
            </div>
        </div>
    </div>

</form>
@endsection

@section('js')
<script>
    require(['util'],function(util){
        util.imagePicker();
    })
</script>
@endsection



