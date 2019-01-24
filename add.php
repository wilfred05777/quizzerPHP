<?php include 'database.php'; ?>
<?php 
    if(isset($_POST['submit'])){
        //Get post variables
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];
        //Choices array 
        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];
        
        //Question query
        $query = "INSERT INTO `questions` (question_number, text) VALUES('$question_number', '$question_text')";
        
        //Run query
        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__); 
        
        //validate insert
        if($insert_row){
            foreach($choices as $choice => $value){
                if($value != ''){
                    if($correct_choice == $choice){
                        $is_correct = 1;
                    } else{
                        $is_correct = 0;
                    }
                    //Choice query
                    $query = "INSERT INTO `choices` (question_number, is_correct, text) VALUES ('$question_number','$is_correct','$value')";
                    
                    //run query
                    $insert_row =$mysqli->query($query) or die ($mysqli->error.__LINE__);
                    
                    //validate insert
                    if($insert_row){
                        continue;
                    }else{
                        die('Error: ('.$mysqli->errno. ')'.$mysqli->error);
                    }
                }
            }
            $msg = 'Question has been added';
        }
        
    }

    /*
    * get total question
    */
    $query = "SELECT * FROM `questions`";
    //get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;  
    $next = $total+1;

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
        <h2>Add a Question</h2>
        <?php 
          if(isset($msg)){
              echo '<p>'.$msg.'</p>';
          }
          
        ?>
        <form action="add.php" method="post">
            <p>
                <label for="">Question Number</label>
                <input type="number" value="<?php echo $next;?>" name="question_number" />
            </p>
            <p>
                <label for="">Question Text</label>
                <input type="text" name="question_text" />
            </p>
            <p>
                <label for="">Choice #1:</label>
                <input type="text" name="choice1" />
            </p>
            <p>
                <label for="">Choice #2:</label>
                <input type="text" name="choice2" />
            </p>
            <p>
                <label for="">Choice #3:</label>
                <input type="text" name="choice3" />
            </p>
            <p>
                <label for="">Choice #4:</label>
                <input type="text" name="choice4" />
            </p>
            <p>
                <label for="">Choice #5:</label>
                <input type="text" name="choice5" />
            </p>
            <p>
                <label for="">Correct Choice Number:</label>
                <input type="number" name="correct_choice" />
            </p>
            <p>
    
                <input type="submit" value="Submit" name="submit"/>
            </p>
            
        </form>
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
