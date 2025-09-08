<?php
session_start();
$_SESSION['CSRFToken'] = bin2hex(random_bytes(32));
?>

<body>
    <h1>Klotterplanket</h1>

    <form action="klotterplanket/saveMsg.php" method="post">
        <label>Name</label><br />
        <input type="text" name="username" placeholder="Ditt namn" required><br />
        <label>Meddelande</label><br>
        <textarea name="message" cols="45" rows="5" required></textarea><br />
        <input type="hidden" name="CSRFToken" value="<?php echo $_SESSION['CSRFToken']; ?>">
        <input type="submit" value="Skicka">
    </form>

    <?php    
    /**
     * Om filen finns så skrivs innehållet ut
     * Om den inte finns så skapas en tom fil med namnet msg.dat
     * Vid problem ändra rättigheterna på filen msg.dat.
     *
     * OBS! Sökvägen nedan till 'msg.dat' kan behövas ändras. 
     */
    if (file_exists("klotterplanket/msg.dat")) {
        echo file_get_contents("klotterplanket/msg.dat");
    }
    ?>
</body>

</html>