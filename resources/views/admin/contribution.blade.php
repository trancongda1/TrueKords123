@extends('adminlte::page')

@section('title', 'User Contributions Management')

@section('content_header')
<h1>User Contributions Management</h1>
@stop

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        <!-- Contributions List -->
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>YouTube Link</th>
                        <th>Approved</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contributions as $contribution)
                    <tr class="{{ $contribution->approved ? 'approved' : 'not-approved' }}">
                        <td>{{ $contribution->id }}</td>
                        <td>{{ $contribution->title }}</td>
                        <td>{{ $contribution->description }}</td>
                        <td>
                            <a href="{{ $contribution->youtube_link }}" target="_blank">{{ $contribution->youtube_link }}</a> <!-- Link YouTube -->
                        </td>
                        <td>
                            {{ $contribution->approved ? 'Yes ✅' : 'No ❌' }}
                        </td>

                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.contributions.index', ['id' => $contribution->id]) }}" class="btn btn-info">View</a>
                                <form action="{{ route('admin.contributions.approve', $contribution->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('admin.contributions.destroy', $contribution->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this contribution?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No contributions found.</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $contributions->links() }}
            </div>
        </div>

        <!-- Contribution Details -->
        @if ($selectedContribution)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $selectedContribution->title }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Description:</strong> {{ $selectedContribution->description }}</p>
                    <p><strong>Content:</strong> {{ $selectedContribution->content }}</p>
                    <p><strong>Approved:</strong> {{ $selectedContribution->approved ? 'Yes' : 'No' }}</p>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.contributions.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@stop

@section('css')
<style>
    /* CSS for approved and not-approved rows */
    .approved {
        background-color: #d4edda;
        /* Light green background for approved contributions */
        color: #155724;
        /* Dark green text color */
    }

    .not-approved {
        background-color: #f8d7da;
        /* Light red background for not approved contributions */
        color: #721c24;
        /* Dark red text color */
    }

    /* Hover effect to enhance visibility */
    .approved:hover,
    .not-approved:hover {
        opacity: 0.8;
    }

    /* Other styles remain unchanged */
    .table tbody td {
        vertical-align: middle;
        text-align: center;
        padding: 12px;
        white-space: nowrap;
    }

    .table thead th {
        background-color: #343a40;
        color: white;
        text-align: center;
        vertical-align: middle;
        padding: 12px;
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

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
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

    .table tbody td .btn-group {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    /* Card Styles - Smaller View */
    .card {
        margin-top: 20px;
        width: 70%;
        max-width: 300px;
        box-sizing: border-box;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-left: auto;
        margin-right: auto;
    }

    .card-header {
        background-color: #343a40;
        color: white;
        padding: 8px;
        font-size: 1rem;
    }

    .card-body {
        padding: 10px;
        font-size: 0.9rem;
    }

    .card-footer {
        background-color: #f1f1f1;
        padding: 8px;
        text-align: center;
    }

    .alert {
        margin-top: 20px;
    }
</style>
@stop

@section('js')
<!-- Add any additional JavaScript if needed -->
@stop