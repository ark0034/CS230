<?php
require 'includes/header.php';
require 'includes/dbhandler.php';
?>

<main>

    <link rel="stylesheet" href="css/profile.css">
    <script>
    function triggered() {
        document.querySelector("#gallery-image").click();
    }

    function preview(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#gallery-display').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    </script>
    <?php
    if(isset($_SESSION['uid'])){
    ?>
    <div class="h-50 center-me text-center">
        <div class="my-auto">

            <form action="includes/gallery-helper.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <img src="images/default.jpeg" alt="gallery pic" onclick="triggered();" id="gallery-display" style="margin-bottom: 15px;">

                    <input type="text" name="title" class="form-control" placeholder="title..">
                    <input type="file" name="gallery-image" id="gallery-image" onchange="preview(this)" class="form-control"
                        style="display: none;">
                </div>
                <div class="form-group">
                    <textarea name="description" id="bio" cols="30" rows="10" placeholder="include a description" style="text-align: center; border-radius: 25px;"></textarea>
                </div>
                <div class="form-group">
                    <button type = "submit" name = "gallery-submit" class = "btn btn-outline-dark btn-lg btn-block">Upload</button>
                </div>
                

            </form>



        </div>

        <?php
}
?>
</main>