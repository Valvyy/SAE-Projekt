<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/login.css">
        <title>Warenkorb</title>

        <?php
            session_start();

            $kundeID = null;
            $warenkorb = array();
            if (isset($_SESSION["kundeID"]))
            {
                $kundeID = $_SESSION["kundeID"];
                if (!isset($_SESSION["warenkorb"]))
                {
                    $_SESSION["warenkorb"] = array();
                }
                warenRein();
            }
            if (isset($_REQUEST["empty"]))
            {
                warenLeeren();
            }

            function warenRein()
            {
                $connection = new mysqli('localhost', 'root', '', 'i40_basis');

                $sql = "SELECT produktid FROM produkt";
                $erg = $connection->query($sql);

                for ($i = 0; $i < mysqli_num_rows($erg); $i++)
                {
                    $daten = mysqli_fetch_array($erg);
                    $produkt = $daten['produktid'];

                    if (isset($_REQUEST[$produkt]))
                    {
                        if ($_REQUEST[$produkt] > 0)
                        {
                            if (!isset($_SESSION["warenkorb"][$produkt]))
                            {
                                $_SESSION["warenkorb"][$produkt] = $_REQUEST[$produkt];
                            }
                            else
                            {
                                $_SESSION["warenkorb"][$produkt] += $_REQUEST[$produkt];
                            }
                        }
                    }
                }
            }

            function warenLeeren()
            {
                foreach ($_SESSION["warenkorb"] as $produkt => $menge)
                {
                    unset($_SESSION["warenkorb"][$produkt]);
                }
            }

            function warenZeigen()
            {
                $connection = new mysqli('localhost', 'root', '', 'i40_basis');

                echo "<table>";
                echo "<tr><th>Bestell-Nr,</th><th>Bezeichnung</th><th>Anzhahl</th><th>Preis</th></tr>";
                
                foreach ($_SESSION["warenkorb"] as $produkt => $menge)
                {
                    $sql = "SELECT bezeichnung, preis FROM produkt WHERE produktid = '$produkt'";
                    $erg = $connection->query($sql);
                    $daten = mysqli_fetch_array($erg);
                    echo "<tr><td>".$produkt."</td><td>".$daten["bezeichnung"]."</td><td>".$menge."</td><td>".$daten["preis"]."</td></tr>";
                }
                echo "</table>";
    
                echo "<form action='bezahlen.php' method='get'>";
                echo "<input type='submit' value='Jetzt kaufen!'>";
                echo "</form>";

                echo "<form action='warenkorb.php' method='get'>";
                echo "<input type='submit' value='Warenkorb löschen' name='empty'>";
                echo "</form>";
            }

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
        <header>
            <nav class="navbar">

                <div class="logo"><a href="/SAE-Projekt/index.html" > <font color="white">Blackline Solutions GmbH</font></a></div>
        
                <ul class="nav-links">
                    <input type="checkbox" id="checkbox_toggle" />
                    <label for="checkbox_toggle" class="hamburger">&#9776;</label>
                        <div class="menu">
                            <li><a href="/SAE-Projekt/index.html">Home</a></li>
                            <li><a href="/SAE-Projekt/pages/katalog.php">Katalog</a></li>
                            <li><a href="/SAE-Projekt/pages/impressum.html">Impressum</a></li>
                            <li><a href="/SAE-Projekt/pages/login.php">Login</a></li>
                        </div>
                </ul>
            </nav>
        </header>
        <center>
            <?php
                if ($kundeID == null)
                {
                    showToLogIn();
                }
                else
                {
                    echo "<h1>Warenkorb</h1>";

                    if (count($_SESSION["warenkorb"]) == 0)
                    {
                        echo "<p>Puhh, sieht ganz schön leer aus. :/</p>";
                        echo "<p>Vielleicht hilft es, etwas zu kaufen.</p>";
                    }
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