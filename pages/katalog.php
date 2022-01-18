<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/login.css">
    <title>Katalog</title>

    <?php
        //Session starten
        session_start();

        //Zuweisen einer KundenID, falls vorhanden
        $kundeID = null;
        if (isset ($_SESSION["kundeID"])) 
        {
            $kundeID = $_SESSION["kundeID"];
        }

        //Funktion zum Anzeigen des Kataloges
        function showKatalog()
        {
            //DB-Verbindung
            $connection = mysqli_connect("localhost", "root");
            mysqli_select_db($connection, "sae-projekt");
            //Definieren einer SQL-Query, um die Produkte zu bekommen
            $query = "SELECT * FROM produkt"; 
            $result = mysqli_query($connection, $query);

            //Aufbau der Webseite
            echo "<h1>Wählen Sie ihre Produkte aus unserem großem Sortiment!</h1>";
            echo "<form action='warenkorb.php' method='get'>";
            echo "<table>";
            echo "<tr><th>Bestell-Nr.</th><th>Produkt</th><th>Beschreibung</th><th>Preis</th><th>Anzahl</th></tr>";

            //Für jedes Produkt ein Tabelleneintrag einfügen
            for ($i=0; $i<mysqli_num_rows($result); $i++)
            {
                $daten = mysqli_fetch_array($result);
                $prID = $daten["produktid"];
                $prName = $daten["bezeichnung"];
                $prBeschr = $daten["beschreibung"];
                $prPreis = $daten["preis"];
                echo "<tr><td>".$prID."</td><td>".$prName."</td><td>".$prBeschr."</td><td>".$prPreis."</td><td><input type='text' value=0 name='".$prID."' size='1'></td></tr>";
            }
            echo "</table>";
            echo "<input type='submit' value='Zum Warenkorb'>";
            echo "<input type='reset' value='Zurücksetzen'>";
            echo "</form>";
            //Vollenden der Webseite
        }

        //Wenn Kunde nicht eingeloggt, wird diese Funktion aufgerufen
        //Zeigt dem Kunden 2 Buttons, um sich anzumelden/registrieren
        function showToLogIn()
        {
            echo "<br><br><br>";
            echo "<p class='cat'>Sie sind nicht angemeldet und können deswegen nicht auf den Katalog zugreifen.</p>";
            echo "<p class='cat'>Melden Sie sich an oder registrieren Sie sich, um etwas bestellen zu können!</p>";
            echo "<br><br><br>";
            echo "<form action='login.html'>";
            echo "<input type='submit' value='Log In' class='but' />";
            echo "</form>";
            echo "<form action='signin.html'>";
            echo "<input type='submit' value='Sign In' class='but' />";
            echo "</form>";
        }
    ?>
</head>
<body>
    <nav class="navbar">
        
        <div class="logo"><a href="../index.html">SAE-Projekt</a></div>

        <ul class="nav-links">
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
                <div class="menu">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="katalog.php">Katalog</a></li>
                    <li><a href="impressum.html">Impressum</a></li>
                    <li><a href="login.html">Login</a></li>
                </div>
        </ul>
    </nav>

    <center>
        <?php
            //Checken, ob der Kunde angemeldet ist oder nicht
            if ($kundeID == null)
            {
                showToLogIn();
            }
            else
            {
                showKatalog();
            }
        ?>
    </center>
</body>
</html>