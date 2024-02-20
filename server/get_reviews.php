<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM review WHERE approved = 1 ORDER BY RAND() LIMIT 5");

$stmt->execute();

$review = $stmt->get_result();

?>