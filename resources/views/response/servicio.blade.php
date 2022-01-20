<div class="padT50">
    <h4>{{$sub->titulo}}</h4><br>
    <div class="row">
        @foreach ($sub->servicios as $serv)
        <div class="col-md-4">
            <img src="{{Storage::url($serv->imagen)}}" alt="">
        </div>
        @endforeach
        
    </div>
</div>
