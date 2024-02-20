<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM cars");

$stmt->execute();

$cars = $stmt->get_result();

?>