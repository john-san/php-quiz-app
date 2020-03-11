<?php
// Generate random questions
function generateQuestions($numberOfQuestions) {
  $questions = [];
  for ($i = 1; $i <= $numberOfQuestions; $i++) {
    $question = [];
    // Get random numbers to add
    $question["leftAdder"] = rand(0, 100);
    $question["rightAdder"] = rand(0, 100);
    // Calculate correct answer
    $question["correctAnswer"] = $question["leftAdder"] + $question["rightAdder"];
    // Get incorrect answers within 10 numbers either way of correct answer
    // get unique and non-negative incorrect answers, credits to Joseph Yhu from PHP TD slack
    do {
      $question["firstIncorrectAnswer"] = abs($question["correctAnswer"] + rand(-10,10));
      $question["secondIncorrectAnswer"] = abs($question["correctAnswer"] + rand(-10,10));
    } while (  $question["firstIncorrectAnswer"] === $question["correctAnswer"] ||
               $question["firstIncorrectAnswer"] === $question["secondIncorrectAnswer"] ||
               $question["secondIncorrectAnswer"] === $question["correctAnswer"]);
    // Add question and answer to questions array
    $questions[] = $question;
  }

  return $questions;
}