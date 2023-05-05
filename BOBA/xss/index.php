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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <a href="<?= base_url() ?>">Home</a>
        <hr>
        <h2>Demo Form</h2>
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
        <div class="row mb-3">
            <div class="col-md-5 col-lg-4">
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
        </div>
        <ul class="list-group">
            <?php foreach($_SESSION['contents'] as $content) : ?>
                <li class="list-group-item">
                    <?= $content ?>    
                    <!-- <?= XSSParser::get($content) ?> -->
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</body>
</html>
