@extends('adm.dashboard')

@section('body')
<main>
    <div class="row">
        <div class="input-field col s6 offset-s1 mt30">
        <select class="selector-product">
            <option value="" disabled selected>Elija una categoria</option>
            @foreach($categorias as $f)
                <option value="{{$f->id}}">{{ $f->{'title_'.App::getLocale()} }}</option>
            @endforeach
        </select>
        <label>Categorias</label>
        </div>
    </div>

    <div class="row" style="margin-left:100px;">
        <a class="waves-effect waves-light btn gogo">Ver categorias</a>
    </div>
</main>
@endsection

@push('scripts')
    <script>
        const selector = document.querySelector('.selector-product')
        const action = document.querySelector('.gogo')
        M.FormSelect.init(selector);

        selector.addEventListener('change', () => action.href = `/abac/adm/novedad/${selector.value}/show`)
    </script>
@endpush
