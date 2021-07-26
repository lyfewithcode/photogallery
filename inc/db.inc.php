<?php
    $conn = @mysqli_connect('localhost', 'root', '', 'photogallery');
    
    if($conn) {
        // echo 'db selected';
    } else {
        echo 'oops... not connected';
    }

?>