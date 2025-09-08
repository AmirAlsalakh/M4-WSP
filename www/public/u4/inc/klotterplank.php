<body>
<h1>Klotterplanket</h1>

<form action="inc/saveMsg.php" method="post">
    <label>Meddelande</label><br>
    <textarea name="message" cols="45" rows="5"></textarea><br />    
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
    if(file_exists("inc/msg.txt")){
        echo("<p>" . file_get_contents("inc/msg.txt") ."<p> <br>") ;
    }
?>
</body>
