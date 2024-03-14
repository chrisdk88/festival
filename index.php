<?php
session_start();

$dbHost = 'localhost'; // eller IP-adressen på din database-server
$dbUsername = 'root';
$dbPassword = '';
$dbDatabase = 'festival';

// Opret forbindelse
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbDatabase);

// Tjek forbindelsen
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Kontrollerer om formular data er sendt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hent data fra login-formularen
    $formUsername = $_POST['username'];
    $formPassword = $_POST['password']; // Bemærk: I virkelige applikationer bør du hashe og salte passwords.

    // Forbered SQL for at undgå SQL-injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $formUsername, $formPassword);

    // Udfør forespørgslen
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Success, brugernavn og password matcher
        echo "Login succesfuldt!";
        // Her kan du omdirigere brugeren til en anden side eller sætte sessionsvariabler
    } else {
        // Fejl i login
        echo "Forkert brugernavn eller password!";
    }

    $_SESSION['loggedin'] = true;
$_SESSION['username'] = $formUsername; // Gemmer brugernavnet i sessionen

// Redirect til index.php eller en anden sikker side
header('Location: index.php');
exit;


    // Luk forbindelsen
    $stmt->close();
    $conn->close();
} else {
    // Vis login formular, eller andet indhold hvis der ikke er sendt data
    // Husk at beskytte mod direkte adgang til scriptet, hvis det er nødvendigt
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Festival Guiden</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="navbar-brand">
        <img src="images/logo.png" alt="Logo" data-page="home" id="logo">
      </div>
      <div class="navbar-title">
        <h1>Festival Guiden</h1>
      </div>
      <div class="navbar-form">
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <!-- Brugeren er logget ind, vis logud-knappen -->
            <p>Velkommen, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
            <form action="logout.php" method="post">
                <div class="form-group">
                    <input type="submit" value="Log ud">
                </div>
            </form>
        </div>
        <?php else: ?>
            <!-- Login formular -->
            <form action="#" method="post">
            Brugernavn: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>
        <?php endif; ?>
      </div>
    </nav>
  </header>

  <div class="wrapper">
    <div class="test">        
      <ul>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
          <li><a data-page="login">Login</a></li>
          <li><a class="btnEvent" data-page="createEvent">Opret event</a></li>
          <li><a class="btnEvent" data-page="editEvent">Redigere event</a></li>
        <?php else: ?>
          <li><a data-page="login">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>

    <div id="content"></div>  
        </div>
  <footer>
    <h4>Copyright &copy; Festival Guiden 2024</h4>
  </footer>

  <script src="javascript/script.js"></script>
</body>
</html>