@extends('adminlte::page')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@section('title', 'Edit Artist')

@section('content_header')
    <h1>Edit Artist</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Artist</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.artists.update', $artist->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ $artist->name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="is_featured" class="col-md-4 col-form-label text-md-right">Featured</label>

                                <div class="col-md-6">
                                    <select id="is_featured" class="form-control" name="is_featured">
                                        <option value="1" {{ $artist->is_featured ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ !$artist->is_featured ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birth_year" class="col-md-4 col-form-label text-md-right">Birth Year</label>

                                <div class="col-md-6">
                                    <input id="birth_year" type="text" class="form-control" name="birth_year"
                                        value="{{ $artist->birth_year }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                    <a href="/admin/top-artists" class="btn btn-secondary">Back to Admin</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
