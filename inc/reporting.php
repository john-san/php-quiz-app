<?php

// show used_indexes
echo '$_SESSION["used_indexes"]: ';

foreach ($_SESSION["used_indexes"] as $used_idx) {
    echo "$used_idx, ";
}

// show totalCorrect
echo '<br /> $_SESSION[“totalCorrect”]: ';
echo $_SESSION["totalCorrect"];

// show first question to see if it changes after new game is started
if (isset($_SESSION['questions'])) {
    echo '<br /> $_SESSION["questions"][0]["correctAnswer"]: ';
    var_dump($_SESSION["questions"][0]["correctAnswer"]);
}