<?php

$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=score;",$username,$password);
/*
 CREATE TABLE `scores` (
  `id` int(10) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `score` varchar(10) NOT NULL,
  `datum` varchar(30) NOT NULL
);
*/
// database connectie importeren


// Datum en tijd genereren
echo "Voorbeeld oefening 26 met scores in de database</br>";
$datum = date('d-m-Y H:i:s');
echo "<h4>$datum</h4>";
echo "<strong>ID, naam, score, datum en tijdstip</strong></br>";

// INSERT query maken en uitvoeren.
    $stmt = $conn->prepare("INSERT INTO scoree (naam, score, datum) 
    VALUES (:naam, :score, :datum)");
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':score', $score);
    $stmt->bindParam(':datum', $datum);

    // Als er een waarde is INSERT rij
    if (isset($_POST['naam']))
 {
    $naam = $_POST['naam'];
   $score = $_POST['score'];
   
   // controleer of de score geldig is (niet hoger dan 6)
    if($score <7)
{
    $stmt->execute();
}
else
{
    echo "Je speelt vals: CHEATER!!!";
}


 }
/// scores ophalen met select
$sqlSelect = "SELECT * from scoree";
$data = $conn->query($sqlSelect);
    
foreach ($data as $row) {
    echo $row['id']." ";
    echo $row['naam']." ";
    echo $row['score']." ";
    echo $row['datum']." ";
    echo "</br>";
} 
echo "<a href='spelwissen.php'>Scores uit de database wissen.</a>";

/* voorbeeld wissen scores. (spelwissen.php)

   // database connectie
    include "connectpdo.php";

    // sql voor het verwijderen.
    $sql = "DELETE FROM scores";

    // Uitvoeren query
    $conn->exec($sql);
   
    // Terugsturen naar de hoofdpagina
    header('Location: spelvoorbeeld.php');

*/

?>
<html>
    <head>
        <title>Voorbeeld score opslaan in de database</title>
    </head>
    <body>
        <h1>Gooi een getal</h1>        
        <p><button onclick="gooi()">Gooi !</button></p>
        <p id="uitvoer">Je gooide nog niets...</p>
        
<form method="post">
Geef je naam: <input type="text" name="naam" id="naam" value="Hans">
        <!-- hidden fields zijn niet zichtbaar maar de waarden worden wel in de database gezet. !-->
        <input type="hidden" name="score" id="score">        
        <input type="submit" value="Je score opslaan !">
    </form>
        
        <script>
            function gooi()
            {
                // bepaal een willekeurig getal tussen
                // de 1 en de 6 
                var worp = Math.floor(Math.random() * 6 + 1);
                
                
                switch(worp) {
                    case 1:
                    /* weergave van het getal op het scherm */
                        document.getElementById("uitvoer").innerHTML =
                        "<h1>1</h1>";
                    /* zet de gegooide waarde in het hiddenfield score. */
                        document.getElementById("score").value = 1;
                        break;
                    case 2:
                        document.getElementById("uitvoer").innerHTML =
                            "<h1>2</h1>";
                        document.getElementById("score").value = 2;
                        break;
                    case 3:
                        document.getElementById("uitvoer").innerHTML =
                            "<h1>3</h1>";
                        document.getElementById("score").value = 3;
                        break;
                    case 4:
                        document.getElementById("uitvoer").innerHTML =
                            "<h1>4</h1>";
                        document.getElementById("score").value = 4;
                        break;
                    case 5:
                        document.getElementById("uitvoer").innerHTML =
                            "<h1>5</h1>";
                            document.getElementById("score").value = 5;
                        break;
                    case 6:
                        document.getElementById("uitvoer").innerHTML =
                            "<h1>6</h1>";
                            document.getElementById("score").value = 6;
                        break;
                    default:
                        // niet nodig,worp is altijd 1 t/m 6
                }
            }
            
        </script>
    </body>
</html>

<form method="post">
    <input type="submit" name="submit" value="Klik voor de broncode">
</form>
<?php
// Functie PHP broncode weergeven.
if(isset($_POST['submit'])){
    show_source(__FILE__);
}