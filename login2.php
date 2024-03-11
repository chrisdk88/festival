<?php
// Start session management
session_start();

// Indsæt din databaseforbindelse her
$db = new PDO('mysql:host=localhost;dbname=festival', 'root', '');

// Antag at du får raw JSON data
$json = file_get_contents('php://input');
$data = json_decode($json);

if (isset($data->username) && isset($data->password)) {
    $stmt = $db->prepare('SELECT * FROM admin WHERE username = :username');
    $stmt->execute(array(':username' => $data->username));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Tjek om brugeren findes og adgangskoden er korrekt
    if ($user && $data->password === $user['password']) {
        // Succes! Brugeren er logget ind
        $_SESSION['user'] = $user['username'];
        $response = array('success' => true);
    } else {
        // Fejl i brugernavn eller adgangskode
        $response = array('success' => false, 'message' => 'Invalid credentials');
    }
} else {
    // Fejl i input data
    $response = array('success' => false, 'message' => 'Incomplete request');
}

// Send JSON response tilbage til klienten
header('Content-Type: application/json');
echo json_encode($response);
?>

