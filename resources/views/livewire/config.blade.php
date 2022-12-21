@extends('Layout.app')
@section('title','Configuración')

<div>
@section('container')
    <form wire:submit.prevant='submit'>

    <div class="row">
        <div class="col-12">
            <div class="form-group mt-5">
                <input autofocus autocomplete="off" class="form-control" wire:model='site_name' name="site_name" required  />
            </div>
        </div>

        <div class="col-12">
            <div class="form-group mt-5">
                <input class="form-control" name="site_description" required wire:model='site_description'  />
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary mt-5" type="submit">Guardar</button>
        </div>
    </div>
    </form>
@endsection
</div>
