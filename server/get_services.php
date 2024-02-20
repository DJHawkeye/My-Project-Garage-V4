<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM services");

$stmt->execute();

$services = $stmt->get_result();

?>