<html>

    <head>
        <title>Database delle lingue e delle citt&agrave;</title>
        <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo "1.1"; ?>" />
    </head>
    <body>
        <h2>Lingue parlate nelle varie citt&agrave;</h2>
        <a href="delete.php"><h3 id="eliminazione">Eliminazione di una citt&agrave;</h3></a>
        <a href="add.php"><h3 id="aggiunta">Aggiunta di una citt&agrave;</h3></a>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
            <select name="selezione">
            <?php 
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    session_start();
                    $_SESSION["ID"] = $_POST["selezione"];
                }
                require("php/conn.php");
                
                $sql = "SELECT ID, Name
                        FROM city
                        ORDER BY Name";
                $out = $conn->query($sql);
            
                if($out->num_rows > 0){
                    while($row = $out->fetch_assoc()){
                        if(isset($_SESSION["ID"]) and ($_SESSION["ID"] == $row["ID"]))
                        {
                            echo "<option selected=selected value=" . $row["ID"] . ">" . htmlentities(utf8_encode($row["Name"]), 0, 'UTF-8') . "</option>";
                        }
                        else
                        {
                            echo "<option value=" . $row["ID"] . ">" . htmlentities(utf8_encode($row["Name"]), 0, 'UTF-8') . "</option>";
                            
                        }
                    }
                }
            ?>
            </select>
            <input type="submit">
        </form>
        <div id="table">
            <table>
                <tr>
                    <td>&nbsp Nome &nbsp</td>
                    <td>&nbsp Lingua &nbsp</td>
                    <td>&nbsp Ufficiale &nbsp</td>
                    <td>&nbsp Percentuale &nbsp</td>
                    <td>&nbsp Popolazione &nbsp</td>
                </tr>
                <?php
                if(isset($_SESSION["ID"])) {
                    require("php/conn.php");
                    $selezione = $_SESSION["ID"];
                    
                    $sql = "SELECT Name, Language, IsOfficial, Percentage, Population
                            FROM city INNER JOIN countrylanguage ON city.CountryCode = countrylanguage.CountryCode
                            WHERE city.ID = '$selezione'
                            ORDER BY Percentage DESC";
                    $cose = $conn->query($sql);
                    
                    while($row = mysqli_fetch_assoc($cose)){
                        echo "<tr>
                                <td>&nbsp " . htmlentities(utf8_encode($row["Name"]), 0, 'UTF-8') . " &nbsp</td>
                                <td>&nbsp " . $row["Language"] . " &nbsp</td>
                                <td>&nbsp " . $row["IsOfficial"] . " &nbsp</td>
                                <td>&nbsp " . $row["Percentage"] . " &nbsp</td>
                                <td>&nbsp " . round(($row["Population"] * $row["Percentage"]) / 100) . " &nbsp</td>
                              </tr>";
                    }
                }
            ?>
            </table>
        </div>
    </body>
</html>