<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Anbindung der CSS-Dateien -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/login.css">
        <title>Sign In</title>

        <?php
            //Erzeugen einer Session
            $sessionID = md5(date("h:i:sa"));
            session_id($sessionID);
            session_start();

            
            $kundeID = null;

            //DB-Verbindungsaufbau
            $connection = new mysqli('localhost', 'root', '', 'i40_basis');

            //Register-Daten speichern
            if (isset ($_REQUEST["signin"]))
            {
                $name = $_POST['name'];
                $adresse = $_POST['adress'];
                $email = $_POST['email'];
                $username = $_POST['uname'];
                $passwort = $_POST['psw'];

                //Name und Adresse der Kunden mit eingegebenen Daten vergleichen
                $sql = "SELECT * FROM kunde WHERE name = '$name' AND adresse = '$adresse'";
                $result = $connection->query($sql);
                $kun = mysqli_fetch_array($result);
                
                //Wenn Kunde nicht bereits registriert
                if (!$kun)
                {
                    //Einfügen der Kundendaten
                    $sql = "INSERT INTO kunde (name, adresse) VALUES ('$name', '$adresse')";
                    $result = $connection->query($sql);

                    $sql = "SELECT * FROM kunde WHERE name = '$name' AND adresse = '$adresse'";
                    $result = $connection->query($sql);
                    $kunde = mysqli_fetch_array($result);

                    //Speichern der KundenID
                    $id = $kunde["kundeid"];
                }
                //Wenn Kunde bereits registrier
                else
                {
                    //Speichern der KundenID
                    $id = $kun["kundeid"];
                }

                //Checken, ob eingegebene Kontodaten bereits vorhanden
                $sql = "SELECT * FROM kundenkonto WHERE username = '$username' OR email = '$email'";
                $result = $connection->query($sql);
                $user = mysqli_fetch_array($result);
    
                //Wenn Kontodaten nicht vorhanden (Kunde noch nicht registriert)
                if (!$user)
                {
                    //Einfügen der Kontodaten und Ausgabe der KontoID als KundenID
                    $sql = "INSERT INTO kundenkonto (kunde, username, passwort, email) VALUES ('$id', '$username', '$passwort', '$email')";
                    $result = $connection->query($sql);

                    $sql = "SELECT kontoid FROM kundenkonto WHERE username = '$username'";
                    $result = $connection->query($sql);
                    $kundeID = mysqli_fetch_array($result);
                }
                //Wenn Kunde bereits registriert
                else
                {
                    //Kunde nicht eingeloggt
                    $kundeID = null;
                }
            }

            //Login
            $_SESSION["kundeID"] = $kundeID;
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
            <h1>Registrierung</h1>

            <?php
                //Wenn Kunde nicht eingeloggt
                if ($kundeID == null)
                {
                    echo "<meta http-equiv='refresh' content='3;url=/SAE-Projekt/pages/signin.php' />";
                    echo "<p>Nutzername oder Email existieren bereits!</p>";
                    echo "<p>Bitte versuchen Sie es nochmal</p>";
                    echo "<form action='signin.php' method='get'>";
                    echo "<input type='submit' value='Zur Registrierung'>";
                    echo "</form>";
                }
                //Wenn Kunde eingeloggt
                else
                {
                    echo "<meta http-equiv='refresh' content='3;url=/SAE-Projekt/pages/katalog.php' />";
                    echo "<p>Herzlich Willkommen, ".$username."!</p>";
                    echo "<p>Sie wurden angemeldet!</p>";
                    echo "<p>Sie können jetzt einkaufen gehen. Viel Spaß!</p>";
                    echo "<form action='katalog.php' method='get'>";
                    echo "<input type='submit' value='Los gehts!'>";
                    echo "</form>";
                }
            ?>
        </center>
    </body>
</html>
