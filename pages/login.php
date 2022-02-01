<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/login.css">
    <title>Login</title>
    <?php
        session_start();
        
        $kundeID = null;
        if (isset ($_SESSION["kundeID"]))
        {
            $kundeID = $_SESSION["kundeID"];
        }

        function login() 
        {
            echo "<form action='loggingin.php' method='post'>";
            echo "<div class='container'>";
            echo "<label for='uname'><b>Nutzername</b></label>";
            echo "<input type='text' placeholder='Benutzername eingeben' name='uname' required>";
            echo "<label for='psw'><b>Passwort</b></label>";
            echo "<input type='password' placeholder='Passwort eingeben' name='psw' required>";
            echo "<button id='login' name='login' type='submit'>Login</button>";
            echo "<button id='signin' onclick='location.href=\"signin.php\";'>Kein Konto? Erstellen Sie eins!</button>";
            echo "</div>";
            echo "</form>";
        }

        function alreadyLoggedIn()
        {
            echo "<p>Sie sind schon eingeloggt!</p>";
            echo "<form action='logout.php' metho='post'>";
            echo "<button id='logout'>Ausloggen</button>";
            echo "</form>";
        }
    ?>
</head>
<body>
    <header>
        <nav class="navbar">

            <div class="logo"><a href="/SAE-Projekt/index.html" > <font color="white">Blackline Solutions GmbH</font></a></div>
    
            <ul class="nav-links">
                <input type="checkbox" id="checkbox_toggle" />
                <label for="checkbox_toggle" class="hamburger">&#9776;</label>
                    <div class="menu">
                        <li><a href="/SAE-Projekt/index.html">Home</a></li>
                        <li><a href="/SAE-Projekt/pages/katalog.php">Katalog</a></li>
                        <li><a href="/SAE-Projekt/pages/impressum.html">Impressum</a></li>
                        <li><a href="/SAE-Projekt/pages/login.php">Login</a></li>
                    </div>
            </ul>
        </nav>
    </header>

    <center>
        <?php
            //Checken, ob der Kunde angemeldet ist
            if ($kundeID == null)
            {
                login();
            }
            else
            {
                alreadyLoggedIn();
            }
        ?>
    </center>
</body>
</html>