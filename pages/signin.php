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

        <!-- Content der Registrierung -->
        <form action="signingin.php" method="post">
        
            <div class="container">
            <label>Bitte geben Sie die folgenden Daten ein um sich anzumelden!</label><br><br>
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="z.B. Max Mustermann" name="name" required>

            <label for="address"><b>Anschrift</b></label>
            <input type="text" placeholder="Volle Adresse" name="adress" required>

            <label for="email"><b>E-Mail</b></label>
            <input type="email" placeholder="example@gmail.com" name="email" required>
            
            <label for="uname"><b>Nutzername</b></label>
            <input type="text" placeholder="Benutzername eingeben" name="uname" required>
        
            <label for="psw"><b>Passwort</b></label>
            <input type="password" placeholder="Passwort eingeben" name="psw" required>

            <button id="signin" name="signin" type="submit">Sign in</button>
            </div>
        
        </form>
        
    </body>
</html>
