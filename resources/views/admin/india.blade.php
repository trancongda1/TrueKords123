@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Quản lí bài hát Việt Nam</h1>
@stop

@section('content')

    @foreach ($songs as $song)
        <div>
            <h2>{{ $song->title }}</h2>
            <p>Artist: {{ $song->artist }}</p>
            <p>Language: {{ $song->language_id }}</p>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary custom-btn" data-toggle="modal"
                data-target="#editSongModal{{ $song->id }}">
                Chỉnh Sửa
            </button>

            <!-- Modal -->
            <div class="modal fade" id="editSongModal{{ $song->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editSongModalLabel{{ $song->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSongModalLabel{{ $song->id }}">Chỉnh Sửa Bài Hát</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('india.update', $song->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" value="{{ $song->title }}"
                                    class="form-control">

                                <label for="artist_id">Artist ID:</label>
                                <input type="text" id="artist_id" name="artist_id" value="{{ $song->artist_id }}"
                                    class="form-control">

                                <label for="language_id">Language ID:</label>
                                <input type="text" id="language_id" name="language_id" value="{{ $song->language_id }}"
                                    class="form-control">

                                <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                            </form>

                            <!-- Form cho phép xoá -->
                            <form action="{{ route('india.destroy', $song->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2">Xoá bài hát</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@stop

@section('css')
    <style>
        /* Hiệu ứng hover cho nút "Chỉnh Sửa" */
        .custom-btn:hover {
            background-color: #336699;
        }

        /* Định dạng cho modal */
        .modal-content {
            font-size: 16px;
        }

        /* Định dạng cho input */
        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        /* Định dạng cho các nút trong modal */
        .modal-body .btn {
            width: 100%;
            margin-top: 10px;
        }
    </style>
@stop
