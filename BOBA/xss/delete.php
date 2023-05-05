<?php

require_once '../helper.php';

if (!empty($_SESSION['contents'])) {
    unset($_SESSION['contents']);
}

redirect('xss');