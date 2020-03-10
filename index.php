<?php

include './inc/quiz.php';

// var_dump($_POST["answer"]);
// var_dump($_POST["index"]);
echo '$_SESSION["used_indexes"]: <br />';
// var_dump($_SESSION["used_indexes"]);
foreach ($_SESSION["used_indexes"] as $used_idx) {
    echo "$used_idx <br />";
}
echo '<br /> $_SESSION[“totalCorrect”]: ';
var_dump($_SESSION["totalCorrect"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
            <?php
            if (empty($toastMessage) == false) {
                echo $toastMessage;
            }
            ?>

            <?php
            if ($showScore == false) {
                echo "<p class='breadcrumbs'>Question " . count($_SESSION["used_indexes"]) . " of " . $totalQuestions . "</p>";
                echo "<p class='quiz'>What is " . $question["leftAdder"] . " + " . $question["rightAdder"] . "?</p>";
                echo "<form action='index.php' method='post'>";
                    echo "<input type='hidden' name='index' value=" . $index . " />";
                    echo "<input type='submit' class='btn' name='answer' value=" . $answers[0] . " />";
                    echo "<input type='submit' class='btn' name='answer' value=" . $answers[1] . " />";
                    echo "<input type='submit' class='btn' name='answer' value=" . $answers[2] . " />";
                echo "</form>";
            } else {
                echo "<p>You got " . $_SESSION['totalCorrect'] . " of " . $totalQuestions . " correct!</p>";
            }
            ?>
            <!-- <p class="breadcrumbs">Question <?php echo count($_SESSION["used_indexes"]) ?> of <?php echo $totalQuestions ?></p>
            <p class="quiz">What is <?php echo $question["leftAdder"] ?> + <?php echo $question["rightAdder"] ?>?</p>
            <form action="index.php" method="post">
                <input type="hidden" name="index" value=<?php echo $index ?> />
                <input type="submit" class="btn" name="answer" value=<?php echo $answers[0] ?> />
                <input type="submit" class="btn" name="answer" value=<?php echo $answers[1] ?> />
                <input type="submit" class="btn" name="answer" value=<?php echo $answers[2] ?> />
            </form> -->
        </div>
    </div>
</body>
</html>