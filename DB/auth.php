<?php

function isLogin()
{
    if (isset($_SESSION['valid'])) {
        return false;
    }
    return true;
}
function checkLogin($email, $password)
{
    include "./DB/dbConnection.php";
    include "./DB/dbClass.php";
    $login = new dbClass();
    if (!empty($email) && !empty($password)) {
        $checkEmail = $login->dbSelectOne("tb_user", "*", "us_email = '$email'");
        if ($checkEmail) {
            if ($passwordHash = password_verify($password, $checkEmail['us_passwordHash'])) {
                $_SESSION['us_id'] = $checkEmail['us_id'];
                $_SESSION['us_name'] = $checkEmail['us_name'];
                $_SESSION['us_image'] = $checkEmail['us_image'];
                $_SESSION['us_isAdmin'] = $checkEmail['us_isAdmin'];
                $_SESSION['valid'] = true;
                header("location : {$_SERVER['HTTP_ORIGIN']}/admin_dashboard");
                return true;
            }
        }
    }
    return false;
}
if (isset($_GET['clear'])) {
    if ($_GET['clear'] === 'logout') {
        session_start();
        session_destroy();
        unset($_SESSION);
    }
    header("location: {$_SERVER['HTTP_ORIGIN']}/admin_dashboard");
}
?>