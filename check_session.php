<?php
session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
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
