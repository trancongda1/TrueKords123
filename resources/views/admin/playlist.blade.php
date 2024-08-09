@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Playlist Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Playlist Name: {{ $playlist->name }}</h5>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop