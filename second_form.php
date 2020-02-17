<?php
session_start();
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
        <h1 id="h1_additional">Game of Thrones</h1>
        <div class="block_right_tag">
            <h4><p>You've successfully joined the game.</p>
                <p> Tell us more about yourself.</p></h4>
        </div>
        <form autocomplete="off" action="" class="form_2" id="form_2" method="post">
            <div class="submit_form">
                <label for="text">Who are you?</label>
                <label for="name" id="label_text_name">Alpha-numeric username</label>
                <input type="text" id="name" name="name" placeholder="arya"
                       value="">
                <div class="error" id="nameEROR">
                </div>
            </div>
            <div class="submit_form ">
                <label class="text_house">Your Great House</label>
                <select class="select_house" id="select_house" name="select_house">
                    <option data-display="Select House">Select House</option>
                    <option value="Stark">Stark</option>
                    <option value="Targaryen">Targaryen</option>
                    <option value="Lannister">Lannister</option>
                    <option value="Baratheon">Baratheon</option>
                </select>
                <div class="error" id="houseEROR">
                </div>
            </div>
            <div class="submit_form">
                <label for="text_preferences">Your preferences, hobbies, wishes, etc.</label>
                <input type="textarea" id="text_preferences" name="text_preferences"
                       placeholder="I have long TOKILL list..."
                       value="">
                <div class="error" id="textEROR">
                </div>
            </div>
            <button type="submit" id="save" name="buttonTwo">
                Save
            </button>
        </form>
    </div>
</section>
<script src="script/script.js"></script>
</body>
</html>
