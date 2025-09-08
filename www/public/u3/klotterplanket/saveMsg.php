<?php
session_start();

if ($_SESSION['CSRFToken'] === $_POST['CSRFToken']) {
    /**
     * Formaterar och sparar namn samt meddelande till filen
     * msg.dat
     * 
     * Programmet saknar nödvändiga kontroller
     * @author Henrik Bygren
     */

    $name = "<hr><p>Från: " . filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . "</p>";
    $msg = "<p>" . filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS) . "</p>";
    file_put_contents("msg.dat", $name . $msg, FILE_APPEND);

    header("location: ../index.php"); //Omdirigerar till klotterplanket
} else {
    header("Location: ../blockerad.php");
}
