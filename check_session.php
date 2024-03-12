<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    // User is logged in
    $response = array(
        'loggedIn' => true,
        'username' => $_SESSION['username'] 
    );
} else {
    $response = array('loggedIn' => false);
}

header('Content-Type: application/json');

echo json_encode($response);
?>
