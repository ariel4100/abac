@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt50 mb30">
        <div class="col l4">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s6" class="active"><a href="#test1">ARGENTINA</a></li>
                    <li class="tab col s6"><a href="#test2">MUNDO</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row distribuidores">
    <div class="container">
        <div id="test1" class="col s12 mt50">

            <div class="row">
                <div class="col l4">
                    <div class="car d" style="padding: 20px; background-color:white;  ">
                        <h6 class="rederino"><i class="fas fa-map-marker-alt" style="font-size: 25px"></i> ABAC CASA CENTRAL</h6>

                        <hr style="background-color: #212121">
                        <p style="color:black">
                            Tronador 374
                            (B1706BAB) Haedo
                            Tel: +54 (011) 4659-4146
                            Fax: +54 (011) 4460-0052
                            abac@abac.com.ar
                            www.abac.com.ar
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="test2" class="col s12 mt50">Distribuidores Mundo</div>
    </div>
</div>


<!---<div class="container"  >
            <div class="row">
               <div class="col l3 center">
                    <img src="{{ asset('img/contenido/'.$imagen->image) }}" class="responsive-img" alt="">
                </div>
                <div class="col l9">
                    <div class="row">
                    <div class="col l4">
                            <div class="car d" style="padding: 20px; background-color:white;  ">
                                <h6 class="rederino"><i class="fas fa-map-marker-alt" style="font-size: 25px"></i> ABAC CASA CENTRAL</h6>

                                <hr style="background-color: #212121">
                                <p style="color:black">
                                    Tronador 374
                                    (B1706BAB) Haedo
                                    Tel: +54 (011) 4659-4146
                                    Fax: +54 (011) 4460-0052
                                    abac@abac.com.ar
                                    www.abac.com.ar
                                </p>
                            </div>
                        </div>
            </div>
    </div>-->
@endsection

@push('scripts')
<script>
    M.Tabs.init(document.querySelector('.tabs'));
</script>
@endpush