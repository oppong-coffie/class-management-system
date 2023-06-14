<?php 
session_start();
$teacherid = $_GET['teacherid'];
$teacher_id = IntVal($teacherid);


//database connection
$connection = mysqli_connect('localhost', 'root', '', 'class_management_db');

//update the daily report table
if(isset($_POST['upload'])){
    //get the variables from the form
    $score=$_POST['score'];
    $id = $_POST['id'];
    //sql statement to update
    $sql="INSERT INTO records (userid, teacher_id, course, mark) VALUES('$id', '$teacher_id', 'java', '$score')";
    $query=mysqli_query($connection, $sql);
    if($query){
        header("Location: exerciseReport.php?teacherid=$teacherid;");
    }
}

?>