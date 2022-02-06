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

            $kundeID = null;
            $warenkorb = null;
            if (isset($_SESSION["kundeID"]))
            {
                $kundeID = $_SESSION["kundeID"];
            }

            function zeigBestellung()
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
                    //Als Zeile in die Tabelle eintragen
                    $preis = number_format($daten["preis"], 2, ',', '.');
                    echo "<tr><td>".$produkt."</td><td>".$daten["bezeichnung"]."</td><td>".$menge."</td><td>".$preis." €</td></tr>";
                    $summe = $summe + $menge * $daten["preis"];
                }
                $summe = number_format($summe, 2, ',', '.');
                echo "<tr><td colspan=3>Gesamt:</td><td>".$summe." €</td></tr>";
                echo "</table>";   
            }

            function zeigBezahlmethoden()
            {
                echo "<form action='bestellabschluss.php' method='get'>";
                echo "<p>Bitte wählen Sie ein Zahlungsmittel</p>";
                echo "<input type='button' name="
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

    </body>
</html>