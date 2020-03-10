<?php
// Start the session
session_start();

// Include questions from the questions.php file
include 'questions.php';
// include 'generate_questions.php';

// initialize vars
$totalQuestions = count($questions);
$toastMessage = '';
$showScore = false;
$randomIdx = null;
$currentQuestion = null;

// if $_SESSION['used_indexes'] hasn't been set yet, initialize our session vars 
// if (isset($_SESSION['used_indexes']) == false) {
//     $_SESSION["used_indexes"] = [];
//     $_SESSION["totalCorrect"] = 0;
//     $showScore = false;
// }

// Check user's answer
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if ($_POST['answer'] == $questions[$_POST['index']]['correctAnswer']) {
        $toastMessage = "Well done!  That's correct.";
        // keep track of score
        $_SESSION["totalCorrect"]++;
    } else {
        $toastMessage = "Bummer!  That was incorrect.";
    }
}


/*
  If the number of used indexes in our session variable is equal to the total number of questions
  to be asked:
        1.  Reset the session variable for used indexes to an empty array 
        2.  Set the show score variable to true.

  Else:
    1. Set the show score variable to false 
    2. If it's the first question of the round:
        a. Set a session variable that holds the total correct to 0. 
        b. Set the toast variable to an empty string.
        c. Assign a random number to a variable to hold an index. Continue doing this
            for as long as the number generated is found in the session variable that holds used indexes.
        d. Add the random number generated to the used indexes session variable.      
        e. Set the individual question variable to be a question from the questions array and use the index
            stored in the variable in step c as the index.
        f. Create a variable to hold the number of items in the session variable that holds used indexes
        g. Create a new variable that holds an array. The array should contain the correctAnswer,
            firstIncorrectAnswer, and secondIncorrect answer from the variable in step e.
        h. Shuffle the array from step g.
*/

// if the game is over, reset $_SESSION['used_indexes'] & show the score
if (count($_SESSION['used_indexes']) == $totalQuestions)  {
    $_SESSION['used_indexes'] = [];
    $showScore = true;
// otherwise, play round
} else {
    $showScore = false;
    if (count($_SESSION['used_indexes']) == 0) {
        $_SESSION["totalCorrect"] = 0;
        $toastMessage = '';
    }
    do {
        $randomIdx = rand(0, count($questions) - 1);
    } while (in_array($randomIdx, $_SESSION['used_indexes']));

    $currentQuestion = $questions[$randomIdx];

    array_push($_SESSION['used_indexes'], $randomIdx);

    $answers = [
        $currentQuestion["correctAnswer"],
        $currentQuestion["firstIncorrectAnswer"],
        $currentQuestion["secondIncorrectAnswer"]
    ];
    shuffle($answers);
}


// session_destroy();