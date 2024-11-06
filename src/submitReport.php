<?php
require("session.php");
require("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUzytkownika = $_SESSION["id"];
    $tresc = $conn->real_escape_string($_POST["tresc"]);
    
    $sql = "INSERT INTO zgloszenia (idUzytkownika, tresc) VALUES ('$idUzytkownika', '$tresc')";
    
    if ($conn->query($sql) === TRUE) {
        echo "sukces";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
