<?php

include 'inc/quiz.php';
// uncomment inc/reporting to view session variables
include 'inc/reporting.php';

include 'views/header.php';

?>
    <div class="container">
        <div id="quiz-box" class="animated fadeIn">
            <?php
            
            include 'views/toastMessage.php';
            // if $showScore is true, show gameOverMessage 
            if ($showScore) {
                include 'views/gameOverMessage.php';
            // otherwise, show quiz
            } else {
                include 'views/quiz.php';
            }

            ?>
        </div>
    </div>
<?php include 'views/footer.php' ?>