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
        if (isset($_REQUEST["login"] && $_REQUEST["uname"] && $_REQUEST["psw"])) 
        {
            
        }
    ?>
</head>
<body>
    
</body>
</html>