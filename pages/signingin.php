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
        //Erzeugen einer Session ID
        $sesionID = md5(date("h:i:sa"));
        session_id($sessionID);
        session_start();

        $kundeID = null;
        if (isset($_REQUEST["signin"]) && isset($_REQUEST["name"]) && isset($_REQUEST["adress"]) && isset($_REQUEST["email"]) && isset($_REQUEST["uname"]) && isset($_REQUEST["psw"]))
        {
            $name = $_POST["name"];
            $adress = $_POST["adress"];
            $email = $_POST["email"];
            $uname = $_POST["uname"];
            $pwd = $_POST["psw"];
            $kundeID = ;
        }

        function register($name, $adress, $email, $uname, $psw)
        {
            $connection = mysqli_connect("localhost", "root");
            mysqli_select_db($connection, "i40_basis");
            $query = "INSERT INTO kunde (`name`, `adresse`) VALUES ($name, $adress)";
            $result = mysqli_query($connection, $query);
            
            $user = null;
            $query = "SELECT username FROM kundenkonto WHERE username = '$uname'";
            $result = mysqli_query($connection, $query);
            $user = mysqli_fetch_array($result);

            $mail = null;
            $query = "SELECT email FROM kundenkonto WHERE email = '$email'";
            $result = mysqli_query($connection, $query);
            $mail = mysqli_fetch_array($result);

            if ($user != null;)
            {
                
            }

            $query = "SELECT kundeid FROM kunde WHERE `name` = '$name'";
            $result = mysqli_query($connection, $query);
            $kunde = mysqli_fetch_array($result);

            $query = "INSERT INTO `kundenkonto` (`kunde`, `username`, `passwort`, `email`) VALUES ($kunde, $uname, $psw, $email)";
            $result = mysqli_query($connection, $query);
        }
    ?>
</head>
<body>
    <header>
        <nav class="navbar">

            <div class="logo"><a href="/SAE-Projekt/index.html" > <font color="white">SAE-Projekt</font></a></div>
    
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

</body>
</html>
