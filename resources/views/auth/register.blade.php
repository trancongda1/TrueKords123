<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Login Page</title>
    <style>
        body {
            background-image: url('/images/ngang1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Roboto', Arial, sans-serif;
        }

        .container {
            margin-top: 100px;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            overflow: hidden;
            max-width: 700px;
            margin: auto;
        }

        .card-header {
            background-color: #5bc0de;
            color: white;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 1rem;
        }

        .card-header h2 {
            font-family: 'Roboto', Arial, sans-serif;
        }

        .card-body {
            padding: 2rem;
        }

        .card-footer {
            background-color: #f7f7f7;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            padding: 1rem;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 15px;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 15px;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
        }

        .nav-tabs .nav-link {
            color: #5bc0de;
            font-weight: bold;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #5bc0de;
            border-color: #5bc0de;
        }

        .btn-primary,
        .btn-success,
        .btn-danger {
            border-radius: 15px;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .btn-block {
            width: 100%;
        }

        .form-control {
            border-radius: 15px;
            padding: 0.75rem;
            border: 1px solid #ced4da;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #5bc0de;
        }

        /* New CSS for the back button */
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
        }

        .back-button a {
            color: #fff;
            background-color: #5bc0de;
            padding: 0.5rem 1rem;
            border-radius: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .back-button a:hover {
            background-color: #4a9fc3;
        }
    </style>
</head>

<body>

    <div class="back-button">
        <a href="/" class="btn btn-primary">Trở về trang chính</a>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Đăng nhập hoặc Đăng ký</h2>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login"
                                    role="tab" aria-controls="login" aria-selected="true">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                    aria-controls="register" aria-selected="false">Đăng ký</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="forgot-password-tab" data-toggle="tab" href="#forgot-password"
                                    role="tab" aria-controls="forgot-password" aria-selected="false">Quên mật khẩu</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-2">
                            <div class="tab-pane fade show active" id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <form method="post" action="{{ route('login') }}">
                                    @csrf
                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="login-username">Email:</label>
                                        <input type="text" class="form-control" id="login-username" name="email"
                                            placeholder="Nhập email">
                                    </div>
                                    <div class="form-group">
                                        <label for="login-password">Mật khẩu:</label>
                                        <input type="password" class="form-control" id="login-password" name="password"
                                            placeholder="Nhập mật khẩu">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form method="post" action="{{ route('register') }}">
                                    @csrf
                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="register-username">Tên đăng nhập:</label>
                                        <input type="text" class="form-control" id="register-username" name="name"
                                            placeholder="Nhập tên đăng nhập">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-email">Email:</label>
                                        <input type="email" class="form-control" id="register-email" name="email"
                                            placeholder="Nhập email">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-password">Mật khẩu:</label>
                                        <input type="password" class="form-control" id="register-password"
                                            name="password" placeholder="Nhập mật khẩu">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Nhập lại mật khẩu:</label>
                                        <input type="password" class="form-control" id="confirm-password"
                                            name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Đăng ký</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="forgot-password" role="tabpanel"
                                aria-labelledby="forgot-password-tab">
                                <form method="post" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="forgot-email">Nhập email để nhận liên kết đặt lại mật khẩu:</label>
                                        <input type="email" class="form-control" id="forgot-email" name="email"
                                            placeholder="Nhập email">
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-block">Gửi liên kết đặt lại</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Quên mật khẩu? <a href="/forgot-password" data-toggle="tab">Khôi phục ngay</a></p>
                        <p class="mt-2">Trở về <a href="/">trang chính</a></p>
                        <p>&copy; Chào mừng bạn đến với Mai</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
