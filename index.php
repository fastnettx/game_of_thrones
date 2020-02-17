<?php
session_start();
include 'php/validation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game of Thrones</title>
    <link href="style/style.css" rel="stylesheet">
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
        <h1>Game of Thrones</h1>
        <form autocomplete="off" id="form_1" method="post">
            <div class="submit_form">
                <label for="email">Enter your email</label>
                <input type="email" id="email" name="email" placeholder="arya@westeros.com" required
                       value="<?= isset($_SESSION['emailUser']) ? $_SESSION['emailUser'] : '' ?>">
                <div class="error">
                    <?= isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : '' ?>
                </div>
            </div>
            <div class="submit_form">
                <label for="password"><p>Choose secure password</p></label>
                <p class="submit_form_password">Must be at least 8 characters</p>
                <input type="password" id="password" name="password" placeholder="password"
                       minlength="8" required>
                <div class="error">
                    <?= isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : '' ?>
                </div>
            </div>
            <div class="remember_form">
                <input type="checkbox" id="checkbox" name="checkbox">
                <label for="checkbox">Remember me</label>
            </div>
            <button type="submit" id="button" name="button">
                Sign up
            </button>
        </form>
    </div>
</section>
<script src="script/script.js"></script>
</body>
</html>