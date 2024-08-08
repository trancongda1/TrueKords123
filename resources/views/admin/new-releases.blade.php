@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h1>New releases (Released > 2022)</h1>



    <ul>
        @foreach ($songs as $song)
            <li>
                {{ $song->title }} - Released: {{ $song->release_year }}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $song->id }}">
                    Edit
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editModal{{ $song->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="editModalLabel{{ $song->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $song->id }}">Edit Song</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form để chỉnh sửa thông tin bài hát -->
                                <form action="{{ route('edit-song', $song->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label>Title:</label>
                                    <input type="text" name="title" value="{{ $song->title }}"><br>
                                    <label>Release Year:</label>
                                    <input type="text" name="release_year" value="{{ $song->release_year }}"><br>
                                    <!-- Các trường khác để chỉnh sửa -->
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete form -->
                <form action="{{ route('new-releases.destroy', $song->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
