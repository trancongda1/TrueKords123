<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>

    <!-- Link CSS của Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS tùy chỉnh -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .artist-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .artist-info:hover {
            transform: translateY(-5px);
        }

        .artist-info img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .artist-info img:hover {
            transform: scale(1.05);
        }

        .btn-back {
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .btn-back:hover {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="artist-info">
            <h1>Artist Details</h1>
            <p>ID: {{ $artist->id }}</p>
            <p>Name: {{ $artist->name }}</p>
            <p>Country: {{ $artist->country }}</p>
            <p>Birth Year: {{ $artist->birth_year }}</p>
            @if ($artist->is_featured)
                <p>This artist is featured!</p>
            @endif
            @if ($artist->image_path)
                <img src="{{ asset($artist->image_path) }}" alt="Artist Image">
            @endif
            <div class="mt-4">
                <a href="/menu" class="btn btn-secondary btn-back">Back to Menu</a>
            </div>
        </div>
    </div>

    <!-- Kịch bản và jQuery của Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
