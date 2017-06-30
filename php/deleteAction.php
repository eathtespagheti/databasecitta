<html>
    <head>
        <title>Eliminazione avvenuta con successo</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                require("conn.php");
                $selezione = $_POST["selezione"];

                $sql = "DELETE FROM city
                        WHERE city.ID = '$selezione'";
                $cose = $conn->query($sql);
            }
            echo "<h2>Eliminazione avvenuta con successo!<h2>";
            header('refresh:1.5;url=../delete.php');
        ?>
    </body>
</html>