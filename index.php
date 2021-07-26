<?php
    include 'inc/header.php';
    include 'inc/slider.php';
    if($session != null) {
        include 'inc/user-page.php';
    }
    if($session == null) {
        include 'inc/gallery-home.php';
        include 'inc/recent-uploads.php';
        include 'inc/top-uploaders.php';
    }
    include 'inc/footer.php';
?>