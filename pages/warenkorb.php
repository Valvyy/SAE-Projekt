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
                else
                {
                    
                }

            }
        ?>
    </head>
    <body>

    </body>
</html>