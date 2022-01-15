<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/style.css">
    <title>Katalog</title>

    <?php
        session_start();

        $kundeID = null;
        if (isset ($_SESSION["kundeID"])) 
        {
            $kundeID = $_SESSION["kundeID"];
        }

        function showKatalog()
        {
            #$con = mysqli_connect("localhost", "root");
            #mysqli_select_db($con, "Datenbank");
            #$query = "SELECT * FROM produkt";
            #$res = mysqli_query($con, $query);


            echo "<h1>Wählen Sie ihre Produkte aus unserem großem Sortiment!</h1>";
            echo "<form action='warenkorb.php' method='get'>";
            echo "<table>";
            echo "<tr><th>Bestell-Nr.</th><th>Produkt</th><th>Anzahl</th></tr>";

            #for ($i=0; $i<mysqli_num_rows($res); $i++)
           # {
           #     $daten = mysqli_fetch_array($res);
           #     $prID = $daten["produktID"];
           #     $prName = $daten["bezeichnung"];
           #     echo "<tr><td>".$prID."</td><td>".$prName."</td><td><input type='text' value=0 name='".$prID."' size='1'></td></tr>";
           # }
            echo "</table>";
            echo "<input type='submit' value='Zum Warenkorb'>";
            echo "<input type='reset' value='Zurücksetzen'>";
            echo "</form>";
        }

        function showToLogIn()
        {
            echo "<p class='cat'>Sie sind nicht angemeldet und können deswegen nicht auf den Katalog zugreifen</p>";
            echo "<p class='cat'>Melden Sie sich an oder registrieren Sie sich, um etwas bestellen zu können!</p>";
            echo "<form action='login.html'>";
            echo "<input type='submit' value='Log In' />";
            echo "</form>";
            echo "<form action='signin.html'>";
            echo "<input type='submit' value='Sign In' />";
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