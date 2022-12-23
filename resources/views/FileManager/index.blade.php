@extends('Layout.app')

@section('title','File manager')


@section('container')
<div class="container-fluid">
    <iframe src="/filemanager" style="width: 100%; height: 80vh; overflow: hidden; border: none;"></iframe>
</div>

@endsection
