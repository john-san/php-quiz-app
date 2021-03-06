<?php

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
  return count($_SESSION['used_indexes']) == $totalQuestions && isLastIndexValid();
}

// check if post request
function isValidPost() {
  return $_SERVER["REQUEST_METHOD"] == 'POST' && isLastIndexValid();
}

// ensure that $_POST['index'] lines up with last index in $_SESSION['used_indexes'].  useful to check for refreshes
function isLastIndexValid() {
  return end($_SESSION['used_indexes']) == $_POST['index'];
}

// check answer
function isAnswerCorrect() {
  return $_POST['answer'] == $_SESSION['questions'][$_POST['index']]['correctAnswer'];
}
