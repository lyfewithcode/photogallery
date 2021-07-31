<?php

    $picid = $_POST['id'];
    include 'inc/db.inc.php';
    // $approved = 1;

    $query = "DELETE FROM pics WHERE pid = '$picid'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo 'Deleted';
    } else {
        echo 'Oops';
    }

?>