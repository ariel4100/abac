@extends('adm.dashboard')

@section('body')
<main>
    <div class="row">
        <div class="input-field col s6 offset-s1 mt30">
        <select class="selector-product">
            <option value="" disabled selected>Elija una familia</option>
            @foreach($familias as $f)
                <option value="{{$f->id}}">{{ $f->{'title_'.App::getLocale()} }}</option>
            @endforeach
        </select>
        <label>Familias</label>
        </div>
    </div>

    <div class="row" style="margin-left:100px;">
        <a class="waves-effect waves-light btn gogo">Ver productos</a>
    </div>
</main>
@endsection

@push('scripts')
    <script>
        const selector = document.querySelector('.selector-product')
        const action = document.querySelector('.gogo')
        M.FormSelect.init(selector);

        selector.addEventListener('change', () => action.href = document.__API_URL+`/adm/producto/${selector.value}/show`)
    </script>
@endpush
