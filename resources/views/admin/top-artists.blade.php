@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <h1>All Artists</h1>
        <table class="table">
            <style>
                /* Định kích thước cố định cho tất cả hình ảnh */
                img {
                    width: 200px;
                    /* Độ rộng mong muốn */
                    height: 200px;
                    /* Chiều cao mong muốn */
                    object-fit: cover;
                    /* Đảm bảo hình ảnh không bị méo hoặc kéo dãn */
                }
            </style>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Featured</th>
                    <th>Country</th>
                    <th>Birth Year</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artists as $artist)
                    <tr>
                        <td>{{ $artist->name }}</td>
                        <td>{{ $artist->is_featured ? 'Yes' : 'No' }}</td>
                        <td>{{ $artist->country }}</td>
                        <td>{{ $artist->birth_year }}</td>
                        <td>
                            @if ($artist->image_path)
                                <img src="{{ asset($artist->image_path) }}" alt="Artist Image">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.artists.edit', $artist->id) }}">Edit</a>
                            <form action="{{ route('admin.artists.destroy', $artist->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Form for adding a new artist -->
        <h2>Add New Artist</h2>
        <form action="{{ route('admin.artists.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="is_featured">Featured:</label>
                <input type="checkbox" name="is_featured" value="1">
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" required>
            </div>
            <div class="form-group">
                <label for="birth_year">Birth Year:</label>
                <input type="text" name="birth_year" required>
            </div>
            <div class="form-group">
                <label for="image_path">Image Path:</label>
                <input type="text" name="image_path">
            </div>
            <button type="submit">Add Artist</button>
        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
