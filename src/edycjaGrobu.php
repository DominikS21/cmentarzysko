<?php
require("session.php");
require("db.php");

$id = $_POST['id'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$tekst = $_POST['tekst'];
$zdjecie = basename($_FILES["zdjecie"]["name"]);

if (!empty($zdjecie)) {
    move_uploaded_file($_FILES["zdjecie"]["tmp_name"], "../images/$zdjecie");

    $sql = "UPDATE groby 
            SET imie = '$imie', nazwisko = '$nazwisko', tekst = '$tekst', zdjecie = '$zdjecie'
            WHERE id = $id";
} else {
    $sql = "UPDATE groby 
            SET imie = '$imie', nazwisko = '$nazwisko', tekst = '$tekst'
            WHERE id = $id";
}

if ($conn->query($sql) === TRUE) {
    header("Location: menu.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>