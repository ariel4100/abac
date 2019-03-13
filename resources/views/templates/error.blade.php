@if($errors->any())
    <div class="container">
        <div class="col s12 card-panel red lighten-4 green-text text-darken-4">
            @foreach($errors->all() as $err)
                <p>{{$err}}</p>
            @endforeach
        </div>
    </div>
@endif
