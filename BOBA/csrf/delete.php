<?php

require_once '../helper.php';

if (!empty($_SESSION['data'])) {
    unset($_SESSION['data']);
}

redirect('csrf');
