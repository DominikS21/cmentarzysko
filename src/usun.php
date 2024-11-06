<?php
session_start();
require("db.php");

$id_grobu = $_GET['id_grobu'];


$sql = "DELETE FROM groby WHERE id = $id_grobu";

if ($conn->query($sql) === TRUE) {
    header("Location: search.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>