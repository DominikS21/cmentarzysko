<?php
session_start();
require("db.php");

if (!isset($_POST['idGrobu']) || !isset($_SESSION['user_id'])) {
    echo 'error';
    exit;
}

$idGrobu = $_POST['idGrobu'];
$idUzytkownika = $_SESSION['id'];

$sql = "SELECT * FROM wirtualne_znicze WHERE idGrobu = $idGrobu AND idUzytkownika = $idUzytkownika";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "DELETE FROM wirtualne_znicze WHERE ididGrobu = $idGrobu AND idUzytkownika = $idUzytkownika";
} else {
    $sql = "INSERT INTO wirtualne_znicze (idGrobu, idUzytkownika) VALUES ($idGrobu, $idUzytkownika)";
}
if ($conn->query($sql) === TRUE) {
    echo 'sukces';
} else {
    echo 'error';
}

$conn->close();
?>