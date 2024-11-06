<?php
require("session.php");
require("db.php");

$idGrobu = $_REQUEST["idGrobu"];
$idUzytkownika = $_SESSION["id"];

$sql = "SELECT id FROM wirtualne_znicze WHERE idGrobu = $idGrobu AND idUzytkownika = $idUzytkownika";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $id = $result->fetch_object()->id;
    $sql = "DELETE FROM wirtualne_znicze WHERE id = $id";
} else {
    $sql = "INSERT INTO wirtualne_znicze (idGrobu, idUzytkownika) VALUES ($idGrobu, $idUzytkownika)";
}

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    echo "sukces";
}

$conn->close();
?>