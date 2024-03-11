<?php
// Start session management
session_start();

// Indsæt din databaseforbindelse her
$db = new PDO('mysql:host=localhost;dbname=festival', 'root', '');

// Antag at du får raw JSON data
$json = file_get_contents('php://input');
$data = json_decode($json);

$response = array('success' => false, 'message' => 'An error occurred');

if (!empty($data->username) && !empty($data->password)) {
    // Forbered SQL-statement med brugernavn for at undgå SQL injection
    $stmt = $db->prepare('SELECT * FROM admin WHERE username = :username');
    $stmt->execute(array(':username' => $data->username));

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Tjek om adgangskoderne matcher
        if ($user['password'] === $data->password) {
            // Adgangskoden matcher, brugeren er logget ind
            $_SESSION['user'] = $user['username'];
            $response = array('success' => true, 'message' => 'Logged in successfully');
        } else {
            // Adgangskoden matcher ikke
            $response = array('success' => false, 'message' => 'Invalid credentials');
        }
    } else {
        // Brugernavn findes ikke
        $response = array('success' => false, 'message' => 'User does not exist');
    }
} else {
    // Mangler brugernavn eller adgangskode
    $response = array('success' => false, 'message' => 'Incomplete request');
}

// Send JSON response tilbage til klienten
header('Content-Type: application/json');
echo json_encode($response);
?>
