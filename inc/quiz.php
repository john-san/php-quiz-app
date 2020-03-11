<?php
session_start();

// generate 10 random questions
include 'generate_questions.php';
include 'helpers.php';

// generate questions
if (isset($_SESSION['questions']) == false) {
    $_SESSION['questions'] = generateQuestions(10);
}

// initialize vars
$totalQuestions = count($_SESSION['questions']);
$toastMessage = '';
$randomIdx = null;
$currentQuestion = null;
$newRound = true; // used to handle refreshes
$showScore = false; // used to determine whether to show gameOverMessage

// check if valid post request was sent
if (isValidPost()) {
    // check answer
    if (isAnswerCorrect()) {
        $toastMessage = "Well done!  That's correct.";
        // keep track of score
        $_SESSION["totalCorrect"]++;
    } else {
        $toastMessage = "Bummer!  That was incorrect.";
    }
// Non-post or invalid post requests
} else {
    $newRound = false;
}

// if the game is over, reset $_SESSION['used_indexes'] & show the score
if (isGameOver())  {
    $_SESSION['used_indexes'] = [];
    $showScore = true;
// otherwise, set up round
} else {
    // special case: set up first round
    if (count($_SESSION['used_indexes']) == 0) {
        $_SESSION["totalCorrect"] = 0;
        $toastMessage = '';
        $newRound = true;
    }

    // handle normal setup of a round
    if ($newRound) {
        // get a random question & set $randomIdx
        $currentQuestion = getRandomQuestion();
        // keep track of used indexes
        array_push($_SESSION['used_indexes'], $randomIdx);
        // generate array for display
        $answers = createAnswersArray($currentQuestion);
    } 
    // user may have refreshed, show same question
    else {
        $randomIdx = end($_SESSION['used_indexes']);
        $currentQuestion = $_SESSION['questions'][$randomIdx];
        $answers = createAnswersArray($currentQuestion);
    }
}