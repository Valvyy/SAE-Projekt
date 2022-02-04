<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Anbindung der CSS-Dateien -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/login.css">
        <title>Login</title>
        
        <?php
            //Session starten
            session_start();
            
            //Zuweisen einer KundenID, falls vorhanden (Login Check)
            $kundeID = null;
            if (isset ($_SESSION["kundeID"]))
            {
                $kundeID = $_SESSION["kundeID"];
            }

            //Funktion, die verwendet wird, wenn nicht eingeloggt
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

            //Funktion, die verwendet wird, wenn eingeloggt
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

        <!-- Navigationsleiste, alles zwischen <nav> </nav> füllt die Navigationsleiste  -->
        <header>
            <nav class="navbar">

                <!-- Projektname links auf der Landingpage -->
                <div class="logo"><a href="/SAE-Projekt/index.html" > <font color="white">Blackline Solutions GmbH</font></a></div>
        
                <!-- Liste der Seiten des Webshops (Homepage, Katalog, Impressum, Login/Register) -->
                <ul class="nav-links">

                    <!-- 
                        Bei Verkleinerung des Browserfensters wird die Navigationsleiste skaliert
                        also die Listenpunkte verschwinden und ein Listensymbol wird aufgezeigt 
                    -->
                    <input type="checkbox" id="checkbox_toggle" />
                    <label for="checkbox_toggle" class="hamburger">&#9776;</label>

                    <div class="menu">
                        <li><a href="/SAE-Projekt/index.html">Home</a></li> <!-- Link zur Homepage -->
                        <li><a href="/SAE-Projekt/pages/katalog.php">Katalog</a></li> <!-- Link zur Katalog -->
                        <li><a href="/SAE-Projekt/pages/impressum.html">Impressum</a></li> <!-- Link zur Impressum -->
                        <li><a href="/SAE-Projekt/pages/login.php">Login</a></li> <!-- Link zum Login/Register -->
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