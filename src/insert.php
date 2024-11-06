<?php
require("session.php");
require("db.php");

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$tekst = $_POST['tekst'];
$zdjecie = basename($_FILES["zdjecie"]["name"]);

move_uploaded_file($_FILES["zdjecie"]["tmp_name"], "../images/$zdjecie");

$sql = "INSERT groby (imie, nazwisko, tekst, zdjecie) 
        VALUES ('$imie', '$nazwisko', '$tekst', '$zdjecie')";

if ($conn->query($sql) === TRUE) {
    header("Location: menu.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>