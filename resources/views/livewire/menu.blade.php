<div>
    <div class="col-12">
        <div class="mt-5"> <p>Seleccione referencia</p> </div>
            <div class="form-check">
                <input class="form-check-input" wire:click="TraerDatos()"  wire:model="type" wire: type="radio" name="type" value="category">
                <label class="form-check-label">
                  Categoría
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" wire:click="TraerDatos()" wire:model="type" type="radio" name="type" value="page">
                <label class="form-check-label" >
                  Página
                </label>
            </div>
    </div>

    <div class="col-12">
        <select class="form-select mt-5" name="id" >
            <option disabled >Seleccione una opción</option>
            @if($category)
            @foreach ($category as $c )
                <option value="{{ $c->id }}">{{ $c->title }}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>