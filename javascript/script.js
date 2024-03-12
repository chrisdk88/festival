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
      default:
        content.innerHTML =
          "<h1>Velkommen tilbage!</h1><p>Vælg noget fra navbaren.</p>";
    }
  }

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
