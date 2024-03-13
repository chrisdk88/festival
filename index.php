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

<script>
    function toggleComments(boxNumber) {
      var comments = document.getElementById('comments_' + boxNumber);
      if (comments.style.display === 'none') {
        comments.style.display = 'block';
      } else {
        comments.style.display = 'none';
      }
    }
  </script>
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
            <p>28 juni til d. 29 juni</p>
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
          <a href="#" class="eventBtn"onclick="toggleComments(1)">Kommentar</a>
        </div>
        <div class="right-side-bottom">
          <div class="rating">
            <h3>Rating</h3>
            <input type="radio" id="star5_1" name="rating_1" value="5"><label for="star5_1"></label>
            <input type="radio" id="star4_1" name="rating_1" value="4"><label for="star4_1"></label>
            <input type="radio" id="star3_1" name="rating_1" value="3"><label for="star3_1"></label>
            <input type="radio" id="star2_1" name="rating_1" value="2"><label for="star2_1"></label>
            <input type="radio" id="star1_1" name="rating_1" value="1"><label for="star1_1"></label>
          </div>
        </div>
        
      </div>
      <div class="comments" id="comments_1" style="display: none;">
  <div class="comment-box">
                <textarea  rows="1" cols="500" placeholder="Dit navn"></textarea>
                <textarea rows="4" cols="500" placeholder="Skriv en kommentar"></textarea>                
                <button onclick="submitComment(1)">Indsend</button>
            </div>
    <div class="comment">
        <p><strong>Betina:</strong> Jeg gælder mig til THY rock</p>
    </div>
    <div class="comment">
        <p><strong>Karsten:</strong>Jeg glæder mig så maget til at høre SUSPEKT</p>
    </div>
    <div class="comment">
        <p><strong>Pia:</strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere perferendis obcaecati quibusdam ipsam soluta commodi fugit quasi incidunt excepturi? Illum hic ipsa ipsam aperiam, nesciunt, repellat facere veniam quidem tempore ea saepe a id corrupti, accusantium ex ipsum soluta! Voluptatem placeat, facere illum quisquam vero vel illo laudantium libero, accusamus cumque, veritatis iure nesciunt sint autem suscipit temporibus corporis harum dolore perferendis numquam. Modi vitae quo ipsum hic dolore at eos facere, excepturi distinctio molestiae, quas odio! Labore vitae excepturi non fuga voluptates enim magnam, nam iusto voluptate sunt rem, assumenda libero ipsa eum explicabo dolores incidunt ea. Neque, molestiae veritatis repellat ut sequi animi obcaecati praesentium porro nemo placeat quia explicabo minus repellendus facilis? Amet non nemo dolorem error aperiam incidunt sint totam quod voluptatibus, vel numquam modi consequatur blanditiis adipisci commodi iure fugiat suscipit! Rem saepe modi dolor sint ut sunt tenetur debitis, quisquam repellendus dicta, commodi inventore quo pariatur laboriosam veritatis quos excepturi molestias quis earum fugit officiis perspiciatis odio labore. Illo ullam at cupiditate, voluptatum quibusdam omnis corporis sequi accusantium? Magnam numquam fuga suscipit possimus sint. Eveniet nisi, quidem maiores fugit doloribus in facere eum, amet placeat odit beatae ut quia distinctio, vero laudantium magnam hic quam saepe ex inventore asperiores perspiciatis dolor quasi cum. Dignissimos atque ducimus harum. Doloribus labore dolores id earum neque sed nobis totam eveniet. Est, quod iusto laboriosam, unde vero quibusdam neque, fuga asperiores ex quisquam optio architecto commodi aperiam explicabo libero cum corporis quae similique mollitia incidunt? Est facilis accusantium ea suscipit quae itaque ullam sint placeat et magnam excepturi magni hic, nulla non odio quibusdam. Dolore optio aut eligendi! Maxime, doloribus ipsa sapiente aliquid esse odio tempora, a eius adipisci iste, sit harum impedit animi provident aliquam ipsum! Perferendis blanditiis officia velit porro, aut enim necessitatibus fugit? Odit quam omnis aliquid debitis, dolorem necessitatibus aperiam. Debitis dolorum molestiae earum, libero, dignissimos numquam dicta iure quia delectus iusto odio nostrum porro explicabo velit obcaecati accusantium necessitatibus aspernatur alias voluptates reprehenderit fugiat hic repudiandae optio. Dignissimos aut odio quos praesentium ducimus, quam itaque? Ullam, nesciunt. Ducimus officia, alias voluptate possimus eveniet animi sequi quos, accusantium repellat pariatur excepturi accusamus explicabo quaerat molestiae. Labore et officiis placeat atque consectetur a repudiandae praesentium quidem dicta incidunt quod officia nostrum, voluptatem ex corporis! Ullam dicta, inventore aliquid quia repellendus magni perferendis exercitationem cum modi pariatur ducimus culpa commodi, libero quae beatae! Quam quas at dolores porro. Facere eum possimus sapiente blanditiis laboriosam in necessitatibus ipsa tempora expedita, fugit voluptatibus porro non quis. Quas exercitationem at deleniti deserunt voluptate, mollitia dolore quasi pariatur magni ipsam voluptatem totam nesciunt in numquam! Totam voluptas fugiat dolore quae ratione, vero ullam, temporibus doloribus consequuntur hic sequi mollitia similique perferendis debitis ad officia exercitationem dicta doloremque ut aspernatur veniam? Iste quaerat porro vero magni eveniet maxime, earum nam labore beatae nobis illo tempora in recusandae voluptatum necessitatibus rem nemo, ex quos, facere eligendi! Voluptatibus quia vero neque, labore, dolorem nobis architecto pariatur nihil omnis accusantium eos aspernatur iste. Blanditiis.</p>
    </div>
    <div class="comment">
        <p><strong>Bob:</strong> Så har man købt 5 VIP billet</p>
    </div>
    <div class="comment">
        <p><strong>John Johnsen:</strong> er der nogle der vil købe billet til mig</p>
    </div>
           
        </div>

    </div>
    <div class="containerEvent">
      <div class="headerEvent">
        <h2>ROSKILDE FESTIVAL</h2>
      </div>
      <div class="side-by-side-container">
        <div class="left-side-top">
          <div class="gallery">
            <h4>Galleri</h4>
            <h4>1/1</h4>
              <div class="image-slider">
                <div class="arrow left-arrow">&lt;</div>
                <img src="images/roskilde.jpg" alt="">
                <div class="arrow right-arrow">&gt;</div>
              </div>
          </div>
        </div>
        <div class="right-side-top">
          <div class="info">
            <h5>Info:</h5>
            <p>Roskilde Festival er en af de ældste og mest berømte musikfestivaler i Danmark. Festivalen er kendt for sin brede musikdækning, fra rock til elektronisk musik og alt derimellem. Udover musikken fokuserer festivalen også på samfundsengagement og velgørenhed.</p>
            <h5>Dato:</h5>
            <p>29 juni til d. 6 juli</p>
          </div>
          <div class="ticket-info">
            <h4>Billetter</h4>
            <div class="ticketEvent">
              <h5>1-dags billet:</h5>
              <h5>199,-</h5>
            </div>
            <div class="ticketEvent">
              <h5>Alle-dags billet:</h5>
              <h5>799,-</h5>
            </div>
            <div class="ticketEvent">
              <h5>VIP billet:</h5>
              <h5>1199,-</h5>
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
          <a href="#" class="eventBtn"onclick="toggleComments(2)">Kommentar</a>
        </div>
        <div class="right-side-bottom">
          <div class="rating">
            <h3>Rating</h3>
            <input type="radio" id="star5_2" name="rating_2" value="5"><label for="star5_2"></label>
            <input type="radio" id="star4_2" name="rating_2" value="4"><label for="star4_2"></label>
            <input type="radio" id="star3_2" name="rating_2" value="3"><label for="star3_2"></label>
            <input type="radio" id="star2_2" name="rating_2" value="2"><label for="star2_2"></label>
            <input type="radio" id="star1_2" name="rating_2" value="1"><label for="star1_2"></label>
          </div>
        </div>
      </div>
      <div class="comments" id="comments_2" style="display: none;">
  <div class="comment-box">
                <textarea  rows="1" cols="500" placeholder="Dit navn"></textarea>
                <textarea rows="4" cols="500" placeholder="Skriv en kommentar"></textarea>
                <button onclick="submitComment(2)">Indsend</button>
            </div>
    <div class="comment">
        <p><strong>User1:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    <div class="comment">
        <p><strong>User2:</strong> Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="comment">
        <p><strong>User3:</strong> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div class="comment">
        <p><strong>User4:</strong> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="comment">
        <p><strong>User5:</strong> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
           
        </div>
    </div>
    
    <div class="ad"></div>

    <div class="containerEvent">
      <div class="headerEvent">
        <h2>GRENÅ BEACH PARTY</h2>
      </div>
      <div class="side-by-side-container">
        <div class="left-side-top">
          <div class="gallery">
            <h4>Galleri</h4>
            <h4>1/1</h4>
              <div class="image-slider">
                <div class="arrow left-arrow">&lt;</div>
                <img src="images/abc.jpg" alt="">
                <div class="arrow right-arrow">&gt;</div>
              </div>
          </div>
        </div>
        <div class="right-side-top">
          <div class="info">
            <h5>Info:</h5>
            <p>Over 10.000 festglade koncertgæster besøger hvert år Grenaa Strand, hvor Radio ABC holder årets fedeste fest – nemlig ABC Beach Party.
            I mere end 20 år har Radio ABC Beach Party hver sommer skabt fest, glæde og fede oplevelser for tusindvis af koncertgæster, som på meget kort tid får hørt en masse god musik.</p>
            <h5>Dato:</h5>
            <p>13 juli</p>
          </div>
          <div class="ticket-info">
            <h4>Billetter</h4>
            <div class="ticketEvent">
              <h5>1-dags billet:</h5>
              <h5>349,-</h5>
            </div>
            <div class="ticketEvent">
              <h5>Alle-dags billet:</h5>
              <h5></h5>
            </div>
            <div class="ticketEvent">
              <h5>VIP billet:</h5>
              <h5>799,-</h5>
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
          <a href="#" class="eventBtn"onclick="toggleComments(3)">Kommentar</a>
        </div>
        <div class="right-side-bottom">
          <div class="rating">
            <h3>Rating</h3>
            <input type="radio" id="star5_3" name="rating_3" value="5"><label for="star5_3"></label>
            <input type="radio" id="star4_3" name="rating_3" value="4"><label for="star4_3"></label>
            <input type="radio" id="star3_3" name="rating_3" value="3"><label for="star3_3"></label>
            <input type="radio" id="star2_3" name="rating_3" value="2"><label for="star2_3"></label>
            <input type="radio" id="star1_3" name="rating_3" value="1"><label for="star1_3"></label>
          </div>
        </div>
      </div>
      <div class="comments" id="comments_3" style="display: none;">
  <div class="comment-box">
  <textarea  rows="1" cols="500" placeholder="Dit navn"></textarea>
                <textarea rows="4" cols="500" placeholder="Skriv en kommentar"></textarea>             
                   <button onclick="submitComment(3)">Indsend</button>
            </div>
    <div class="comment">
        <p><strong>User1:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    <div class="comment">
        <p><strong>User2:</strong> Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="comment">
        <p><strong>User3:</strong> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div class="comment">
        <p><strong>User4:</strong> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <div class="comment">
        <p><strong>User5:</strong> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
           
        </div>
    </div>
    
  </div>

  <footer>
    <h4>Copyright &copy; Festival Guiden 2024</h4>
  </footer>

  <script src="javascript/script.js"></script>
</body>
</html>