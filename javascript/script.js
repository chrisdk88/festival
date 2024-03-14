document.addEventListener("DOMContentLoaded", function () {
  // Function to update the content
  function updateContent(page) {
    const content = document.getElementById("content");
    switch (page) {
      case "home":
        content.innerHTML = `
          <!-- THY ROCK -->
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
                  <!-- comment formular -->
      <div class="comments" id="comments_1" style="display: none;">
        <div class="comment-box">
                  <textarea name="name" rows="1" cols="30" placeholder="Dit navn"></textarea>
                  <textarea name="comment" rows="4" cols="500" placeholder="Tilføj din kommentar her..."></textarea>             
                  <button onclick="submitComment(1)">Indsend</button>
        </div>
        <div class="comment">
            <p><strong>Betina: </strong>Jeg gælder mig til THY rock</p>
        </div>
        <div class="comment">
            <p><strong>Karsten: </strong>Jeg glæder mig så maget til at høre SUSPEKT</p>
        </div>
        <div class="comment">
            <p><strong>Pia: </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere perferendis obcaecati quibusdam ipsam soluta commodi fugit quasi incidunt excepturi? Illum hic ipsa ipsam aperiam, nesciunt, repellat facere veniam quidem tempore ea saepe a id corrupti, accusantium ex ipsum soluta! Voluptatem placeat, facere illum quisquam vero vel illo laudantium libero, accusamus cumque, veritatis iure nesciunt sint autem suscipit temporibus corporis harum dolore perferendis numquam. Modi vitae quo ipsum hic dolore at eos facere, excepturi distinctio molestiae, quas odio! Labore vitae excepturi non fuga voluptates enim magnam, nam iusto voluptate sunt rem, assumenda libero ipsa eum explicabo dolores incidunt ea. Neque, molestiae veritatis repellat ut sequi animi obcaecati praesentium porro nemo placeat quia explicabo minus repellendus facilis? Amet non nemo dolorem error aperiam incidunt sint totam quod voluptatibus, vel numquam modi consequatur blanditiis adipisci commodi iure fugiat suscipit! Rem saepe modi dolor sint ut sunt tenetur debitis, quisquam repellendus dicta, commodi inventore quo pariatur laboriosam veritatis quos excepturi molestias quis earum fugit officiis perspiciatis odio labore.</p>
        </div>
        <div class="comment">
            <p><strong>Bob: </strong> Så har man købt 5 VIP billet</p>
        </div>
        <div class="comment">
            <p><strong>John Johnsen: </strong> er der nogle der vil købe billet til mig</p>
        </div>       
      </div>
    </div>

    <!-- ROSKILDE FESTIVAL -->
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
                  <textarea name="name" rows="1" cols="30" placeholder="Dit navn"></textarea>
                  <textarea name="comment" rows="4" cols="500" placeholder="Tilføj din kommentar her..."></textarea>     
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

    <!-- Sponsor -->
    <div class="containerEvent sponsor">
      <div class="sponsorText">
        <h3 class="centerText">Sponsor Placeholder</h3>
      </div>
    </div>

    <!-- GRENÅ BEACH PARTY -->
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
          <textarea name="name" rows="1" cols="30" placeholder="Dit navn"></textarea>
          <textarea name="comment" rows="4" cols="500" placeholder="Tilføj din kommentar her..."></textarea>                 
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
          `;
        break;
      case "about":
        content.innerHTML =
          "<h1>Om os</h1><p>Her finder du de bedste festivals</p>";
        break;
      case "contact":
        content.innerHTML =
          "<h1>Kontakt</h1><p>Her finder du de bedste festivals</p>";
        break;
      case "login":
        content.innerHTML = `
                  <h1 id="textLogin">Admin login</h1>
                  <form action="index.php" id="loginForm2" method="post" onsubmit="submitLogin(event);">
                  <div class="form-group2">
                    <label for="loginUsername">Brugernavn:</label>
                    <input type="text" id="loginUsername" name="username" placeholder="Indtast brugernavn">
                  </div>
                  <div class="form-group2">
                    <label for="loginPassword">Adgangskode:</label>
                    <input type="password" id="loginPassword" name="password" placeholder="Indtast adgangskode">
                  </div>
                  <div class="form-group2">
                    <button type="submit">Log ind</button>
                  </div>
                </form>`;
        break;
      case "createEvent":
        content.innerHTML = `
        <!-- Create event -->
        <div class="containerEvent eventH4">
          <h2>Tilføj event.</h2>
          <div class="titleCreateEvent">
            <h3>Titel</h3>
            <input type="text" placeholder="Titel navn">
          </div>
          <div class="topCreateEvent">
            <div class="leftTopCreateEvent">
              <h4>Start dato</h4>
              <input type="date">
              <h4>Slut dato</h4>
              <input type="date">
            </div>
            <div class="rightTopCreateEvent">
              <h4>1-dags billet</h4>
              <input type="text">
              <h4>Alle-dags billet</h4>
              <input type="text">
              <h4>VIP billet</h4>
              <input type="text">
            </div>
          </div>
    
          <div class="topCreateEvent">
            <div class="leftTopCreateEvent">
              <h4>Beskrivelse af event</h4>
              <textarea rows="4" type="text"></textarea>
            </div>
            <div class="rightTopCreateEvent">
              <h4>Tilføj artister (komma separeret)</h4>
              <textarea rows="4" type="text"></textarea>
            </div>
          </div>
    
          <div class="bottonCreateEvent">
            <div class="leftBottomCreateEvent">
              <h4>Tilføj billede</h4>
              <input type="file">
            </div>
            <div class="rightBottomCreateEvent">
              <h4>Tilføjet billeder</h4>
              <p>Når man tilføjer et eller flere billeder, så kommer der miniature udgave af billederne.</p>
            </div>
          </div>
        </div>`;
        break;
      case "editEvent":
        content.innerHTML = `
        <!-- Edit event -->
    <div class="containerEvent eventH4">
      <h2>Tilføj event.</h2>
      <div class="titleCreateEvent">
        <h3>Titel</h3>
        <input type="text" placeholder="Titel navn" value="abc">
      </div>
      <div class="topCreateEvent">
        <div class="leftTopCreateEvent">
          <h4>Start dato</h4>
          <input type="date" value="2024-03-03">
          <h4>Slut dato</h4>
          <input type="date" value="2024-03-05">
        </div>
        <div class="rightTopCreateEvent">
          <h4>1-dags billet</h4>
          <input type="text" value="300">
          <h4>Alle-dags billet</h4>
          <input type="text" value="500">
          <h4>VIP billet</h4>
          <input type="text" value="2000">
        </div>
      </div>

      <div class="topCreateEvent">
        <div class="leftTopCreateEvent">
          <h4>Beskrivelse af event</h4>
          <textarea rows="4" type="text">abc kommer til stranden</textarea>
        </div>
        <div class="rightTopCreateEvent">
          <h4>Tilføj artister (komma separeret)</h4>
          <textarea rows="4" type="text">INFERNAL, JONAH BLACKSMITH, HUGORM, D-A-D, BENJAMIN HAV & FAMILIEN, RASMUS SEEBACH, SUSPEKT, TOBIAS RAHIM</textarea>
        </div>
      </div>

      <div class="bottonCreateEvent">
        <div class="leftBottomCreateEvent">
          <h4>Tilføj billede</h4>
          <input type="file">
        </div>
        <div class="rightBottomCreateEvent">
          <h4>Tilføjet billeder</h4>
            <img src="images/abc.jpg" alt="" class="miniature">
        </div>
      </div>
    </div>`;
        break;
      default:
        content.innerHTML =
          "<h1>Velkommen tilbage!</h1><p>Vælg noget fra navbaren.</p>";
    }
  }

  // Upon document load or when you need to update the UI based on login status.
  function checkLoginStatus() {
    fetch("check_session.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "checkLogin" }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.loggedIn) {
          document.getElementById("content").innerHTML = `
                <div class="welcome-message">
                    <p>Velkommen, ${data.username}!</p>
                </div>
                <form onsubmit="logout(); return false;">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" value="Log ud">
                </form>`;
        } else {
          showLoginForm(); // Display the login form, implement this function according to your needs.
        }
      });
  }

  document.addEventListener("DOMContentLoaded", checkLoginStatus);

  updateContent("home");

  // This function will change the content div
  function addClickListener(elementId, page) {
    document.getElementById(elementId).addEventListener("click", function (e) {
      e.preventDefault();
      updateContent(page);
    });
  }

  addClickListener("logo", "home");

  // Listen to clicks on all a tags
  document.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const page = this.getAttribute("data-page");
      updateContent(page);
    });
  });
});

