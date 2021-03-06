<?php
    @session_start();
    if(isset($_SESSION['user'])) {
        $session = $_SESSION['user'];
    } else {
        $session = null;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/simpletextrotator.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <a href="#" class="logo pull-left bold">Photo<span class="primary">G</span>allery</a>
                <nav class="pull-right right">
                    <button type="button" class="btn" data-toggle="collapse" data-target="#menu">
                        <i class="fa fa-navicon"></i>
                    </button>
                    <div class="collapse" id="menu">
                        <ul class="center">
                            <li><a href="">Home</a></li>
                            <li><a href="">Gallery</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Contact</a></li>
                            <?php
                                if($session == null) {
                            ?>
                                <li class="login"><a href="" class="blue-bg">Login</a></li>
                                <li class="register"><a href="" class="primary-bg">Register</a></li>
                            <?php
                                } else {
                            ?>
                                <li class="logout"><a href="" class="primary-bg">Logout</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>