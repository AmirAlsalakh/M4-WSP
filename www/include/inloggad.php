<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <title>Inloggad</title>
</head>

<body>
    <p><?php
        echo "Välkommen tillbaka!, " . filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        ?></p>

    <form action="logout.php" method="post">
        <input type="submit" value="Logga ut">
    </form>
</body>

</html>