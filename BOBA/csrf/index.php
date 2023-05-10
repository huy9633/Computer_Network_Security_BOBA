<?php

require_once '../helper.php';
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
if (empty($_SESSION['data'])) {
    $_SESSION['data'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSRF Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .bd-example {
            padding: 1.5rem;
            margin-right: 0;
            margin-left: 0;
            border-width: 1px;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            border-style: solid;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="/BOBA">BOBA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item active">
                            <a class="nav-link  " href="<?= base_url() ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown  ">
                            <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown">
                                CSRF
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/BOBA/csrf">Form</a></li>
                                <li><a class="dropdown-item" href="/BOBA/csrf/login.php">Login Form</a></li>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="/BOBA/xss">XSS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container ">
<!--        <h1 class="text-center">Demo Form</h1>-->


        <div class="container w-75 pb-3">
            <h2 class=" text-center mb-4">Danh sách bình luận</h2>
            <div class="bd-example col-12" style="margin:auto">
                <?php

                // Hiển thị danh sách bình luận
                echo '<div class="container">';
                echo '<h2>Bình luận</h2>';
                ?>
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body">
                        <span class="mt-0" style="font-weight: bold">CSRF </span>
                            <a href="page.php">click me</a>
                        </div>
                    </div>
                </li>

                <?php foreach ($_SESSION['data'] as $data): ?>
                <li class="list-group-item">
                <?= '<div class="media">' ?>
                <?= '<div class="media-body">' ?>
                <?= '<span class="mt-0" style="font-weight: bold">' . $data['username']  . '</span>' . ": ". $data['content']?>
                <?= '</div>' ?>
                <?= '</div>' ?>
                </li>
                <?php endforeach ?>
                <hr>
                <h3>Thêm bình luận mới</h3>
                <?php if (has_flash_message('msg')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= flash_message('msg') ?>
                    </div>
                <?php endif ?>
                <?php if (has_flash_message('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= flash_message('error') ?>
                    </div>
                <?php endif ?>
                <form action="<?= base_url('csrf/submit.php') ?>" method="POST">
                    <?= csrf_security()->generateInput() ?>
                    <div class="form-group mb-3">
                        <label for="comment">Bình luận:</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                    <a href="<?= base_url('csrf/delete.php') ?>" class="btn btn-danger">Delete All</a>
                    <a href="<?= base_url('csrf/logout.php') ?>" class="btn btn-danger">Logout</a>
                </form>
            </div>
        </div>
    </div>
    <footer class="border-top footer text-muted">
        <p class="text-center text-muted">&copy; 2023 - BOBA</p>
    </footer>
</body>

</html>
