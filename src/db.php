<?php
$conn = new mysqli("localhost", "root", "", "cmentarzysko");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>