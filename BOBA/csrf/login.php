<?php
require_once '../helper.php';
//include_once 'dbConnection.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = addslashes($data);
//    $data = htmlspecialchars($data);
    return $data;
}
if(isset($_SESSiON[username])){
    header("location: index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
//    $password=md5($password);
//    $result = mysqli_query($con,"SELECT username FROM user WHERE username = '$username' and password = '$password'");
//    $count=mysqli_num_rows($result);
    if($username == "thinh" || $username == "huy"|| $username == "my" || $username == "thang"|| $username == "hung" && $password = "123456"){
        $_SESSION['username'] = $username;
        session_start();
        if (session_start()) {
            setcookie($sess_name, session_id(), null, '/', null, null, true);
        }
        header("location: index.php");
    }else{
        flash_message('error', "Wrong Username or Password");
    }
//    if($count == 1) {
//        while ($row = mysqli_fetch_array($result)) {
//            $username = $row['username'];
//            $avt = $row['avt'];
//        }
//        $_SESSION['username'] = $username;
//        $_SESSION['avt'] = $avt;
//        session_start();
//        header("location: index.php");
//    }else{
//        flash_message('error', "Wrong Username or Password");
//    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSRF Login Demo</title>
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

        .text-theme {
            color: #5369f8 !important;
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
    <div class="container w-50 pb-3">
        <h1 class="text-center">Demo Form</h1>
        <div class="row justify-content-center mt-5">
            <div class="bd-example col-lg-6" style="margin:auto">
                <h3 class="text-center mb-3 h4 font-weight-bold text-theme">Đăng nhập</h3>
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
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid gap-2 col-9 mx-auto">
                        <button type="submit" class="btn btn-primary ">Tiếp Tục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="border-top footer text-muted">
        <p class="text-center text-muted">&copy; 2023 - BOBA</p>

    </footer>
</body>

</html>
