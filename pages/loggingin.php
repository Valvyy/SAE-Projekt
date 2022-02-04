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
            //Erzeugen einer Session ID
            $sessionID = md5(date("h:i:sa"));
            session_id($sessionID);
            session_start();

            //Setzen der Kunden-ID, um den Login-Status zu checken
            $kundeID = null;

            //Login-Daten speichern und Login checken
            if (isset($_REQUEST["login"]) && isset($_REQUEST["uname"]) && isset($_REQUEST["psw"])) 
            {
                $name = $_POST['uname'];
                $pw = $_POST['psw'];
                $kundeID = checkData($name, $pw);
                $_SESSION['kundeID'] = $kundeID; 
            }

            //Funktion, um Login-Daten zu checken
            function checkData($uname, $psw) 
            {
                //DB-Verbindung
                $connection = mysqli_connect("localhost", "root");
                mysqli_select_db($connection, "i40_basis");
                //Definieren der SQL-Query, um die Logindaten zu bekommen
                $query = "SELECT * FROM kundenkonto WHERE username = '$uname'";
                $result = mysqli_query($connection, $query);
                $user = mysqli_fetch_array($result);

                //Checken, ob Passwort und Username richtig sind
                $id = null;
                if ($user['username'] == $uname && $psw == $user['passwort'])
                {
                    $id = $user['kontoid'];
                }

                //Rückgabe ob Login erfolgreich oder nicht
                return $id;
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
            <h1>Log In</h1>

            <?php
                //Checken, ob Kunden angemeldet sind
                if ($kundeID == null)
                {
                    echo "<meta http-equiv='refresh' content='3;url=/SAE-Projekt/pages/login.php' />";
                    echo "<p>Nutzername oder Passwort ist falsch!</p>";
                    echo "<p>Bitte versuchen Sie es nochmal</p>";
                    echo "<form action='login.php' method='get'>";
                    echo "</form>";
                }
                else
                {
                    echo "<meta http-equiv='refresh' content='3;url=/SAE-Projekt/pages/katalog.php' />";
                    echo "<p>Herzlich Willkommen, ".$name."!</p>";
                    echo "<form action='katalog.php' method='get'>";
                    echo "Sie werden in wenigen Sekunden weiter geleitet.";
                    echo "</form>";
                }
            ?>
        </center>
    </body>
</html>