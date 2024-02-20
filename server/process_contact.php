<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$conn = mysqli_connect("localhost", "root", "", "garage")
    or die("Unable to connect to database");

if (mysqli_connect_errno()) {
    die("Connection error:" . mysqli_connect_error());
} else{
    $stmt = $conn->prepare("INSERT INTO contact (firstname, lastname, email, phone, subject, message) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $firstname, $lastname, $email, $phone, $subject, $message);
    $stmt->execute();
    echo "<script>alert('Request Sent');
            window.location.href='../index.php'</script>";
    $stmt->close();
    $conn->close();
}
                        
?>