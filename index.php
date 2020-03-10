<?php

include './inc/quiz.php';


echo '$_SESSION["used_indexes"]: ';

foreach ($_SESSION["used_indexes"] as $used_idx) {
    echo "$used_idx, ";
}
echo '<br /> $_SESSION[“totalCorrect”]: ';
echo $_SESSION["totalCorrect"];

// echo '<br /> $_SESSION["questions"]';

// foreach ($_SESSION["questions"] as $gen_q) {
//     echo var_dump($gen_q) . " <br />";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
            <?php
            if (empty($toastMessage) == false) {
                echo "<p id='toast' class='animated delay-1s fadeOut'>$toastMessage</p>";
            }
            ?>

            <?php
            if ($showScore == false) {
                echo "<p class='breadcrumbs'>Question " . count($_SESSION["used_indexes"]) . " of " . $totalQuestions . "</p>";
                echo "<p class='quiz'>What is " . $currentQuestion["leftAdder"] . " + " . $currentQuestion["rightAdder"] . "?</p>";
                echo "<form action='index.php' method='post'>";
                    echo "<input type='hidden' name='index' value=" . $randomIdx . " />";
                    echo "<input type='submit' class='btn' name='answer' value=" . $answers[0] . " />";
                    echo "<input type='submit' class='btn' name='answer' value=" . $answers[1] . " />";
                    echo "<input type='submit' class='btn' name='answer' value=" . $answers[2] . " />";
                echo "</form>";
            } else {
                echo "<p id='gameOverMessage'>You got " . $_SESSION['totalCorrect'] . " of " . $totalQuestions . " correct! <br/>";
                echo "<a href='' class='btn'>Play again</a>";
                echo "</p>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>