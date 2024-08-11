@extends('adminlte::page')

@section('title', 'User Likes Management')

@section('content_header')
<h1>User Likes Management</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <!-- Likes List -->
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Song</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($likes as $like)
                    <tr>
                        <td>{{ $like->id }}</td>
                        <td>{{ $like->user->name }}</td>
                        <td>{{ $like->song->title }}</td>
                        <td>
                            <a href="{{ route('admin.likes.index', ['id' => $like->id]) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No likes found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $likes->links() }}
            </div>
        </div>

        <!-- Like Details -->
        @if ($selectedLike)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Like Details</h3>
                </div>
                <div class="card-body">
                    <p><strong>User:</strong> {{ $selectedLike->user->name }}</p>
                    <p><strong>Song:</strong> {{ $selectedLike->song->title }}</p>
                    <p><strong>Liked At:</strong> {{ $selectedLike->created_at }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.likes.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
        @endif
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

    /* Button Styles */
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #117a8b;
        border-color: #0c5460;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    /* Card Styles */
    .card {
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #343a40;
        color: white;
        padding: 15px;
    }

    .card-body {
        padding: 20px;
    }

    .card-footer {
        background-color: #f1f1f1;
        padding: 15px;
    }
</style>
@stop

@section('js')
<!-- Add any additional JavaScript if needed -->
@stop
