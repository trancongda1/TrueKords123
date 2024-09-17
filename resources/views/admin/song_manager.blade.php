@extends('adminlte::page')

@section('title', 'Songs Management')

@section('content_header')
<h1>Songs Management</h1>
@stop

@section('content')
<div class="container">
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createSongModal">Add New Song</button>
    <table class="table">
        <thead>
            <tr>
                <th>
                    <a href="{{ request()->fullUrlWithQuery(['sort_title' => request('sort_title') === 'asc' ? 'desc' : 'asc']) }}">
                        Title ({{ request('sort_title') === 'asc' ? 'A → Z' : 'Z → A' }})
                    </a>
                </th>
                <th>
                    <a href="{{ request()->fullUrlWithQuery(['sort_created_at' => request('sort_created_at') === 'asc' ? 'desc' : 'asc']) }}">
                        Created At ({{ request('sort_created_at') === 'asc' ? 'Oldest First' : 'Newest First' }})
                    </a>
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($songs as $song)
                <tr>
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#editSongModal-{{ $song->id }}">Edit</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteSongModal-{{ $song->id }}">Delete</button>
                    </td>
                </tr>

                <!-- Edit Song Modal -->
                <div class="modal fade" id="editSongModal-{{ $song->id }}" tabindex="-1" role="dialog" aria-labelledby="editSongModalLabel-{{ $song->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('admin.songs.update', $song->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editSongModalLabel-{{ $song->id }}">Edit Song</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $song->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="artist">Artist</label>
                                        <textarea name="artist" class="form-control">{{ $song->artist }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Song Modal -->
                <div class="modal fade" id="deleteSongModal-{{ $song->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteSongModalLabel-{{ $song->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteSongModalLabel-{{ $song->id }}">Delete Song</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the song "{{ $song->title }}"?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ route('admin.songs.destroy', $song->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <tr>
                    <td colspan="3" class="text-center">No songs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $songs->links() }}
    </div>
</div>

<!-- Create Song Modal -->
<div class="modal fade" id="createSongModal" tabindex="-1" role="dialog" aria-labelledby="createSongModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.songs.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createSongModalLabel">Create Song</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="artist">Artist</label>
                        <textarea name="artist" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    /* General Container Styles */
    .container {
        background-color: #f9f9f9;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Table Styles */
    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table thead th {
        background-color: #343a40;
        color: white;
        text-align: center;
        vertical-align: middle;
        padding: 12px;
    }

    .table tbody tr {
        background-color: #ffffff;
        transition: background-color 0.3s ease;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .table tbody tr:hover {
        background-color: #e9ecef;
    }

    .modal-content {
        border-radius: 8px;
    }

    .modal-header {
        background-color: #343a40;
        color: #ffffff;
    }
</style>
@stop

@section('js')
<script>
    // Optional JavaScript for modal functionality or other features can be added here
</script>
@stop
