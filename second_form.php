<?php
session_start();
unset($_SESSION['textErr']);
unset($_SESSION['selectErr']);
unset($_SESSION['textareaErr']);
if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['buttonTwo'])) {
    checkFormTwo();
}
function checkFormTwo()
{
<<<<<<< HEAD
    $_SESSION['textName'] = $textName = $_POST['text_name'];
    $_SESSION['textPreferences'] = $textPreferences = $_POST['text_preferences'];
    $selectHouse = $_POST['select_house'];
    if (strlen($textName) < 2) {
=======
    $text_name = $_POST['text_name'];
    $textPreferences = $_POST['text_preferences'];
    $selectHouse = $_POST['select_house'];
    if (strlen($text_name) < 2) {
>>>>>>> 29442f0f51a0eea8ea729321776abc75b38d2528
        $_SESSION['textErr'] = "Enter a name more than two characters";
        return;
    }
    if ($selectHouse == 'Select House') {
        $_SESSION['selectErr'] = "Choose a house";
        return;
    }
    if (strlen($textPreferences) < 5) {
        $_SESSION['textareaErr'] = "Enter text over five characters";
        return;
    };
<<<<<<< HEAD
    appendToFile($textName, $textPreferences, $selectHouse);
=======
    appendToFile($text_name, $textPreferences, $selectHouse);
>>>>>>> 29442f0f51a0eea8ea729321776abc75b38d2528
    header('location: submit.php');
}

function appendToFile($text_name, $textPreferences, $selectHouse)
{
    $string = file_get_contents($_SESSION['fileName']);
    $array = json_decode($string, TRUE);
    $array['name'] = $text_name;
    $array['comment'] = $textPreferences;
    $array['house'] = $selectHouse;
    file_put_contents($_SESSION['fileName'], json_encode($array));
    unset($array);
}

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
        <div class="block_right_tag">
            <h4><p>You've successfully joined the game.</p>
                <p> Tell us more about yourself.</p></h4>
        </div>
        <form action="" class="form_2" id="form_2" method="post">
            <div class="submit_form">
                <label for="text">Who are you?</label>
                <label for="text" id="label_text_name">Alpha-numeric username</label>
<<<<<<< HEAD
                <input type="text" id="text" name="text_name" placeholder="arya"
                       value="<?= isset($_SESSION['textName']) ? $_SESSION['textName'] : '' ?>">
=======
                <input type="text" id="text" name="text_name" placeholder="arya">
>>>>>>> 29442f0f51a0eea8ea729321776abc75b38d2528
                <div class="error">
                    <?= isset($_SESSION['textErr']) ? $_SESSION['textErr'] : '' ?>
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
                <div class="error">
                    <?= isset($_SESSION['selectErr']) ? $_SESSION['selectErr'] : '' ?>
                </div>
            </div>
            <div class="submit_form">
                <label for="textarea">Your preferences, hobbies, wishes, etc.</label>
                <input type="textarea" id="textarea" name="text_preferences"
<<<<<<< HEAD
                       placeholder="I have long TOKILL list..."
                       value="<?= isset($_SESSION['textPreferences']) ? $_SESSION['textPreferences'] : '' ?>">
=======
                       placeholder="I have long TOKILL list...">
>>>>>>> 29442f0f51a0eea8ea729321776abc75b38d2528
                <div class="error">
                    <?= isset($_SESSION['textareaErr']) ? $_SESSION['textareaErr'] : '' ?>
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
