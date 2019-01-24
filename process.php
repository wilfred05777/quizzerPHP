<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
    /*
    * Check to see if score is set_error_handler
    */
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }
    
    if($_POST){
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];
        $next =$number+1;
        
    /*
    * get total question
    */
    $query = "SELECT * FROM `questions`";
    //get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;     
        
        
    /*
    *  Get Correct Choice
    */
        $query ="SELECT * FROM `choices`
                    WHERE question_number = $number AND is_correct = 1";
        
        //get results
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        
        //get row
        $row = $result->fetch_assoc();
        
        //get correct choice
        $correct_choice = $row['id'];
        
        //compare
        if($correct_choice == $selected_choice){
            //answer is correct
            $_SESSION['score']++;
        }
       
        
        //check if last question
        if($number==$total){
            header("Location: final.php");
            exit();
        }else{
            header("Location: question.php?n=".$next);
        }
    }   
    
?>