<?php

require_once '../helper.php';

if (!empty($_SESSION['username'])) {
    unset($_SESSION['username']);
}

redirect('csrf');
