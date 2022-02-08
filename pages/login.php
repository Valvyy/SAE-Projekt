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

            //Für den Kunden alle seine letzten Bestellung anzeigen
            function showOrders($kundeID)
            {
                //DB-Verbindung
                $connection = new mysqli('localhost', 'root', '', 'i40_basis');

                //Erstellen der Tabelle
                echo "<table>";
                echo "<tr><th>Bestell-Nr.</th><th>Bezeichnung</th><th>Preis</th><th>Status</th></tr>";

                //Alle Bestellungen des Kunden sammeln
                $sql = "SELECT bestellungsid, produkt FROM bestelluebersicht WHERE konto = '$kundeID'";
                $erg = $connection->query($sql);

                //Für jede Bestellung des Kunden
                for ($i = 0; $i < mysqli_num_rows($erg); $i++)
                {
                    $daten = mysqli_fetch_array($erg);

                    //Bezeichnung und Preis sammeln
                    $sql = "SELECT bezeichnung, preis FROM produkt WHERE produktid = '".$daten["produkt"]."'";
                    $result = $connection->query($sql);
                    $data = mysqli_fetch_array($result);

                    //Status der Bestellungen sammeln
                    $sql = "SELECT status FROM bestellposition WHERE bestellung = '".$daten["bestellungsid"]."'";
                    $result = $connection->query($sql);
                    $status = $result->fetch_object();
                    $status = $status->status;

                    //Status ausgeben
                    if ($status == 1)
                    {
                        $status = "Wird bearbeitet";
                    }
                    elseif ($status == 2) 
                    {
                        $status = "Wurde versandt";
                    }
                    elseif ($status == 3) 
                    {
                        $status = "In Zustellung";
                    }
                    elseif ($status == 4) 
                    {
                        $status = "Empfangen";
                    }

                    //Tabelle befüllen
                    $preis = number_format($data["preis"], 2, ',', '.');
                    echo "<tr><td>".$daten["bestellungsid"]."</td><td>".$data["bezeichnung"]."</td><td>".$preis." €</td><td>".$status."</td></tr>";
                }
                echo "</table>";
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
                    echo "<h1>Ihre letzte Bestellung</h1>";
                    echo "<br>";
                    echo "<br>";
                    showOrders($kundeID);
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    alreadyLoggedIn();
                }
            ?>
        </center>
    </body>
</html>