<?php
    include 'function.php';
?>

<section class="user-profile">
    <div class="section-header center">
        <h1>Welcome <?php echo ucfirst($session); ?></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 avatar">
                <h2>Avatar</h2>
            </div>
            <div class="col-md-8 profile">
                <h2>Profile Information</h2>
                <div class="profile-information">
                    <?php get_profile_info($session); ?>
                </div>
                <h6><a href="#">Change Profile Information</a></h6>
            </div>
        </div>

    </div>
</section>
<section class="upload-image">
    
</section>
<section class="user-gallery">

</section>