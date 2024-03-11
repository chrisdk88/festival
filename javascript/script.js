document.addEventListener("DOMContentLoaded", function () {
  // Function to update the content
  function updateContent(page) {
    const content = document.getElementById("content");
    switch (page) {
      case "home":
        content.innerHTML =
          "<h1>Virker dette?</h1><p>Her finder du de bedste festivals</p>";
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
        // Tjek sessionen for at afgøre, om brugeren er logget ind
        fetch("check_session.php") // check_session.php er en PHP-fil, der tjekker sessionens tilstand
          .then((response) => response.json())
          .then((data) => {
            if (data.loggedIn) {
              content.innerHTML = `
                  <div class="welcome-message">
                    <p>Velkommen, ${data.username}!</p>
                  </div>
                  <form action="index.php" method="post">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" value="Log ud">
                  </form>`;
            } else {
              content.innerHTML = `
                  <h1 id="textLogin">Admin login</h1>
                  <form id="loginForm2">
                    <div class="form-group2">
                      <label for="loginUsername">Brugernavn:</label>
                      <input type="text" id="loginUsername" name="username" placeholder="Indtast brugernavn">
                    </div>
                    <div class="form-group2">
                      <label for="loginPassword">Adgangskode:</label>
                      <input type="password" id="loginPassword" name="password" placeholder="Indtast adgangskode">
                    </div>
                    <div class="form-group2">
                      <button onclick="submitLogin(); return false;">Log ind</button>
                    </div>
                  </form>`;
            }
          });
        break;
      default:
        content.innerHTML =
          "<h1>Velkommen tilbage!</h1><p>Vælg noget fra navbaren.</p>";
    }
  }

  function submitLogin() {
    var username = document.getElementById("loginUsername").value;
    var password = document.getElementById("loginPassword").value;

    fetch("index.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        action: "login",
        username: username,
        password: password,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.loggedIn) {
          document.getElementById(
            "content"
          ).innerHTML = `Velkommen, ${data.username}! <button onclick="logout()">Log ud</button>`;
        } else {
          document.getElementById("fejl").innerHTML =
            "Login fejlede. Prøv igen.";
        }
      });
  }

  function logout() {
    fetch("index.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "logout" }),
    }).then(() => {
      // Opdater siden eller vis loginform igen
      showLoginForm(); // Du skal implementere denne funktion
    });
  }

  // This function will change the content div
  function addClickListener(elementId, page) {
    document.getElementById(elementId).addEventListener("click", function (e) {
      e.preventDefault();
      updateContent(page);
    });
  }

  addClickListener("logo", "home");
  addClickListener("loginbtn", "login");

  // Listen to clicks on all a tags
  document.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const page = this.getAttribute("data-page");
      updateContent(page);
    });
  });
});
