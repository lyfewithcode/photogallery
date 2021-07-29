jQuery(document).ready(function() {

    "use strict";

    $(".rotate").textrotator( {
        animation: "flip", // You can pick the way it animates when rotating through words. Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
        separator: ",", // If you don't want commas to be the separator, you can define a new separator (|, &, * etc.) by yourself using this field.
        speed: 2000 // How many milliseconds until the next word show.
    });

    $(window).scroll(function() {
        var top = $(window).scrollTop();
        if(top >= 70) {
            $("header").addClass('transparent-bg');
        } else {
            if($("header").hasClass('transparent-bg')) {
                $("header").removeClass('transparent-bg')
            }
        }
    });

    $('#user-avatar-upload').on("change", function() {

        var avatarfile = $(this)[0].files[0];
        // alert (avatarfile.type);
        var type = avatarfile.type;
        // alert(type);
        var type1 = type.substring(type.indexOf("/") + 1);
        alert(type1);
        var size = avatarfile.size;

        if(type1 != "png" && type1 != "jpg" && type1 != "jpeg") {
            alert('file type is not supported');
        } else if(size > 500000) {
            alert('file size should be less then 500 Kb');
        } else {
            var formdata = new FormData();
            formdata.append('avatar', avatarfile);
            var xhr = new XMLHttpRequest;
            xhr.addEventListener("load", avatarloadedhandler, false);
            xhr.open('POST', 'avatarchange.php');
            xhr.send(formdata);
            
            function avatarloadedhandler(evt) {
                alert(evt.target.responseText);
            }

        }
    });

});