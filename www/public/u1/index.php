<?php
session_start();

include '../../include/pwd.php';
if (isset($_POST['password']) && password_verify($_POST['password'], $hashCode) && $_POST['username'] == "Amir" && isset($_POST['username'])) {
    $_SESSION['inloggad'] = true;
}

if (isset($_SESSION['inloggad']) && $_SESSION['inloggad']) {
    $_SESSION['username'] = $_POST['username'] ?? "";
    include '../../include/inloggad.php';
}else{
    include '../../include/ejinloggad.php';
}
?>
