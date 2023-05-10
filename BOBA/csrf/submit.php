<?php

require_once '../helper.php';

try {
    csrf_security()->validate();
    $data['content'] = $_POST['comment'];
    $data['username'] = $_SESSION['username'];
    $_SESSION['data'][] = $data;
} catch (Exception $e) {
    flash_message('error', $e->getMessage());
}

redirect('csrf');
