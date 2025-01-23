@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="text-danger"><span>{{$error}}</span></div>
    @endforeach
@endif
