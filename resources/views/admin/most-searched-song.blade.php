@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h1>Most Searched Songs</h1>

    @if (isset($songs) && $songs->count() > 0)
        <ul>
            @foreach ($songs as $song)
                <li>
                    {{ $song->title }} - {{ $song->search_count }} listens
                    <a href="#" data-toggle="modal" data-target="#editModal{{ $song->id }}">Edit</a>
                    <form action="{{ route('song.delete', $song->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>

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
                                <!-- Form to edit song details -->
                                <form action="{{ route('song.update', $song->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label>Title:</label>
                                    <input type="text" name="title" value="{{ $song->title }}"><br>
                                    <!-- Other fields to edit -->
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    @else
        <p>No songs found.</p>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        /* Custom CSS */
        ul {
            list-style: none;
            padding: 0;
        }



        li a {
            text-decoration: none;
            margin-right: 10px;
            color: blue;
        }

        li button {
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
