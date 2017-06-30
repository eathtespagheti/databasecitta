<html>
    <head>
        <title>Aggiunta avvenuta con successo</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                require("conn.php");
                $Nome = $_POST["Name"];
                $Distretto = $_POST["District"];
                $Popolazione = $_POST["Population"];
                $Codice = $_POST["Code"];
                if ($Nome == NULL or $Distretto == NULL or $Popolazione == NULL){
                    echo "<h2>Hai immesso dei valori errati e/o mancanti!<h2>";
                    header('refresh:2;url=../add.php');
                }
                else {
                    $sql = "INSERT INTO city(ID,Name,CountryCode,District,Population) 
                            VALUES (NULL, '" . $Nome . "', '" . $Codice . "', '" . $Distretto . "', " . $Popolazione . ")";
                    $inserisci = $conn->query($sql);
                    if($inserisci == 1){
                        echo "<h2>Aggiunta avvenuta con successo!<h2>";
                    }
                    else {
                        echo "<h2>Insert failed<h2>";
                    }
                    header('refresh:1.5;url=../add.php');
                }
            }
        ?>
    </body>
</html>