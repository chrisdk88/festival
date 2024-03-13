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
  <title>Festival</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="navbar-brand">
        <img src="images/logo.png" alt="Logo" data-page="home" id="logo">
      </div>
      <div class="navbar-title">
        <h1>Festival ting</h1>
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
        <li><a href="#" data-page="home">Hjem</a></li>
        <li><a href="#" data-page="about">Om Os</a></li>
        <li><a href="#" data-page="contact">Kontakt</a></li>
        <li><a href="#" data-page="login">Login</a></li>
      </ul>
    </div>

    <div class="containerEvent">
      <div class="headerEvent">
        <h2>THY ROCK</h2>
      </div>
      <div class="side-by-side-container">
        <div class="left-side-top">
          <div class="gallery">
            <h4>Galleri</h4>
            <h4>1/1</h4>
              <div class="image-slider">
                <div class="arrow left-arrow">&lt;</div>
                <img src="images/Thy-Rock-scene.jpg" alt="">
                <div class="arrow right-arrow">&gt;</div>
              </div>
          </div>
        </div>
        <div class="right-side-top">
          <div class="info">
            <h5>Info:</h5>
            <p>Thy Rock er en stor poprock-festival, der siden år 2000 har været afholdt på dyrskue-pladsen i Thisted.</p>
            <h5>Dato:</h5>
            <p>28 til d. 29 juni</p>
          </div>
          <div class="ticket-info">
            <h4>Billetter</h4>
            <div class="ticketEvent">
              <h5>1-dags billet:</h5>
              <h5>249,-</h5>
            </div>
            <div class="ticketEvent">
              <h5>Alle-dags billet:</h5>
              <h5>499,-</h5>
            </div>
            <div class="ticketEvent">
              <h5>VIP billet:</h5>
              <h5>999,-</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="artist-list">
        <h3>Artister:</h3>
        <ul>
          <li>TOBIAS RAHIM</li>
          <li>SUSPEKT</li>
          <li>RASMUS SEEBACH</li>
          <li>BENJAMIN HAV & FAMILIEN</li>
          <li>D-A-D</li>
          <li>HUGORM</li>
          <li>JONAH BLACKSMITH</li>
          <li>INFERNAL</li>
          <li>KANDIS</li>
          <li>MD-DUO</li>
          <li>KREBSFALCH</li>
          <li>LIS SØRENSEN</li>
          <li>MAANELAND</li>
          <li>RED SOLARNA</li>
          <li>INDIAN CANE</li>
          <li>ROYA</li>
          <li>BESKIDT</li>
        </ul>
      </div>
      <div class="side-by-side-container-bottom">
        <div class="left-side-bottom">
          <a href="#" class="eventBtn">Create Comment</a>
          <a href="#" class="eventBtn">Read Comment</a>
        </div>
        <div class="right-side-bottom">
          <div class="rating">
            <h3>Rating</h3>
            <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
            <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
            <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
            <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
          </div>
        </div>
      </div>
    </div>
    
    <div class="ad"></div>
  </div>

  <!-- This script is only for testing how changing innerhtml it working -->
  <script src="javascript/script.js"></script>
</body>
</html>