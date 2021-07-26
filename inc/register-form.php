<section class="registration">
    <div class="section-header center">
        <h1>Regitration</h1>
        <h6><a href="index.php">Home</a> &gt; <span>Reagister</span></h6>
    </div>
    <div class="container">
        <div class="row">
            <form method="post" id="register-form" action="register.php">
            <input type="text" name="fname" id="fname" placeholder="Enter First Name">
            <input type="text" name="lname" id="lname" placeholder="Enter Last Name">
            <input type="text" name="username" id="username" placeholder="Choose a Username">
            <input type="email" name="email" id="email" placeholder="Enter your email address">
            <input type="password" name="password" id="password" placeholder="Enter your Password here">
            <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm your Password here">
            <textarea name="bio" id="bio" placeholder="Enter your Bio here (Optional)"></textarea>
            <input type="submit" name="submit" id="submit" value="Register" class="primary-bg white">
            </form>
            <div id="error">

            </div>
            <div id="success">

            </div>
        </div>
    </div>
</section>

<?php

    $fname = "";
    $lname = "";
    $username = "";
    $email = "";
    $password = "";
    $bio = "";
    $uploads = 0;
    $id = "";
    $error = array();

    function sanitize($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    if(isset($_POST['submit'])) {
        
        // checking first name
        
        if(empty($_POST['fname'])) {
            $error[] = "First Name Required"; 
        } elseif(strlen($_POST['fname']) > 25) {
            $error[] = "First name should have a maximum of 25 Characters";
        } else {
            $fname = sanitize($_POST['fname']);
        }

        // checking last name

        if(empty($_POST['lname'])) {
            $error[] = "Last Name Required"; 
        } elseif(strlen($_POST['lname']) > 25) {
            $error[] = "Last name should have a maximum of 25 Characters";
        } else {
            $lname = sanitize($_POST['lname']);
        }

        // checking username

        if(empty($_POST['username'])) {
            $error[] = "Username Required"; 
        } elseif(strlen($_POST['username']) > 25) {
            $error[] = "Username should have a maximum of 25 Characters";
        } else {
            $username = sanitize($_POST['username']);
        }

        // checking email

        if(empty($_POST['email'])) {
            $error[] = "Email Required"; 
        } elseif(strlen($_POST['email']) > 50) {
            $error[] = "Email should have a maximum of 50 Characters";
        } elseif(!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
            $error[] = "Email is not a valid email address";
        } else {
            $email = sanitize($_POST['email']);
        }

        // checking password

        if(empty($_POST['password'])) {
            $error[] = "Password Required"; 
        } elseif(strlen($_POST['password']) > 32) {
            $error[] = "Password should have a maximum of 32 Characters";
        } else {
            $password = sanitize($_POST['password']);
            if(!empty($_POST['confirm-password'])) {
               if($_POST['password'] != $_POST['confirm-password']) {
                   $error[] = "Password and conform password are not macthing";
               }
            } else {
                $error[] = "Confirm your password";
            }
        }

        // checking bio

        if(!empty($bio)) {
            $bio = sanitize($_POST['bio']);
        }

        if(count($error) == 0) {
            $checkusername = "SELECT * FROM users WHERE username = '$username'";
            $runqueryusername = mysqli_query($checkusername);

            $checkemail = "SELECT * FROM users WHERE email = '$email'";
            $runqueryemail = mysqli_query($checkemail);

            if(mysqli_num_rows($runqueryusername) > 0) {
                ?>
                <script type="text/javascript">
                    $('#error').append("<?php echo 'Username Exists'; ?>")
                </script>
                <?php
            } elseif(mysqli_num_rows($runqueryemail) > 0) {
                ?>
                <script type="text/javascript">
                    $('#error').append("<?php echo 'Email Exists'; ?>")
                </script>
                <?php
            } else {
                register($id, $fname, $lname, $username, $email, $password, $bio, $uploads);
            }
        } else {
            foreach($error as $key => $value) {
                ?>
                <script type="text/javascript">
                    $('#error').append("<?php echo $value.'<br>'; ?>")
                </script>
                <?php
            }
        }

    }
?>