<?php

    $picid = $_POST['id'];
    include 'inc/db.inc.php';
    $approved = 1;

    $query = "UPDATE pics SET approved = '$approved' WHERE pid = '$picid'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo 'Approved';
    } else {
        echo 'Oops';
    }

?>