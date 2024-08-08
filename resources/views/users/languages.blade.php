<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('images/pngtree-brown-scratched-old-vintage-background-image_581531.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .audio-controls {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Danh sách bài hát</h1>

        <h2>Bài hát Việt Nam</h2>
        <ul>
            @foreach ($songsIndia as $song)
                <li>{{ $song->title }}</li>
                <div class="audio-controls">
                    <audio controls controlsList="nodownload" class="mb-2">
                        <source src="{{ asset('/' . $song->audio_path) }}" type="audio/mp3">
                        Your browser does not support the audio element.
                    </audio>
                    <a href="{{ asset('storage/' . $song->audio_path) }}" download="{{ $song->filename }}"
                        class="btn btn-primary">Download</a>
                </div>
            @endforeach
        </ul>

        <h2>Bài hát Ấn Độ</h2>
        <ul>
            @foreach ($songsVietnam as $song)
                <li>{{ $song->title }}</li>
                <div class="audio-controls">
                    <audio controls class="mb-2">
                        <source src="{{ asset('/' . $song->audio_path) }}" type="audio/mp3">
                        Your browser does not support the audio element.
                    </audio>
                    <a href="{{ asset('storage/' . $song->audio_path) }}" download="{{ $song->filename }}"
                        class="btn btn-primary">Download</a>
                </div>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        <a href="/menu" class="btn btn-secondary">Back to Menu</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
