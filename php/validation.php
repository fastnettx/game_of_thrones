<?php
$_SESSION['picture'] = ['stark.jpg', 'barateon.jpg', 'lannister.jpg', 'targarien.jpg'];
unset($_SESSION['emailErr']);
unset($_SESSION['passwordErr']);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button'])) {
    checkForm();
}


function checkForm()
{
    $_SESSION['test'] ='TEST!';
    $email = $_SESSION['emailUser'] = $_POST['email'];
    $password = $_POST['password'];
    $switch = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailErr'] = "Invalid email format";
        return;
    }
    $file = str_replace(array("/", "|", "\\", ">", "<", "*", ";", "?", "*"), "", $email);
    $_SESSION['fileName'] = 'users/' . $file . '.json';

    if (!preg_match('/^[0-9a-zA-Z!@#$%^&*]{8,30}$/', $password)) {
        $_SESSION['passwordErr'] = "Password must be at least 8 characters, contain at least one capital letter,
         number and special character.";
        return;
    }
    if (checkMail($email) && !checkPassword($password)) {
        $_SESSION['emailErr'] = "A user with such an e-mail exists, enter the password correctly.";
        return;
    }
    if (checkMail($email) && checkPassword($password)) {
        $switch = false;
    }
    if ($switch) {
        writeToFile($password);
    }

    header('location: second_form.php');
}

function checkMail($email)
{
    $folder = scandir('users');
    $file = str_replace(array("/", "|", "\\", ">", "<", "*", ";", "?", "*"), "", $email);
    if (in_array($file . '.json', $folder)) {
        return true;
    }
    return false;
}

function checkPassword($password)
{
    $string = file_get_contents($_SESSION['fileName']);
    $array = json_decode($string, TRUE);
    if ($array['password'] == $password) {
        return true;
    }
    return false;
}

function writeToFile($password)
{
    $array['password'] = $password;
    file_put_contents($_SESSION['fileName'], json_encode($array));
}
