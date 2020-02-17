<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['data'])) {
    $name = $_POST['name'];
    $house = $_POST['house'];
    $text = $_POST['text'];
    echo secondVerificationForm($name, $house, $text);
}

function secondVerificationForm($name, $house, $text)
{
    if (strlen($name) < 2) {
        return 'nameEROR';
    }
    if ($house == 'Select House') {
        return 'houseEROR';
    }
    if (strlen($text) < 5) {
        return 'textEROR';
    };
    appendToFile($name, $text, $house);
    unset($_SESSION['emailUser']);
    return $_SESSION['fileName'];
}

function appendToFile($text_name, $textPreferences, $selectHouse)
{
    $string = file_get_contents('../' . $_SESSION['fileName']);
    $array = json_decode($string, TRUE);
    $array['name'] = $text_name;
    $array['comment'] = $textPreferences;
    $array['house'] = $selectHouse;
    file_put_contents('../' . $_SESSION['fileName'], json_encode($array));
    unset($array);
}
