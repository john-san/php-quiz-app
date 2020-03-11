<?php

echo "<p id='gameOverMessage'>You got " . $_SESSION['totalCorrect'] . " of " . $totalQuestions . " correct! <br/>";
  echo "<form action='inc/new_game.php' method='post'>";
      echo "<input type='submit' class='btn' name='gameOption' value='Retry Same Quiz'>";
      echo "<input type='submit' class='btn' name='gameOption' value='New Quiz'>";
  echo "</form>";
echo "</p>";