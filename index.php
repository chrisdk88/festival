<?php
session_start();

// Erstat disse værdier med dine databaseoplysninger
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'festival';

// Opret forbindelse til databasen
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Tjek forbindelsen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Modtag brugernavn og password fra formen
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Forbered en SQL-forespørgsel for at søge efter brugeren i databasen
    $query = "SELECT id FROM admin WHERE username = '$username' AND password = '$password'";

    // Udfør forespørgslen
    $result = $conn->query($query);

    // Tjek om brugeren findes
    if ($result->num_rows == 1) {
        // Brugeren er fundet, start en session
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
    } else {
        // Fejl i login
        echo "Dit brugernavn eller kodeord er forkert.";
    }
}

echo "<pre>";
print_r($_POST);
echo "</pre>";

$conn->close();
?>

<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Festival</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
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
        <form action="logout.php" method="post">
            <div class="form-group">
                <input type="submit" value="Log ud">
            </div>
        </form>
    <?php else: ?>
        <!-- Login formular -->
        <form action="#" method="post">
            <div class="form-group">
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" id="loginbtn" value="Login">
            </div>
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
      </ul>
    </div>

    <div id="content">
      <h1>Virker dette?</h1>
      <p>Her finder du de bedste festivals</p>
      <div class="box-container">
    <div class="box">
      <img src="images/logo.png" alt="Example Image">
      <button class="comment-button">Kommentar</button>

      <div class="box-info">
        <h2>Information Title</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora exercitationem suscipit quibusdam, ad eius eum modi repudiandae, alias voluptas, provident doloribus libero? Sequi sapiente quas excepturi debitis error reprehenderit labore non odio similique quos ipsa quisquam obcaecati aut, quibusdam dolores vero at aliquam nulla in rem sunt, modi nihil? Ullam cum officiis tempore eligendi iste, accusamus voluptatibus quae nisi eum velit deleniti placeat, consequatur officia fugiat numquam, similique est ea soluta aperiam repudiandae aspernatur. Debitis saepe voluptatem asperiores harum molestias, doloremque eaque, nobis modi minima voluptatibus voluptatum culpa optio, soluta reprehenderit obcaecati ab? Pariatur aliquid placeat nam maxime veniam aspernatur doloremque repellendus sapiente doloribus asperiores modi esse iusto, facere exercitationem earum voluptate perspiciatis rerum recusandae repudiandae vel ea nisi. Hic, et molestiae vitae distinctio doloribus nulla ex harum quas ratione quae voluptas eveniet nihil rem impedit facere eaque ut quos ipsam? Quo, porro explicabo. Vitae libero blanditiis similique eligendi optio modi quae natus suscipit maiores incidunt minima repudiandae veniam nisi vel, inventore necessitatibus laborum voluptate deserunt esse. Molestiae rem itaque quisquam, assumenda doloribus commodi modi! Cumque sapiente illum voluptatum dicta ut soluta laboriosam, expedita,</p>
      </div>
      <div class="rating">
      <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
      <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
      <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
      <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
      <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
    </div>
    </div>
  </div>
  <div class="box-container">
    <div class="box">
      <img src="images/logo.png" alt="Example Image">
      <button class="comment-button">Kommentar</button>
 
      <div class="box-info">
        <h2>Information Title</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora exercitationem suscipit quibusdam, ad eius eum modi repudiandae, alias voluptas, provident doloribus libero? Sequi sapiente quas excepturi debitis error reprehenderit labore non odio similique quos ipsa quisquam obcaecati aut, quibusdam dolores vero at aliquam nulla in rem sunt, modi nihil? Ullam cum officiis tempore eligendi iste, accusamus voluptatibus quae nisi eum velit deleniti placeat, consequatur officia fugiat numquam, similique est ea soluta aperiam repudiandae aspernatur. Debitis saepe voluptatem asperiores harum molestias, doloremque eaque, nobis modi minima voluptatibus voluptatum culpa optio, soluta reprehenderit obcaecati ab? Pariatur aliquid placeat nam maxime veniam aspernatur doloremque repellendus sapiente doloribus asperiores modi esse iusto, facere exercitationem earum voluptate perspiciatis rerum recusandae repudiandae vel ea nisi. Hic, et molestiae vitae distinctio doloribus nulla ex harum quas ratione quae voluptas eveniet nihil rem impedit facere eaque ut quos ipsam? Quo, porro explicabo. Vitae libero blanditiis similique eligendi optio modi quae natus suscipit maiores incidunt minima repudiandae veniam nisi vel, inventore necessitatibus laborum voluptate deserunt esse. Molestiae rem itaque quisquam, assumenda doloribus commodi modi! Cumque sapiente illum voluptatum dicta ut soluta laboriosam, expedita,</p>
      </div>
      <div class="rating">
      <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
      <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
      <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
      <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
      <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
    </div>
    </div>
  </div>
  <div class="ad">
</div>
  <div class="box-container">
    <div class="box">
      <img src="images/logo.png" alt="Example Image">
      <button class="comment-button">Kommentar</button>
 
      <div class="box-info">
        <h2>Information Title</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora exercitationem suscipit quibusdam, ad eius eum modi repudiandae, alias voluptas, provident doloribus libero? Sequi sapiente quas excepturi debitis error reprehenderit labore non odio similique quos ipsa quisquam obcaecati aut, quibusdam dolores vero at aliquam nulla in rem sunt, modi nihil? Ullam cum officiis tempore eligendi iste, accusamus voluptatibus quae nisi eum velit deleniti placeat, consequatur officia fugiat numquam, similique est ea soluta aperiam repudiandae aspernatur. Debitis saepe voluptatem asperiores harum molestias, doloremque eaque, nobis modi minima voluptatibus voluptatum culpa optio, soluta reprehenderit obcaecati ab? Pariatur aliquid placeat nam maxime veniam aspernatur doloremque repellendus sapiente doloribus asperiores modi esse iusto, facere exercitationem earum voluptate perspiciatis rerum recusandae repudiandae vel ea nisi. Hic, et molestiae vitae distinctio doloribus nulla ex harum quas ratione quae voluptas eveniet nihil rem impedit facere eaque ut quos ipsam? Quo, porro explicabo. Vitae libero blanditiis similique eligendi optio modi quae natus suscipit maiores incidunt minima repudiandae veniam nisi vel, inventore necessitatibus laborum voluptate deserunt esse. Molestiae rem itaque quisquam, assumenda doloribus commodi modi! Cumque sapiente illum voluptatum dicta ut soluta laboriosam, expedita,</p>
      </div>
      <div class="rating">
      <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
      <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
      <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
      <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
      <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
    </div>
    </div>
  </div>
    </div>
  </div>

  <script src="javascript/script.js"></script>
</body>
</html>