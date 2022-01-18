<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php
        //Erzeugen einer Session ID
        $sessionID = md5(date("h:i:sa"));
        session_id($sessionID);
        session_start();

        
        $kunde_id = null;
        if (isset($_REQUEST["login"]) && isset($_REQUEST["uname"]) && isset($_REQUEST["psw"])) 
        {
            $name = $_POST['uname'];
            $pw = $_POST['psw'];
            $kunde_id = checkData($name, $pw);
            $_SESSION['kundeID'] = $kunde_id; 
        }

        //Funktion, um Login-Daten zu checken
        function checkData($uname, $psw) 
        {
            //DB-Verbindung
            $connection = mysqli_connect("localhost", "root");
            mysqli_select_db($connection, "sae-projekt");
            //Definieren der SQL-Query, um die Logindaten zu bekommen
            $query = "SELECT * FROM kundenkonto WHERE benutzername = '$uname'";
            $result = mysqli_query($connection, $query);
            $user = mysqli_fetch_array($result);

            //Checken, ob Passwort und Username richtig sind
            $id = null;
            if ($user['benutzername'] == $uname && $psw == $user['passwort'])
            {
                $id = $user['kontoid'];
            }

            //Rückgabe ob Login erfolgreich oder nicht
            return $id;
        }
    ?>
</head>
<body>
    <center>
        <h1>Log In</h1>

        <?php
            if ($kunde_id == null)
            {
                echo "<p>Nutzername oder Passwort ist falsch!</p>";
                echo "<p>Bitte versuchen Sie es nochmal</p>";
                echo "<form action='login.html' method='get'>";
                echo "<input type='submit' value='Zum Login'>";
                echo "</form>";
            }
            else
            {
                echo "<p>Herzlich Willkommen, ".$name."!</p>";
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