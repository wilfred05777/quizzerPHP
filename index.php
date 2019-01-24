<?php include 'database.php';  ?>
<?php 
/*
* Get Total Questions
*/
$query = "SELECT * FROM `questions`";
//Get Results
$results = $mysqli->query($query) or die($mysqli_error.__LINE__);
$total = $results->num_rows;

?>
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
        <h2>Test Your PHP Knowledge</h2>
        <p>This is a multiple choice quiz to text your knowledge of php</p>
        <ul>
            <li><strong>Number of Questions:</strong><?php echo $total ?></li>
            <li><strong>Type:</strong>Multiple Choice</li>
            <li><strong>Estimated Time:</strong> <?php echo $total*1; ?> Minute(s)</li>
        </ul>
        <a href="question.php?n=1" class="start">Start Quiz</a>
      </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2018, PHP QUIZZER
        </div>
    </footer>
  </body>
</html>

<?php  ?>
