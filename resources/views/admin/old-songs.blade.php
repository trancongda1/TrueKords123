@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h1>Old Songs (Released before 2015)</h1>

    <!-- Hiển thị danh sách bài hát -->
    <ul>
        @foreach ($songs as $song)
            <li>
                {{ $song->title }} - Released: {{ $song->release_year }}
                <a href="#" data-toggle="modal" data-target="#editModal{{ $song->id }}">Edit</a>
                <form action="{{ route('old-songs.destroy', $song->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>

            <!-- Modal sửa đổi -->
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
                            <!-- Form để sửa đổi thông tin bài hát -->
                            <form action="{{ route('old-songs.update', $song->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Các trường để chỉnh sửa thông tin bài hát -->
                                <label>Title:</label>
                                <input type="text" name="title" value="{{ $song->title }}"><br>
                                <label>Release Year:</label>
                                <input type="text" name="release_year" value="{{ $song->release_year }}"><br>
                                <!-- Các trường khác để chỉnh sửa -->
                                <button type="submit">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
