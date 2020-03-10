<?php
// Start the session
session_start();

// generate 10 random questions
include 'generate_questions.php';
if (isset($_SESSION['questions']) == false) {
    $_SESSION['questions'] = generateQuestions(10);
}

// initialize vars
$totalQuestions = count($_SESSION['questions']);
$toastMessage = '';
$showScore = false;
$randomIdx = null;
$currentQuestion = null;

// set & return $randomIdx
function getRandomIdx() {
    global $randomIdx;
    do {
        $randomIdx = rand(0, count($_SESSION['questions']) - 1);
    } while (in_array($randomIdx, $_SESSION['used_indexes']));

    return $randomIdx;
}

// return a random question 
function getRandomQuestion() {
    return $_SESSION['questions'][getRandomIdx()];
}

// return shuffled array of answers for display
function createAnswersArray($currentQuestion) {
    $answers = [
        $currentQuestion["correctAnswer"],
        $currentQuestion["firstIncorrectAnswer"],
        $currentQuestion["secondIncorrectAnswer"]
    ];
    shuffle($answers);
    return $answers;
}

// check if game is over
function isGameOver() {
    global $totalQuestions;
    return count($_SESSION['used_indexes']) == $totalQuestions;
}

// check answer
function isAnswerCorrect() {
    return $_POST['answer'] == $_SESSION['questions'][$_POST['index']]['correctAnswer'];
}

// check answer
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isAnswerCorrect()) {
        $toastMessage = "Well done!  That's correct.";
        // keep track of score
        $_SESSION["totalCorrect"]++;
    } else {
        $toastMessage = "Bummer!  That was incorrect.";
    }
}

// if the game is over, reset $_SESSION['used_indexes'] & show the score
if (isGameOver())  {
    $_SESSION['used_indexes'] = [];
    $showScore = true;
// otherwise, set up round
} else {
    $showScore = false;
    // set $_SESSION["totalCorrect"] & $toastMessage on first round
    if (count($_SESSION['used_indexes']) == 0) {
        $_SESSION["totalCorrect"] = 0;
        $toastMessage = '';
    }
    // get a random question & set $randomIdx
    $currentQuestion = getRandomQuestion();
    // keep track of used indexes
    array_push($_SESSION['used_indexes'], $randomIdx);
    // generate array for display
    $answers = createAnswersArray($currentQuestion);
}


// session_destroy();