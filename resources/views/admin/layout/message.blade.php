@if(count($errors)>0)
    <div class="alert alert-danger animated" role="alert">
    @foreach($errors->all() as $value)
        <p>{{$value}}</p>
    @endforeach
    </div>
@endif