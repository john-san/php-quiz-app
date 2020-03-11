### Team Treehouse PHP Techdegree

## Unit 2 Project: Quiz App

**Summary:** This is a quiz app that asks addition questions.  Questions are dynamically created and answers are shuffled.  The question # and number of questions answered correctly are tracked.

This project utilizes session variables to persist data such as the generated questions and knowing which questions have been asked.  

Furthermore, logic has been added to prevent the user from unintentionally moving the app forward through page refreshes, ie sending multiple POST requests for a question that has been answered already.


**How to use:**

1. Download the project files and extract the folder to your computer.
2. Copy folder directory to appropriate directory for MAMP/XAMPP/etc setup.
3. Start up local server.
4. View project in browser at appropriate location depending on your local server & directory setup.


**Extra Credit**

1. Added custom styles (different color palette, mobile responsiveness).
2. Created generateQuestions function to dynamically create quiz questions instead of using fixed question bank.
3. At the end of the quiz, users have the ability to retake the same quiz or take a new quiz.