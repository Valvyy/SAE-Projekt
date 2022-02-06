<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Anbindung der CSS-Dateien -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/login.css">
        <title>Warenkorb</title>

        <?php
            //Erzeugen einer Session
            session_start();

            //Zuweisen einer KundenID (Login Check)
            $kundeID = null;
            if (isset($_SESSION["kundeID"]))
            {
                $kundeID = $_SESSION["kundeID"];
            }

            //Anzeigen des Status der Produkte
            function traceOrder()
            {

            }

            //Bestellte Produkte anzeigen
            function showOrder()
            {
                //DB-Verbindung
                $connection = new mysqli('localhost', 'root', '', 'i40_basis');

                //Erstellen der Tabelle
                echo "<table>";
                echo "<tr><th>Bestell-Nr.</th><th>Bezeichnung</th><th>Anzhahl</th><th>Preis</th></tr>";
                
                //Gesamtwert des Warenkorbs
                $summe = 0;

                //Für jedes Produkt im Warenkorb
                foreach ($_SESSION["warenkorb"] as $produkt => $menge)
                {
                    //Preis und Produktname sammeln
                    $sql = "SELECT bezeichnung, preis FROM produkt WHERE produktid = '$produkt'";
                    $erg = $connection->query($sql);
                    $daten = mysqli_fetch_array($erg);
                    //Preise formatieren
                    $preis = number_format($daten["preis"], 2, ',', '.');
                    //Als Zeile in die Tabelle eintragen
                    echo "<tr><td>".$produkt."</td><td>".$daten["bezeichnung"]."</td><td>".$menge."</td><td>".$preis." €</td></tr>";
                    $summe = $summe + $menge * $daten["preis"];
                }
                $summe = number_format($summe, 2, ',', '.');
                echo "<tr><td colspan=3>Gesamt:</td><td>".$summe." €</td></tr>";
                echo "<tr><td colspan=3>Bezahlmethode:</td><td>".$_REQUEST["bzM"]."</td></tr>";
                echo "</table>";                
            }

            //Zur Login-Page verweisen
            function showToLogIn()
            {
                echo "<br><br><br>";
                echo "<p class='cat'>Sie sind nicht angemeldet und können deswegen nicht auf den Katalog zugreifen.</p>";
                echo "<p class='cat'>Melden Sie sich an oder registrieren Sie sich, um etwas bestellen zu können!</p>";
                echo "<br><br><br>";
                echo "<form action='login.php'>";
                echo "<input type='submit' value='Log In' class='but' />";
                echo "</form>";
                echo "<form action='signin.php'>";
                echo "<input type='submit' value='Sign In' class='but' />";
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

                //Wenn Kunde nicht eingeloggt
                if ($kundeID == null)
                {
                    showToLogIn();
                }
                //Wenn Kunde eingeloggt
                else
                {
                    echo "<h1>Bestellung abgeschlossen!</h1>";
                    echo "<br>";
                    echo "<h3>Vielen Dank für ihren Einkauf</h3>";
                    echo "<br>";
                    echo "<br>";
                    showOrder();
                    echo "<br>";
                    echo "<br>";
                    echo "<p>Sie können Ihre Bestellung jetzt verfolgen</p>";
                    echo "<br>";
                    traceOrder();
                }

            ?>

        </center>

    </body>
</html>