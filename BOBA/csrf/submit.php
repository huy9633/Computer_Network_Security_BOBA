<?php

require_once '../helper.php';

try {
    csrf_security()->validate();
    
    $email = $_POST['username'];
    flash_message('msg', "Success submit! Hello $email");
} catch (Exception $e) {
    flash_message('error', $e->getMessage());
}

redirect('csrf');