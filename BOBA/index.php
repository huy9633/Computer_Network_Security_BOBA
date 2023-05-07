<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ BOBA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .masthead {
            height: 100vh;
            min-height: 500px;
            background-image: url('https://source.unsplash.com/BtbjCFUvBXs/1920x1080');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/BOBA">BOBA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item active">
                        <a class="nav-link active " href="/BOBA">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link " href="/BOBA/csrf">CSRF</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link " href="/BOBA/xss">XSS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="fw-light">Welcome to BOBA</h1>
                    <h2 class="fw-light">Nơi tạo ra những niềm vui</h2>
                    <p class="lead">DEMO 2 ứng dụng lổ hổng Web: CSRF & XSS</p>
                </div>
            </div>
        </div>
    </header>
    <footer class="border-top footer text-muted">
        <p class="text-center text-muted">&copy; 2023 - BOBA</p>

    </footer>
</body>


</html>