@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <h1>Song Management</h1>

        <!-- Button to trigger modal for adding a new song -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSongModal">
            Add Song
        </button>

        <hr>

        <!-- View all songs -->
        @foreach ($songs as $song)
            <div class="song-details">
                <span class="title">{{ $song->title }}</span> - <span class="filename">{{ $song->filename }}</span> - <span
                    class="length">{{ $song->length }}</span>
                <button type="button" class="btn btn-info" data-toggle="modal"
                    data-target="#editSongModal{{ $song->id }}">Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#deleteSongModal{{ $song->id }}">Delete</button>
                <button type="button" class="btn btn-success" data-toggle="modal"
                    data-target="#detailsSongModal{{ $song->id }}">Details</button>
            </div>

            <hr>

            <!-- Edit Song Modal -->
            <div class="modal fade" id="editSongModal{{ $song->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editSongModalLabel{{ $song->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSongModalLabel{{ $song->id }}">Edit Song</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Edit song form content here -->
                            <form action="{{ route('admin.top-ranking.update', $song->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" value="{{ $song->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="artist_id">Artist ID:</label>
                                    <input type="text" name="artist_id" value="{{ $song->artist_id }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="search_count">Search Count:</label>
                                    <input type="number" name="search_count" value="{{ $song->search_count }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="is_hot">Is Hot:</label>
                                    <input type="checkbox" name="is_hot" {{ $song->is_hot ? 'checked' : '' }}>
                                </div>

                                <div class="form-group">
                                    <label for="genre_id">Genre ID:</label>
                                    <input type="text" name="genre_id" value="{{ $song->genre_id }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="release_year">Release Year:</label>
                                    <input type="text" name="release_year" value="{{ $song->release_year }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="audio_path">Audio Path:</label>
                                    <input type="text" name="audio_path" value="{{ $song->audio_path }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="length">Length:</label>
                                    <input type="text" name="length" value="{{ $song->length }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="language_id	">languages</label>
                                    <input type="text" name="language_id	" value="{{ $song->language_id }}" required>
                                </div>

                                <button type="submit">Update Song</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Song Modal -->
            <div class="modal fade" id="deleteSongModal{{ $song->id }}" tabindex="-1" role="dialog"
                aria-labelledby="deleteSongModalLabel{{ $song->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteSongModalLabel{{ $song->id }}">Delete Song</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Delete song confirmation content here -->
                            <p>Are you sure you want to delete this song?</p>
                            <form action="{{ route('admin.top-ranking.destroy', $song->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete Song</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details Song Modal -->
            <div class="modal fade" id="detailsSongModal{{ $song->id }}" tabindex="-1" role="dialog"
                aria-labelledby="detailsSongModalLabel{{ $song->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailsSongModalLabel{{ $song->id }}">Song Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Song details content here -->
                            <p>Title: {{ $song->title }}</p>

                            <p>Length: {{ $song->length }}</p>


                            <p>Genre: {{ $song->genre }}</p>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Add Song Modal -->
    <div class="modal fade" id="addSongModal" tabindex="-1" role="dialog" aria-labelledby="addSongModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSongModalLabel">Add Song</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add song form content here -->
                    <form action="{{ route('songs.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="artist_id">Artist ID:</label>
                            <input type="text" name="artist_id" required>
                        </div>

                        <div class="form-group">
                            <label for="search_count">Search Count:</label>
                            <input type="number" name="search_count" required>
                        </div>

                        <div class="form-group">
                            <label for="is_hot">Is Hot:</label>
                            <input type="checkbox" name="is_hot" value="1">
                        </div>

                        <div class="form-group">
                            <label for="genre_id">Genre ID:</label>
                            <input type="text" name="genre_id" required>
                        </div>

                        <div class="form-group">
                            <label for="release_year">Release Year:</label>
                            <input type="text" name="release_year" required>
                        </div>

                        <div class="form-group">
                            <label for="audio_path">Audio Path:</label>
                            <input type="text" name="audio_path" required>
                        </div>

                        <div class="form-group">
                            <label for="filename">Filename:</label>
                            <input type="text" name="filename" required>
                        </div>

                        <div class="form-group">
                            <label for="length">Length:</label>
                            <input type="text" name="length" required>
                        </div>
                        <div class="form-group">
                            <label for="language_id	">languages</label>
                            <input type="text" name="language_id" value="{{ $song->language_id }}" required>
                        </div>

                        <button type="submit">Create Song</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for song management */
        .container {
            margin-top: 20px;
        }

        .song-details {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .song-details .title {
            font-weight: bold;
            color: blue;
        }

        .song-details .filename {
            color: #666;
        }

        .song-details .length {
            font-style: italic;
        }
    </style>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        console.log('Hi!');
    </script>
@stop
