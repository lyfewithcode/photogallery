<?php
    include './function.php';
?>

<section class="gallery-content">
    <div class="section-header center">
        <h2>Gallery Images</h2>
    </div>
    <div class="container">
        <div class="row">
            <?php get_home_gallery_content(6); ?>
        </div>
    </div>
</section>