<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quizzer</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <h1>PHP Quizzer</h1>
      </div>
    </header>

    <main>
      <div class="container">
        <h2>You're Done</h2>
        <p>Congrats You have Completed the test</p>
        <p>Final Score: <?php echo $_SESSION['score'];?></p>
        <a href="question.php" class="start">Take Again</a>
      </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2018, PHP QUIZZER
        </div>
    </footer>
  </body>
</html>