// Function to toggle the visibility of comments for a given box number
function toggleComments(boxNumber) {
  // Get the comments container for the specified box number
  let commentsContainer = document.getElementById("comments_" + boxNumber);

  // Toggle the visibility of the comments container
  if (
    commentsContainer.style.display === "none" ||
    commentsContainer.style.display === ""
  ) {
    // If comments are hidden or not set, show them by changing the display style to block
    commentsContainer.style.display = "block";
  } else {
    // If comments are visible, hide them by changing the display style to none
    commentsContainer.style.display = "none";
  }
}

function submitComment(commentId) {
  // Get the name and comment text
  var name = document.querySelector(
    "#comments_" + commentId + " textarea[name='name']"
  ).value;
  var commentText = document.querySelector(
    "#comments_" + commentId + " textarea[name='comment']"
  ).value;

  // Create a new comment element
  var newComment = document.createElement("div");
  newComment.classList.add("comment");
  newComment.innerHTML =
    "<p><strong>" + name + ":</strong> " + commentText + "</p>";

  // Append the new comment to the comments section
  var commentsSection = document.querySelector("#comments_" + commentId);
  commentsSection.appendChild(newComment);

  // Clear the textareas
  document.querySelector(
    "#comments_" + commentId + " textarea[name='name']"
  ).value = "";
  document.querySelector(
    "#comments_" + commentId + " textarea[name='comment']"
  ).value = "";
}

// Get the modal
var modal = document.getElementById("createEventModal");

// Get the button that opens the modal
var btn = document.getElementById("openCreateEventModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function () {
  modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
