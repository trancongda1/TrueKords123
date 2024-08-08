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
            background-color: burlywood;
            /* Thêm màu nền cho card */
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            color: white;
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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="container">
        <h1 class="mb-4">Top Ranking Songs</h1>

        @foreach ($songs as $song)
            <div class="card mb-3">
                <div class="card-body">
                    @for ($i = 0; $i < $song->star_rating; $i++)
                        <span style="color: #ffd700;">\2605</span>
                    @endfor
                    <h5 class="card-title">{{ $song->title }}</h5>
                    <p class="card-text">{{ $song->filename }} - {{ $song->length }}</p>

                    <div class="audio-controls">
                        <audio controls controlsList="nodownload" class="mb-2">
                            <source src="{{ asset('/' . $song->audio_path) }}" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                        <a href="{{ route('song.download', ['songId' => $song->id]) }}"
                            class="btn btn-primary">Download</a>
                    </div>

                    <!-- Hiển thị số lượt thích và nút thích -->
                    <div class="like-section">
                        <span>{{ $song->likes }} Likes</span>
                        <form action="{{ route('like', ['songId' => $song->id]) }}" method="post" class="like-button">
                            @csrf
                            <button type="submit" class="btn btn-success">Like</button>
                        </form>
                    </div>

                    <!-- Hiển thị form comment -->
                    <form action="{{ route('comments.store') }}" method="post" class="comment-form">
                        @csrf
                        <input type="hidden" name="song_id" value="{{ $song->id }}">
                        <textarea name="content" placeholder="Leave a comment" class="form-control"></textarea>
                        <button type="submit" class="btn btn-success mt-2">Submit Comment</button>
                    </form>

                    <!-- Hiển thị danh sách comment -->
                    <div class="comments-section mt-3">



                        <div class="comments-section mt-3">

                            @if ($song->comments)
                                @foreach ($song->comments as $comment)
                                    <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
                                @endforeach
                            @else
                                <p>No comments available.</p>
                            @endif
                        </div>


                    </div>

                </div>
            </div>
        @endforeach

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
