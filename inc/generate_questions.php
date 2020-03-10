<?php
// Generate random questions
function generateQuestions($numberOfQuestions) {
  $questions = [];
// Loop for required number of questions
  for ($i = 1; $i <= $numberOfQuestions; $i++) {
    $question = [];
// Get random numbers to add
    $question["leftAdder"] = rand(0, 100);
    $question["rightAdder"] = rand(0, 100);
// Calculate correct answer
    $question["correctAnswer"] = $question["leftAdder"] + $question["rightAdder"];
// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer
    $question["firstIncorrectAnswer"] = $question["correctAnswer"] + rand(1,10);
    $question["secondIncorrectAnswer"] = $question["correctAnswer"] - rand(1,10);
// Add question and answer to questions array
    $questions[] = $question;
  }

  return $questions;
}


// var_dump(generateQuestions(5));