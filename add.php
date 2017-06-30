<html>

    <head>
        <title>Aggiunta di una citt&agrave;</title>
        <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo "1.1"; ?>" />
    </head>
    <body>
        <h2>Aggiunta di una citt&agrave;</h2>
        <form action="php/addAction.php" method="post">
            <h4>Nome</h4><br>
            <input type="text" name="Name"><br>
            <h4>Distretto</h4><br>
            <input type="text" name="District"><br>
            <h4>Popolazione</h4><br>
            <input type="text" name="Population"><br>
            <h4>Stato</h4><br>
            <select id="stato" name="Code">
                    <?php 
                        require("php/conn.php");

                        $sql = "SELECT Code, Name
                                FROM country
                                ORDER BY Name";
                        $out = $conn->query($sql);

                        if($out->num_rows > 0){
                            while($row = $out->fetch_assoc()){
                                echo "<option value=" . $row["Code"] . ">" . htmlentities(utf8_encode($row["Name"]), 0, 'UTF-8') . "</option>";
                            }
                        }
                    ?>
            </select><br>
            <input type="submit" value="Aggiungi">
        </form>
        <a id="home" href="index.php"><h3>Torna alla home</h3></a>
    </body>
</html>