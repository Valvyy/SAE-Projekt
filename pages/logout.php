<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="3;url=/SAE-Projekt/index.html" />

        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/login.css">
        <title>Log out</title>
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

            <?php
                //Durch das Session_destroy() werden die Daten, die im Cache gespeichert wurden, gelöscht und der Kunde ist ausgeloggt
                session_start();
                session_destroy();
                echo "<p class='center-text'><center>Logout erfolgreich! <br> Sie werden in wenigen Sekunden weitergeleitet</center></p>";
            ?>

    </body>
</html>
