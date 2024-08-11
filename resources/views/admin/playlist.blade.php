@extends('adminlte::page')

@section('title', 'Playlists Management')

@section('content_header')
    <h1>Playlists Management</h1>
@stop

@section('content')
<div class="container">
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createPlaylistModal">Add New Playlist</button>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>User ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($playlists as $playlist)
            <tr>
                <td>{{ $playlist->id }}</td>
                <td>{{ $playlist->name }}</td>
                <td>{{ $playlist->user_id }}</td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#editPlaylistModal-{{ $playlist->id }}">Edit</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deletePlaylistModal-{{ $playlist->id }}">Delete</button>
                </td>
            </tr>

            <!-- Edit Playlist Modal -->
            <div class="modal fade" id="editPlaylistModal-{{ $playlist->id }}" tabindex="-1" role="dialog" aria-labelledby="editPlaylistModalLabel-{{ $playlist->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('admin.playlist.update', $playlist->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPlaylistModalLabel-{{ $playlist->id }}">Edit Playlist</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $playlist->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="user_id">User ID</label>
                                    <input type="number" name="user_id" class="form-control" value="{{ $playlist->user_id }}" required>
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

            <!-- Delete Playlist Modal -->
            <div class="modal fade" id="deletePlaylistModal-{{ $playlist->id }}" tabindex="-1" role="dialog" aria-labelledby="deletePlaylistModalLabel-{{ $playlist->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('admin.playlist.destroy', $playlist->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title" id="deletePlaylistModalLabel-{{ $playlist->id }}">Delete Playlist</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this playlist?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @empty
            <tr>
                <td colspan="4" class="text-center">No playlists found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $playlists->links() }}
    </div>
</div>

<!-- Create Playlist Modal -->
<div class="modal fade" id="createPlaylistModal" tabindex="-1" role="dialog" aria-labelledby="createPlaylistModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.playlist.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createPlaylistModalLabel">Create Playlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input type="number" name="user_id" class="form-control" required>
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
