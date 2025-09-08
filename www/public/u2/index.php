<?php
session_start();

include '../../include2/pwd.php';
if (isset($_POST['password']) && password_verify($_POST['password'], $hashCode) && $_POST['username'] == "Amir" && isset($_POST['username'])) {
    session_regenerate_id(true);
    $_SESSION['username'] = $_POST['username'] ?? "";
    $_SESSION['inloggad'] = true;
}

if (isset($_SESSION['inloggad']) && $_SESSION['inloggad']) {
    include '../../include2/inloggad.php';
}else{
    include '../../include2/ejinloggad.php';
}
?>
