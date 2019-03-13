<footer>

    <div class="footer-content container">
        <div class="row">
            <div class="col l3 m6 s12 mt20">
                <div class="row center">
                    <img src="{{asset('img/contenido/'.$header->image)}}" class="responsive-img" alt="">
                </div>
                <div class="row center">
                        <img src="{{asset('img/contenido/'.$logos[2]->image)}}" class="responsive-img" alt="">
                        <img src="{{asset('img/contenido/'.$logos[3]->image)}}" class="responsive-img" alt="">
                </div>
                <div class="row center mt10">
                        <img src="{{asset('img/contenido/'.$logos[4]->image)}}" class="responsive-img" alt="">
                </div>
            </div>
            <div class="col l3 m6 s12">
                <h6 class="rederino mb10 uppercase mt20">Certificaciones</h6>
                <div class="flex">
                    <img src="{{asset('img/contenido/'.$logos[8]->image)}}" class="responsive-img" style="margin-right:20px">
                    <img src="{{asset('img/contenido/'.$logos[7]->image)}}" class="responsive-img" alt="">
                </div>
            </div>
            <div class="col l3 m6 s12">
                <h6 class="rederino uppercase mt20">MIEMBRO DE</h6>
                <div class="flex" style="justify-content:space-between; align-items:center">
                        <img src="{{asset('img/contenido/'.$logos[5]->image)}}" class="responsive-img mt20" alt="">
                        <img src="{{asset('img/contenido/'.$logos[6]->image)}}" class="responsive-img mt20" alt="">
                </div>
            </div>
            <div class="col l3 m6 s12">
                <h6 class="rederino uppercase mt20">ABAC SRL</h6>
                @foreach($contacto as $c)
                <div class="row mb10">
                    <div class="col l2">
                        <i class="material-icons" style="color:#e1131b">{{$c->icon}}</i>
                    </div>
                    <div class="col l10">
                        <a href="{{$c->ruta}}" class="footer-hoverino">{{ $c->{'title_'.App::getLocale()} }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    <div class="flex-column mt30" style="justify-content:flex-start; align-items:flex-end">
        <div class="separator"></div>
        <p class="mb0" style="color:gray">BY OSOLE</p>
    </div>
    </div>
    
</footer>
@include('layouts.partials.scripts')
</body>
</html>
