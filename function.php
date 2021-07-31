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

    function get_avatar_image($user) {

        $pic = 0;

        $upload_folder = "uploads";
        $user_folder = $upload_folder.'/'.$user;
        $avatar_image_folder = $user_folder.'/avatar';

        if(is_dir($upload_folder)) {
            if(is_dir($user_folder)) {

            } else {
                mkdir($user_folder);
            }
        } else {
            mkdir($upload_folder);
            if(is_dir($user_folder)) {
                
            } else {
                mkdir($user_folder);
            }
        }

        if(is_dir($avatar_image_folder)) {

        } else {
            mkdir($avatar_image_folder);
        }

        if($handle = opendir($avatar_image_folder)) {
            while(false !== ($entry = readdir($handle))) {
                if(($entry != '.') and ($entry != '..')) {
                    $pic = 1;
                    $avatar_image_path = $avatar_image_folder.'/'.$entry;
                    echo "<img src=$avatar_image_path alt=$entry id='avatar-image-id' width='300px'>";
                }
            }
            closedir($handle);
        }

        if($pic == 0) {
            echo "<img src='img/user-default.jpg' id='avatar-image-id' width='300px'>";
        }
    }

    function get_user_uploaded_pics($username) {

        $conn = @mysqli_connect('localhost', 'root', '', 'photogallery');

        $query = "SELECT * FROM pics WHERE username = '$username' ORDER BY pid DESC";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                $picid = $row['pid'];
                $picname = $row['picname'];
                $path = 'uploads/'.$username.'/'.$picname;
                ?>
                    <div class="col-md-4">
                        <img src="<?php echo $path; ?>">
                    </div>
                <?php 
            }
        }
    }
?>