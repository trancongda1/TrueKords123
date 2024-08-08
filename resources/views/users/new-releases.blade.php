<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>

    <!-- Thêm link CSS của Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Thêm đoạn mã CSS để đặt background và kiểu dáng -->
    <style>
        body {
            background-image: url('{{ asset('images/1120-492-max-169634767950281214680.webp') }}');
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
            font-family: Arial, sans-serif;
            /* Thay đổi font chữ */
        }

        h1 {
            font-size: 3em;
            margin-bottom: 30px;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Hiệu ứng bóng chữ */
        }

        ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        li {
            font-size: 1.5em;
            margin-bottom: 10px;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.2);
            /* Màu nền với độ trong suốt */
            border-radius: 5px;
        }

        .btn-secondary {
            margin-top: 20px;
        }

        .btn-primary {
            display: inline-block;
            /* Cho phép nút hiển thị trên cùng một hàng với nội dung khác */
            margin-left: 10px;
            /* Khoảng cách giữa nút và nội dung khác */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>New Releases</h2>
        <ul>
            @foreach ($songs as $song)
                <li>{{ $song->title }} ({{ $song->release_year }})</li>



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

    <!-- Thêm kịch bản và jQuery của Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
