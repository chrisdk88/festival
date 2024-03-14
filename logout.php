<?php
  session_start(); // Starter sessionen
  session_unset(); // Fjerner alle session variabler
  session_destroy(); // Ødelægger sessionen

  header("Location: index.php"); // Omdirigerer brugeren til login-siden eller en anden relevant side
  exit();
?>