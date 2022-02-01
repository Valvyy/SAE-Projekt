<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/login.css">
    <title>Sign In</title>

    <?php
        $sessionID = md5(date("h:i:sa"));
        session_id($sessionID);
        session_start();

        $kundeID = null;
        $connection = new mysqli('localhost', 'root', '', 'i40_basis');

        if (isset ($_REQUEST["signin"]))
        {
            $name = $_POST['name'];
            $adresse = $_POST['adress'];
            $email = $_POST['email'];
            $username = $_POST['uname'];
            $passwort = $_POST['psw'];

            $sql = "SELECT * FROM kunde WHERE name = '$name' AND adresse = '$adresse'";
            $result = $connection->query($sql);
            $kun = mysqli_fetch_array($result);
            
            if (!$kun)
            {
                $sql = "INSERT INTO kunde (name, adresse) VALUES ('$name', '$adresse')";
                $result = $connection->query($sql);

                $sql = "SELECT * FROM kunde WHERE name = '$name' AND adresse = '$adresse'";
                $result = $connection->query($sql);
                $kunde = mysqli_fetch_array($result);

                $id = $kunde["kundeid"];
            }
            else
            {
                $id = $kun["kundeid"];
            }


            $sql = "SELECT * FROM kundenkonto WHERE username = '$username' OR email = '$email'";
            $result = $connection->query($sql);
            $user = mysqli_fetch_array($result);
 
            if (!$user)
            {
                $sql = "INSERT INTO kundenkonto (kunde, username, passwort, email) VALUES ('$id', '$username', '$passwort', '$email')";
                $result = $connection->query($sql);

                $sql = "SELECT kontoid FROM kundenkonto WHERE username = '$username'";
                $result = $connection->query($sql);
                $kundeID = mysqli_fetch_array($result);
            }
            else
            {
                $kundeID = null;
            }
        }

        $_SESSION["kundeID"] = $kundeID;
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
        <h1>Registrierung</h1>

        <?php
            if ($kundeID == null)
            {
                echo "<p>Nutzername oder Email existieren bereits!</p>";
                echo "<p>Bitte versuchen Sie es nochmal</p>";
                echo "<form action='signin.php' method='get'>";
                echo "<input type='submit' value='Zur Registrierung'>";
                echo "</form>";
            }
            else
            {
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
