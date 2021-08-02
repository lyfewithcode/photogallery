<?php

    $picid = $_POST['id'];
    include 'inc/db.inc.php';
    $approved = 1;

    $query = "UPDATE pics SET approved = '$approved' WHERE pid = '$picid'";

    $query1 = "SELECT * FROM users WHERE username = (SELECT username FROM pics WHERE pid = '$picid')";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo 'Approved<br>';

        $query_run1 = mysqli_query($conn, $query1);
        while($row = mysqli_fetch_assoc($query_run1)) {
            $new_upload = $row['uploads'] + 1;
            $query2 = "UPDATE users SET uploads = '$new_upload' WHERE username = (SELECT username FROM pics WHERE pid = '$picid')";
            $query_run2 = mysqli_query($conn, $query2);

            if($query_run2) {
                echo 'Yo yo';
            }
        }
    } else {
        echo 'Oops';
    }

?>