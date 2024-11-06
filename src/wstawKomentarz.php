<?php
session_start();
require("db.php");

$id_grobu = $_POST['id_grobu'];
$tekst = $_POST['tekst'];
$id = $_SESSION['id'];


$sql = "INSERT INTO komentarze (idUzytkownika, tekst, id_grobu) 
    VALUES ('$id', '$tekst', '$id_grobu')";

if ($conn->query($sql) === TRUE) {
    header("Location: details.php?id=$id_grobu");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>