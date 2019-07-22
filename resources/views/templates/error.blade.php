@if($errors->any())
    <div class="col s12 card-panel lighten-4 green-text text-darken-4"  style="padding: 1%; background-color: #f8d7da">
        @foreach($errors->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif
