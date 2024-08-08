<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>

    <!-- Thêm link CSS của Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Thêm đoạn mã CSS để đặt background -->
    <style>
        body {
            background-image: url('{{ asset('images/pngtree-brown-scratched-old-vintage-background-image_581531.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Giữ ảnh nền cố định khi cuộn trang */
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            /* Đặt màu nền với độ trong suốt */
            padding: 20px;
            border-radius: 10px;
            width: 80%;
        }

        h1 {
            font-size: 2.5em;
            /* Kích thước của tiêu đề */
            margin-bottom: 20px;
            /* Khoảng cách giữa tiêu đề và danh sách bài hát */
            position: relative;
            /* Để tạo lấp lánh */
            color: #ffd700;
            /* Màu vàng */
            text-align: center;
            /* Canh giữa tiêu đề */
        }

        h1::before {
            content: '\2605';
            /* Ký tự sao Unicode */
            font-size: 1.5em;
            /* Kích thước của sao */
            position: absolute;
            top: 50%;
            left: -1em;
            transform: translateY(-50%);
        }

        .card {
            background-color: pink;
            /* Thêm màu nền cho card */
            margin-bottom: 15px;
            /* Thêm khoảng cách giữa các card */
            padding: 10px;
            /* Thêm độ dày nội dung trong card */
            border-radius: 8px;
            /* Bo tròn góc của card */
            color: white;
            /* Thêm màu cho tiêu đề và văn bản trong card */
        }

        .audio-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .comments-section {
            margin-top: 20px;
        }

        .comment-form {
            margin-top: 10px;
        }

        .like-section {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .like-button {
            margin-left: 10px;
        }

        .mt-4 {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>List of Artists</h1>
        <ul>
            @foreach ($artists as $artist)
                <li>
                    <strong>{{ $artist->name }}</strong> - {{ $artist->country }}
                    <a href="{{ route('artists.show', $artist->id) }}">View Details</a>
                </li>
            @endforeach
        </ul>


        <div class="mt-4">
            <a href="/menu" class="btn btn-secondary">Back to Menu</a>
        </div>
    </div>

    <!-- Thêm kịch bản và jQuery của Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
