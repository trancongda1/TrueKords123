@extends('adminlte::page')

@section('title', 'Chords Management')

@section('content_header')
<h1>Chords Management</h1>
@stop

@section('content')
<div class="container">
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createChordModal">Add New Chord</button>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Content</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($chords as $chord)
            <tr>
                <td>{{ $chord->id }}</td>
                <td>{{ $chord->name }}</td>
                <td>{{ $chord->content }}</td>
                <td>
                    @if ($chord->img)
                    <img src="{{ asset($chord->img) }}" alt="{{ $chord->name }}" style="max-width: 100px;">
                    @else
                    No image
                    @endif
                </td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#editChordModal-{{ $chord->id }}">Edit</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteChordModal-{{ $chord->id }}">Delete</button>
                </td>
            </tr>

            <!-- Edit Chord Modal -->
            <div class="modal fade" id="editChordModal-{{ $chord->id }}" tabindex="-1" role="dialog" aria-labelledby="editChordModalLabel-{{ $chord->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('admin.chords.update', $chord->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editChordModalLabel-{{ $chord->id }}">Edit Chord</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $chord->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="form-control" required>{{ $chord->content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="img">Image</label>
                                    <input type="file" name="img" class="form-control">
                                    @if ($chord->img)
                                    <img src="{{ asset($chord->img) }}" alt="{{ $chord->name }}" style="max-width: 100px;">
                                    @else
                                    No image
                                    @endif
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

            <!-- Delete Chord Modal -->
            <div class="modal fade" id="deleteChordModal-{{ $chord->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteChordModalLabel-{{ $chord->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('admin.chords.destroy', $chord->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteChordModalLabel-{{ $chord->id }}">Delete Chord</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this chord?
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
                <td colspan="5" class="text-center">No chords found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $chords->links() }}
    </div>
</div>

<!-- Create Chord Modal -->
<div class="modal fade" id="createChordModal" tabindex="-1" role="dialog" aria-labelledby="createChordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.chords.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createChordModalLabel">Create Chord</h5>
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
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" name="img" class="form-control">
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

    .table tbody td {
        vertical-align: middle;
        text-align: center;
        padding: 12px;
    }

    .table img {
        border-radius: 8px;
        max-width: 100px;
        transition: transform 0.3s ease;
    }

    .table img:hover {
        transform: scale(1.1);
    }

    /* Button Styles */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #117a8b;
        border-color: #0c5460;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #bd2130;
        border-color: #b21f2d;
    }

    /* Modal Styles */
    .modal-header {
        background-color: #343a40;
        color: white;
    }

    .modal-header .close {
        color: white;
    }

    .modal-body {
        padding: 20px;
        background-color: #f9f9f9;
    }

    .modal-footer {
        background-color: #f1f1f1;
    }

    .modal-content {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    /* Pagination Styles */
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination .page-link {
        color: #007bff;
        border: 1px solid #dee2e6;
        padding: 6px 12px;
        border-radius: 0.25rem;
        transition: background-color 0.2s ease;
    }

    .pagination .page-link:hover {
        background-color: #e9ecef;
        text-decoration: none;
    }

    .pagination .active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        .table img {
            max-width: 50px;
        }

        .btn {
            font-size: 12px;
            padding: 5px 10px;
        }

        .modal-content {
            padding: 15px;
        }
    }
</style>
@stop


@section('js')
<!-- Add any additional JavaScript if needed -->
@stop