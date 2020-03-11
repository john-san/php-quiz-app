<?php
  if (empty($toastMessage) == false) {
      echo "<p id='toast' class='animated delay-2s fadeOut'>$toastMessage</p>";
  } else {
      echo "<p id='toast' class='invisible'>Hidden</p>";
  }