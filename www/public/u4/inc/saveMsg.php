<?php
session_start();
if ($_SESSION['CSRFToken'] === $_POST['CSRFToken']) {
    $name = "<hr><p>Från: " . $_SESSION['user'] . "</p>";
    $msg = "<p>" . filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . "</p>";

    file_put_contents("msg.txt", $name . $msg, FILE_APPEND);

    header("location: ../index.php?page=klotterplank");
} else {
    header("location: ../blockerad.php");
}

/**
 * Formaterar och sparar namn samt meddelande till filen
 * msg.dat
 * 
 * Programmet saknar nödvändiga kontroller
 * @author Henrik Bygren
 */
