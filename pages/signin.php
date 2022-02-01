<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/login.css">
    <title>Sign In</title>
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
