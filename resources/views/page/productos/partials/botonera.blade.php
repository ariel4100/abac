    <ul class="collapsible">
        @foreach($familias as $f)
            <li class="@isset($productos) @if(count($productos) > 0) @if($productos->first()->familia->id === $f->id) active @endif @endif @endisset">
                <div class="collapsible-header" style="display:flex; justify-content:space-between; align-items:center;">
                    <a href="{{route('familias.show', $f->id)}}" class="hoverino uppercase @isset($productos) @if(count($productos) > 0) @if($productos->first()->familia->id === $f->id) current @endif @endif @endisset">
                        {{$f->{'title_'.App::getLocale()} }}
                    </a>
                    
                    <i class="material-icons mb0 mt0 rotate">keyboard_arrow_right</i>
                </div>
                <div class="collapsible-body">
                    <ul>
                        @foreach($f->productos as $p)
                        <li style="margin-bottom:15px;">
                            <a href="{{route('productos.show', $p->id)}}" class="botonera-sumsum @isset($producto) @if($producto->id === $p->id) current @endif @endisset">
                                {{$p->{'title_'.App::getLocale()} }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>

    @push('scripts')
        <script>
            M.Collapsible.init(document.querySelector('.collapsible'))
        </script>
    @endpush
