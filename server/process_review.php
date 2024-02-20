<?php

$rating = $_POST['rating'];
$name = $_POST['name'];
$comment = $_POST['comment'];

$conn = mysqli_connect("localhost", "root", "", "garage")
    or die("Unable to connect to database");

if (mysqli_connect_errno()) {
    die("Connection error:" . mysqli_connect_error());
} else{
    $stmt = $conn->prepare("INSERT INTO review (name, rating, comment) 
                            VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $rating, $comment);
    $stmt->execute();
    echo "<script>alert('Review Sent');
            window.location.href='../index.php'</script>";
    $stmt->close();
    $conn->close();
}
                        
?>