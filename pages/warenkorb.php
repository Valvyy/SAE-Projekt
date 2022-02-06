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
            //Erzeugen der Session
            session_start();

            
            $kundeID = null;
            $warenkorb = array();
            //Checken, ob Kunde angemeldet ist
            if (isset($_SESSION["kundeID"]))
            {
                //KundenID zuweisen (Login Check)
                $kundeID = $_SESSION["kundeID"];
                //Wenn Warenkorb leer/nicht existiert
                if (!isset($_SESSION["warenkorb"]))
                {
                    //Warenkorb erstellen
                    $_SESSION["warenkorb"] = array();
                }
                warenRein(); 
            }
            //Wenn Warenkorb geleert werden soll
            if (isset($_REQUEST["empty"]))
            {
                warenLeeren();
            }

            //Funktion, um die gewünschren Waren in den Warenkorb zu packen
            function warenRein()
            {
                //DB-Verbindung
                $connection = new mysqli('localhost', 'root', '', 'i40_basis');

                //Produkte aus dem Lager sammeln
                $sql = "SELECT produktid FROM produkt";
                $erg = $connection->query($sql);

                for ($i = 0; $i < mysqli_num_rows($erg); $i++)
                {
                    //ProduktID speichern
                    $daten = mysqli_fetch_array($erg);
                    $produkt = $daten['produktid'];

                    //Wenn Produkt aus dem Katalog ausgewählt wurde
                    if (isset($_REQUEST[$produkt]))
                    {
                        //Wenn Produktanzahl min. 1
                        if ($_REQUEST[$produkt] > 0)
                        {
                            //Wenn Produkte noch nicht im Warenkorb
                            if (!isset($_SESSION["warenkorb"][$produkt]))
                            {
                                //Produkte in den Warenkorb hinzufügen
                                $_SESSION["warenkorb"][$produkt] = $_REQUEST[$produkt];
                            }
                            //Wenn Produkte bereits im Warenkorb
                            else
                            {
                                //Aus dem Katalog gewählte Anzahl zu den bereits im WK liegende Produkte dazu addieren
                                $_SESSION["warenkorb"][$produkt] += $_REQUEST[$produkt];
                            }
                        }
                    }
                }
            }

            //Funktion zum leeren des WK
            function warenLeeren()
            {
                foreach ($_SESSION["warenkorb"] as $produkt => $menge)
                {
                    //Produkt entfernen
                    unset($_SESSION["warenkorb"][$produkt]);
                }
            }

            //Funktion zum Anzeigen der Waren
            function warenZeigen()
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
    
                //Weiterleitung zum Bestellabschluss
                echo "<form action='bezahlen.php' method='get'>";
                echo "<input type='submit' value='Jetzt kaufen!'>";
                echo "</form>";

                //Warenkorb leeren
                echo "<form action='warenkorb.php' method='get'>";
                echo "<input type='submit' value='Warenkorb leeren' name='empty'>";
                echo "</form>";
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
                    echo "<h1>Warenkorb</h1>";

                    //Wenn Warenkorb leer
                    if (count($_SESSION["warenkorb"]) == 0)
                    {
                        echo "<p>Puhh, sieht ganz schön leer aus. :/</p>";
                        echo "<p>Vielleicht hilft es, etwas zu kaufen.</p>";
                    }
                    //Wenn Warenkorb nicht leer
                    else
                    {
                        warenZeigen();
                    }
                    echo "<form action='katalog.php' method='get'>";
                    echo "<input type='submit' value='Zurück zum Katalog'>";
                    echo "</form>";
                }
            ?>

        </center>

    </body>
</html>