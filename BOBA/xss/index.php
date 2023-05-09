<?php

require_once '../helper.php';

if (empty($_SESSION['contents'])) {
    $_SESSION['contents'] = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Demo</title>
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
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown">
                                CSRF
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/BOBA/csrf">Form</a></li>
                                <li><a class="dropdown-item" href="/BOBA/csrf/login.php">Login Form</a></li>
                                <li><a class="dropdown-item" href="/BOBA/csrf/commentlist.php">Comment List Form</a>
                                </li>
                                <li><a class="dropdown-item" href="/BOBA/csrf/page.php">Auto Submit Form</a></li>
                            </ul>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link active " href="/BOBA/xss">XSS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container w-50 pb-3">
        <h1 class="text-center">Demo Form</h1>
        <?php if (has_flash_message('msg')): ?>
            <div class="alert alert-success" role="alert">
                <?= flash_message('msg') ?>
            </div>
        <?php endif ?>
        <?php if (has_flash_message('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= flash_message('error') ?>
            </div>
        <?php endif ?>
        <div class="bd-example mb-3" style="margin:auto">
            <form action="<?= base_url('xss/submit.php') ?>" method="POST">
                <?= csrf_security()->generateInput() ?>
                <div class="mb-3">
                    <label for="exampleInputContent" class="form-label">Content</label>
                    <textarea class="form-control" id="exampleInputContent" name="content" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('xss/delete.php') ?>" class="btn btn-danger">Delete All</a>
            </form>
        </div>
        <ul class="list-group">
            <?php foreach ($_SESSION['contents'] as $content): ?>
                <li class="list-group-item">
                    <?= $content ?>
                    <!-- <?= XSSParser::get($content) ?> -->
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <footer class="border-top footer text-muted">
        <p class="text-center text-muted">&copy; 2023 - BOBA</p>

    </footer>
</body>

</html>