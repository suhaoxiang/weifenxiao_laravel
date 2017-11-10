@if(count($errors)>0)
<div class="alert alert-danger animated" role="alert">
    @foreach($errors->all() as $value)
    <p>{{$value}}</p>
    @endforeach
</div>
@endif

<script>
    require(['jquery'],function ($) {
        if($(".alert").length>0){
            $(".alert").fadeOut(1500);
        }
    })
</script>