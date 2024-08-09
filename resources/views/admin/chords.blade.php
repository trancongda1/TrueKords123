@extends('adminlte::page')

@section('title', 'Chords Management')

@section('content_header')
    <h1>Chords Management</h1>
@stop

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Song</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($chords as $chord)
                <tr>
                    <td>{{ $chord->id }}</td>
                    <td>{{ $chord->name }}</td>
                    <td>{{ $chord->song->name }}</td>
                    <td>
                        @if ($chord->img)
                            <img src="{{ $chord->img }}" alt="{{ $chord->name }}" style="max-width: 100px;">
                        @else
                            No image
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No chords found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
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
