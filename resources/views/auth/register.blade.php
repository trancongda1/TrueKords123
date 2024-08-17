<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Login Page</title>
    <style>
        /* General Styles */
body {
    background: linear-gradient(135deg, #3a1c71, #d76d77, #ffaf7b);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    font-family: 'Roboto', Arial, sans-serif;
    color: #ffffff;
}

@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.container {
    margin-top: 80px;
}

/* Card Styles */
.card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    overflow: hidden;
    max-width: 800px;
    margin: auto;
    animation: fadeIn 1.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(50px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Card Header */
.card-header {
    background: linear-gradient(135deg, #fc466b, #3f5efb);
    color: white;
    text-align: center;
    padding: 1.5rem;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    box-shadow: 0 4px 20px rgba(255, 105, 180, 0.6);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 0 15px rgba(255, 105, 180, 0.4); }
    50% { box-shadow: 0 0 30px rgba(255, 105, 180, 1); }
    100% { box-shadow: 0 0 15px rgba(255, 105, 180, 0.4); }
}

.card-header h2 {
    font-family: 'Roboto', Arial, sans-serif;
    font-size: 2.5rem;
    animation: textGlow 2s infinite alternate;
}

@keyframes textGlow {
    from { text-shadow: 0 0 10px rgba(63, 94, 251, 0.7); }
    to { text-shadow: 0 0 30px rgba(63, 94, 251, 1); }
}

/* Card Body */
.card-body {
    padding: 2.5rem;
}

/* Form Controls */
.form-control {
    border-radius: 20px;
    padding: 1rem;
    border: 2px solid #ced4da;
    background-color: rgba(255, 255, 255, 0.85);
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
}

.form-control:focus {
    border-color: #fc466b;
    box-shadow: 0 0 15px rgba(252, 70, 107, 0.8);
    transform: scale(1.1);
}

/* Button Styles */
.btn {
    border-radius: 20px;
    padding: 1rem;
    font-size: 1.2rem;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #fc466b, #3f5efb);
    border: none;
    color: white;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #3f5efb, #fc466b);
    transform: scale(1.1);
    box-shadow: 0 10px 20px rgba(63, 94, 251, 0.8);
}

.btn-success {
    background: linear-gradient(135deg, #00c9ff, #92fe9d);
    border: none;
    color: white;
}

.btn-success:hover {
    background: linear-gradient(135deg, #92fe9d, #00c9ff);
    transform: scale(1.1);
    box-shadow: 0 10px 20px rgba(146, 254, 157, 0.8);
}

.btn-danger {
    background: linear-gradient(135deg, #ff0844, #ffb199);
    border: none;
    color: white;
}

.btn-danger:hover {
    background: linear-gradient(135deg, #ffb199, #ff0844);
    transform: scale(1.1);
    box-shadow: 0 10px 20px rgba(255, 133, 103, 0.8);
}

/* Back Button */
.back-button a {
    color: #fff;
    background: linear-gradient(135deg, #fc466b, #3f5efb);
    padding: 0.75rem 1.5rem;
    border-radius: 20px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
}

.back-button a:hover {
    transform: scale(1.1);
    background: linear-gradient(135deg, #3f5efb, #fc466b);
    box-shadow: 0 10px 20px rgba(63, 94, 251, 0.8);
}

/* Alerts */
.alert-success, .alert-danger {
    border-radius: 20px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    animation: fadeInAlert 1.5s ease-in-out;
}

.alert-success {
    color: #155724;
    background: linear-gradient(135deg, #00c9ff, #92fe9d);
    border: none;
    box-shadow: 0 4px 10px rgba(0, 255, 157, 0.8);
}

.alert-danger {
    color: #721c24;
    background: linear-gradient(135deg, #ff0844, #ffb199);
    border: none;
    box-shadow: 0 4px 10px rgba(255, 133, 103, 0.8);
}

@keyframes fadeInAlert {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Nav Tabs */
.nav-tabs .nav-link {
    color: #3f5efb;
    font-weight: bold;
    transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
}

.nav-tabs .nav-link.active {
    color: #fff;
    background: linear-gradient(135deg, #fc466b, #3f5efb);
    border-color: #3f5efb;
    box-shadow: 0 4px 10px rgba(63, 94, 251, 0.8);
}

.nav-tabs .nav-link:hover {
    color: #fff;
    background: linear-gradient(135deg, #3f5efb, #fc466b);
    box-shadow: 0 6px 20px rgba(63, 94, 251, 0.8);
}

/* Card Footer */
.card-footer {
    background-color: rgba(255, 255, 255, 0.1);
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    padding: 1.5rem;
    text-align: center;
    animation: footerPulse 2s infinite alternate;
}

@keyframes footerPulse {
    0% { background-color: rgba(255, 255, 255, 0.1); }
    50% { background-color: rgba(255, 255, 255, 0.15); }
    100% { background-color: rgba(255, 255, 255, 0.1); }
}

.card-footer a {
    color: #3f5efb;
    font-weight: bold;
    transition: color 0.3s ease, transform 0.3s ease;
}

.card-footer a:hover {
    color: #fc466b;
    transform: scale(1.1);
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
