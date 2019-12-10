<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game of Thrones</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="script/jquery-nice-select/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="script/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="script/slick/slick-theme.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="script/jquery-nice-select/js/jquery.nice-select.js"></script>
    <script src="script/slick/slick.js"></script>
</head>
<body>
<section class="section_left">
    <div class="slider">
        <div class="slider_slick carousel">
            <?php
            foreach ($_SESSION['picture'] as $element) {
                echo "<div><img src='images/$element' alt=''></div>";
            }
            ?>
        </div>
    </div>
</section>
<section class="section_right">
    <div class="block_right">
        <h1 id="h1_additional">Game of Thrones</h1>
        <h2><p> Form submitted</p></h2>
    </div>
</section>
<script src="script/script.js"></script>

</body>
</html>
