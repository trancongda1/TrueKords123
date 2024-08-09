


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
@foreach ($songs as $song)
        <tr>
            <td>{{ $song->id }}</td>
            <td>{{ $song->name }}</td>
            <td>
                <!-- Actions như edit, delete -->
            </td>
        </tr>
        @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
