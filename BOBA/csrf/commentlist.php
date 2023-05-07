<?php

require_once '../helper.php';

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
                                <li><a class="dropdown-item" href="/BOBA/csrf/commentlist.php">Comment List Form</a>
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
    <div class="container w-75 pb-3">
        <h2 class=" text-center mb-4">Danh sách bình luận</h2>
        <div class="bd-example col-12" style="margin:auto">
            <?php
            //session_start();
            
            // Khởi tạo danh sách bình luận nếu chưa có
            if (!isset($_SESSION['comments'])) {
                $_SESSION['comments'] = array();
            }

            // Kiểm tra nếu người dùng đã thêm bình luận mới
            if (isset($_POST['submit_comment'])) {
                // Lấy thông tin bình luận từ form
                $name = $_POST['name'];
                $comment = $_POST['comment'];
                $image = $_POST['image'];

                // Tạo một bình luận mới và thêm vào danh sách
                $new_comment = array(
                    'name' => $name,
                    'comment' => $comment,
                    'image' => $image
                );
                array_push($_SESSION['comments'], $new_comment);
            }

            // Hiển thị danh sách bình luận
            echo '<div class="container">';
            echo '<h2>Bình luận</h2>';

            if (empty($_SESSION['comments'])) {
                echo '<p>Chưa có bình luận nào.</p>';
            } else {
                foreach ($_SESSION['comments'] as $comment) {
                    echo '<div class="media">';
                    echo '<img src="' . $comment['image'] . '" class="mr-3" alt="Ảnh đại diện">';
                    echo '<div class="media-body">';
                    echo '<h5 class="mt-0">' . $comment['name'] . '</h5>';
                    echo $comment['comment'];
                    echo '</div>';
                    echo '</div>';
                }
            }

            // // Form thêm mới bình luận
            // echo '<hr>';
            // echo '<h3>Thêm bình luận mới</h3>';
            // echo '<form method="POST">';
            // echo '<div class="form-group mb-3">';
            // echo '<label for="comment">Bình luận:</label>';
            // echo '<textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>';
            // echo '</div>';
            // echo '<button type="submit" class="btn btn-primary" name="submit_comment">Gửi</button>';
            // echo '</form>';
            // echo '</div>';
            ?>
            <hr>
            <h3>Thêm bình luận mới</h3>
            <form method="POST">
                <div class="form-group mb-3">
                    <label for="comment">Bình luận:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </form>
            <?php 

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $comment = $_POST['comment'];

                if (!empty($name) && !empty($comment)) {
                    $commentData = array(
                        'name' => $name,
                        'comment' => $comment
                    );

                    if (!isset($_SESSION['comments'])) {
                        $_SESSION['comments'] = array();
                    }

                    array_push($_SESSION['comments'], $commentData);
                }
            }
            ?>

        </div>
    </div>
    <footer class="border-top footer text-muted">
        <p class="text-center text-muted">&copy; 2023 - BOBA</p>

    </footer>
</body>

</html>