<?php
    include 'inc/db.inc.php';

    function get_profile_info($username) {
        $fname = "";
        $lname = "";
        $email = "";
        $bio = "";

        $conn = @mysqli_connect('localhost', 'root', '', 'photogallery');

        $query = "SELECT * FROM users WHERE username = '$username'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            echo "<div class='col-md-2'>
                    First Name : <br>
                    Last Name : <br>
                    Email : <br>
                    Bio : <br>
                    </div>";
            while($row = mysqli_fetch_assoc($query_run)) {
                echo "<div class='col-md-4'>";
                echo $fname = $row['fname'].'<br>';
                echo $lname = $row['lname'].'<br>';
                echo $email = $row['email'].'<br>';

                if($row['bio'] == '') {
                    echo 'Your did not provide your Bio yet<br>';
                } else {
                    echo $row['bio'];
                }

                echo "</div>";
            }
        }
    }
?>