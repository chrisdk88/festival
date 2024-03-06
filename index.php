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
        <img src="images/logo.png" alt="Logo">
      </div>
      <div class="navbar-title">
        <h1>Festival ting</h1>
      </div>
      <div class="navbar-form">
        <form action="#" method="post">
          <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="submit"id="loginbtn" value="Login">
          </div>
        </form>
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
    </div>
  </div>

  <script src="javascript/script.js"></script>
</body>
</html>