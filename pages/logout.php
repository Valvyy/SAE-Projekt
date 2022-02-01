<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../style/style.css">
            <link rel="stylesheet" href="../style/login.css">
            <title>Log out</title>
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
            <?php
                session_start();
                session_destroy();

                echo "<p>Logout erfolgreich!</p>";
            ?>
        </body>
    </html>
