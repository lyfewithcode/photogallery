<?php
    include 'inc/db.inc.php';

    function get_top_uploaders() {

        $conn = @mysqli_connect('localhost', 'root', '', 'photogallery');

        $limit = 3;
        $query = "SELECT * FROM users ORDER BY uploads DESC LIMIT $limit";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                $pic = 0;
                
                $author = $row['username'];
                $avatar_image_folder = 'uploads/'.$author.'/avatar';
                
                /** file handling */
                if($handle = opendir($avatar_image_folder)) {
                    while(false !== ($entry = readdir($handle))) {
                        if(($entry != '.') and ($entry != '..')) {
                            $pic = 1;
                            $avatar_image_path = $avatar_image_folder.'/'.$entry;
                            ?>
                                <div class='col-md-4'>
                                    <div class='gallery-image'>
                                        <img src='<?php echo $avatar_image_path; ?>' class='front'>
                                        <div class='back'>
                                            <div class='back-content'>
                                                <h3><?php echo $author; ?></h3>
                                                <h6><i>No of Uploads:</i> <?php echo $row['uploads']; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    closedir($handle);
                }
        
                if($pic == 0) {
                    ?>
                        <div class='col-md-4'>
                            <div class='gallery-image'>
                                <img src='img/user-default.jpg' class='front'>
                                <div class='back'>
                                    <div class='back-content'>
                                        <h3><?php echo $author; ?></h3>
                                        <h6><i>No of Uploads</i> <?php echo $row['uploads']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }
        }
    }

    function get_recent_pics() {

        $conn = @mysqli_connect('localhost', 'root', '', 'photogallery');

        $limit = 3;
        $query = "SELECT * FROM pics ORDER BY pid DESC LIMIT $limit";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                $picname = $row['picname'];
                $pid = $row['pid'];
                $author = $row['username'];
                $src = 'uploads/'.$author.'/'.$picname;

                ?>
                    <div class='col-md-4'>
                        <div class='gallery-image'>
                            <img src='<?php echo $src; ?>' class='front'>
                            <div class='back'>
                                <div class='back-content'>
                                    <h3><?php echo $picname; ?></h3>
                                    <h6><i>by</i> <?php echo $author ?></h6>
                                    <a href="<?php echo $src; ?>" data-lightbox="gallery"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    }

    function get_home_gallery_content($x) {

        $conn = @mysqli_connect('localhost', 'root', '', 'photogallery');

        $approved = 1;

        $query = "SELECT * FROM pics WHERE approved = '$approved' LIMIT $x";
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                $picname = $row['picname'];
                $pid = $row['pid'];
                $author = $row['username'];
                $src = 'uploads/'.$author.'/'.$picname;
                ?>
                    <div class='col-md-4'>
                        <div class='gallery-image'>
                            <img src='<?php echo $src; ?>' class='front'>
                            <div class='back'>
                                <div class='back-content'>
                                    <h3><?php echo $picname; ?></h3>
                                    <h6><i>by</i> <?php echo $author ?></h6>
                                    <a href="<?php echo $src; ?>" data-lightbox="gallery"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
            }
        }
    }

    function get_gallery_content() {
        if(isset($_GET['page'])) {
            $page = (int)$_GET['page'];
        } else {
            $page = $_GET['page'] = 1;
        }

        if(isset($_GET['per_page']) && $_GET['per_page'] < 21) {
            $per_page = $_GET['per_page'];
        } else {
            $per_page = 3;
        }

        $conn = @mysqli_connect('localhost', 'root', '', 'photogallery');

        $approved = 1;
        $total_query = "SELECT * FROM pics WHERE approved = '$approved'";
        $total = mysqli_num_rows(mysqli_query($conn, $total_query));
        $pages = ceil($total / $per_page);
        // echo $pages;
        $start = ($page * $per_page) - $per_page;
        // echo $start;

        $query = "SELECT * FROM pics WHERE approved = '$approved' LIMIT $start, $per_page";
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                $picname = $row['picname'];
                $pid = $row['pid'];
                $author = $row['username'];
                $src = 'uploads/'.$author.'/'.$picname;
                ?>
                    <div class='col-md-4'>
                        <div class='gallery-image'>
                            <img src='<?php echo $src; ?>' class='front'>
                            <div class='back'>
                                <div class='back-content'>
                                    <h3><?php echo $picname; ?></h3>
                                    <h6><i>by</i> <?php echo $author ?></h6>
                                    <a href="<?php echo $src; ?>" data-lightbox="gallery"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
            }
        }
        ?>
            <div class='clearfix'></div>
            <div id='pagination'>
                <?php
                    for($i = 1; $i <= $pages; $i ++) {
                        ?>
                            <a href="?page=<?php echo $i.'&per_page='.$per_page; ?>">Page<?php echo $i; ?></a>
                        <?php
                    }
                ?>
            </div>
            <script type="text/javascript">
                lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                    })
            </script>
        <?php
    }

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

    // admin-content
    function get_unapproved_pics() {

        $conn = @mysqli_connect('localhost', 'root', '', 'photogallery');
        
        $approved = 0;
        $query = "SELECT * FROM pics WHERE approved = '$approved'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                $pid = $row['pid'];
                $picname = $row['picname'];
                $uname = $row['username'];
                $src = 'uploads/'.$uname.'/'.$picname;
                ?>
                    <div id='row-<?php echo $pid; ?>'>
                        <div class='col-md-4'>
                            <img src='<?php echo $src; ?>' id='<?php echo $pid; ?>'>
                        </div>
                        <div class='col-md-4'>
                            <?php echo $picname; ?>
                        </div>
                        <div class='col-md-4'>
                            <button id='yes-<?php echo $pid; ?>' onclick='approveimage(<?php echo $pid; ?>)'>Yes</button>
                            <button id='no-<?php echo $pid; ?>' onclick='deleteimage(<?php echo $pid; ?>)'>No</button>
                        </div>
                    </div>
                    <div class='clearfix'></div>
                <?php
            }
        }
    }
?>