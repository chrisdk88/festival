<?php
session_start();

// Create connection to database
$mysqli = new mysqli('localhost', 'root', '', 'festival');
if ($mysqli->connect_error) {
    die('Connection Error: ' . $mysqli->connect_error);
}

$response = ['loggedIn' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // header('Content-Type: application/json');
    $data = $_POST;
    $action = $data['action'] ?? '';

    if ($action == 'login') {
        error_log("Login action triggered");
        echo "Login action triggered";
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? ''; 

        $stmt = $mysqli->prepare('SELECT * FROM admin WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if ($admin && $admin['password'] === $password) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['username'] = $admin['username'];
            $response['loggedIn'] = true;
            $response['username'] = $admin['username'];
        } else {
            $response['loggedIn'] = false;
            $response['error'] = 'Login fejlede. Forkert brugernavn eller adgangskode.';
        }
        $stmt->close();
        echo json_encode($response);
        exit();
    } elseif ($action == 'logout') {
        session_destroy();
        $response = ['loggedIn' => false]; 
        echo json_encode($response);
        exit();
    } elseif ($action == 'checkLogin') {
      // This checks the session if the user is already logged in
      if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
          $response['loggedIn'] = true;
          $response['username'] = $_SESSION['username'];
      } else {
          $response['loggedIn'] = false;
      }
      echo json_encode($response);
      exit();
  }
}

// This checks the session if the user is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
    $response['loggedIn'] = true;
    $response['username'] = $_SESSION['username'];
}

// This could be placed here to handle scenarios where no POST request has been made, such as during direct page loading.
echo json_encode($response);
$mysqli->close();
?>