<html>
    <head>
        <title>Eliminazione di una citt&agrave;</title>
        <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo "1.1"; ?>" />
    </head>
    <body>
        <h2>Eliminazione di una citt&agrave;</h2>
        <form action="php/deleteAction.php" method="post">
            <select name="selezione">
            <?php 
                require("php/conn.php");
                
                $sql = "SELECT ID, Name
                        FROM city
                        ORDER BY Name";
                $out = $conn->query($sql);
            
                if($out->num_rows > 0){
                    while($row = $out->fetch_assoc()){
                        echo "<option value=" . $row["ID"] . ">" . htmlentities(utf8_encode($row["Name"]), 0, 'UTF-8') . "</option>";
                    }
                }
            ?>
            </select>
            <input type="submit" value="Elimina">
        </form>
        <a id="home" href="index.php"><h3>Torna alla home</h3></a>
    </body>
</html>