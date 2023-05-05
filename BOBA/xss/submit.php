<?php

require_once '../helper.php';

try {
    csrf_security()->validate(); 

    $post = $_POST;
    // $post = XSSParser::parser($post);

    $_SESSION['contents'][] = $post['content'];

    flash_message('msg', "Success submit!");
} catch (Exception $e) {
    flash_message('error', $e->getMessage());
}

redirect('xss');