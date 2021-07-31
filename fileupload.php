<?php

    session_start();
    $filename = $_FILES['file1']['name'];
    // echo $filename;

    $tmpname = $_FILES['file1']['tmp_name'];
    $session = $_SESSION['user'];
    
    $destination = 'uploads/'.$session.'/'.$filename;

    $id = '';
    $approved = 0;

    include 'inc/db.inc.php';
    
    $query = "INSERT INTO pics VALUES('$id', '$session', '$filename', '$approved')";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        if(move_uploaded_file($tmpname, $destination)) {
            echo $destination;
        }
    }
?>