<?php
echo "<p class='breadcrumbs'>Question " . count($_SESSION["used_indexes"]) . " of " . $totalQuestions . "</p>";
echo "<p class='quiz'>What is " . $currentQuestion["leftAdder"] . " + " . $currentQuestion["rightAdder"] . "?</p>";
  echo "<form action='index.php' method='post'>";
      echo "<input type='hidden' name='index' value=" . $randomIdx . " />";
      echo "<input type='submit' class='btn' name='answer' value=" . $answers[0] . " />";
      echo "<input type='submit' class='btn' name='answer' value=" . $answers[1] . " />";
      echo "<input type='submit' class='btn' name='answer' value=" . $answers[2] . " />";
  echo "</form>";