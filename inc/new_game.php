<?php
session_start(); 

function newGame() {
  // remove existing questions if player wants a new quiz
  if ($_POST["gameOption"] == "New Quiz") {
    unset($_SESSION['questions']);
  }

  header("location: ../index.php");
  exit;
}

newGame();