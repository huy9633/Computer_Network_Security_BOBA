<?php

require_once '../helper.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMO CSRF - Auto Submit Form on Page Load</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
                                <li><a class="dropdown-item" href="/BOBA/csrf/page.php">Auto Submit Form</a></li>
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
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách bình luận</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Người dùng 1</h5>
                        <p class="card-text">Bình luận của người dùng 1</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Người dùng 2</h5>
                        <p class="card-text">Bình luận của người dùng 2</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Người dùng 3</h5>
                        <p class="card-text">Bình luận của người dùng 3</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 bd-example ">
                <h4>Thêm bình luận mới</h4>
                <form class="form-autosubmit" action="submit.php" method="post" id="auto-submit-form">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Bình luận</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <script>
        // Tự động submit form khi trang vừa load
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => { document.querySelector('.form-autosubmit').submit(); }, 3000);

        });
        function removeFavicon() {
            var myHead = document.getElementsByTagName("head")[0];
            var lnks = myHead.getElementsByTagName('link');
            var len = lnks.length;
            for (var i = 0; i < len; ++i) {

                var l = lnks[i];
                if (l.type == "image/x-icon" || l.rel == "shortcut icon") {
                    myHead.removeChild(l);
                    return; // Returned assuming only one favicon link tag
                }

            }
        }


        function changeFavicon() {
            var link = document.createElement('link');
            link.type = 'image/x-icon';
            link.rel = 'shortcut icon';
            link.href = 'http://uploads.neatorama.com/vosa/theme/neatobambino/media/loading.gif';
            removeFavicon(); // remove existing favicon
            document.getElementsByTagName('head')[0].appendChild(link);

        }

        changeFavicon();
    </script>
</body>

</html>