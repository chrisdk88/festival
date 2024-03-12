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
        // Check the session to determine if the user is logged in.
        fetch("check_session.php") // check_session.php is a PHP file that checks the status of the session.
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
                  <form id="loginForm2" onsubmit="submitLogin(event);">
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
            }
          });
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

  function submitLogin(event) {
    event.preventDefault(); // Prevents the form from submitting in the traditional way.

    var formData = new FormData(document.getElementById("loginForm2"));

    fetch("index.php", {
      // Change this to the correct file that handles the login logic.
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.loggedIn) {
          // Login success
          console.log("Login successful:", data.username);

          // Updating the UI to show that the user is logged in.
          document.getElementById(
            "content"
          ).innerHTML = `<p>Velkommen, ${data.username}!</p>`;
        } else {
          // Login failed, display an error message.
          console.error("Login failed:", data.error);
          // Update the DOM to display the error message.
          document.getElementById("loginError").innerText = data.error;
        }
      })
      .catch((error) => console.error("Error:", error));
  }

  document.addEventListener("DOMContentLoaded", checkLoginStatus);

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

