<?php
    session_start();

    // initialize variables
    $firstname = "";
    $lastname = "";
    $email = "";
    $phone = "";
    $subject = "";
    $message = "";
    $contac_id = 0;
    $edit_state = false;

    // connect to database
    include('../server/connection.php');

    // if save button is clicked
    if (isset($_POST['save'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $query = "INSERT INTO contact (firstname, lastname, email, phone, subject, message) VALUES ('$firstname', '$lastname', '$email', '$phone', '$subject', '$message')";
        mysqli_query($conn, $query);
        $_SESSION['msg'] = "Information saved";
        header('location: contact_manage.php'); // redirect to admin page after inserting
    }

    // update records
    if (isset($_POST['update'])){
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $contac_id = mysqli_real_escape_string($conn, $_POST['contac_id']);

        mysqli_query($conn, "UPDATE contact SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', subject='$subject', message='$message' WHERE contac_id=$contac_id");
        $_SESSION['msg'] = "Information updated";
        header('location: contact_manage.php'); // redirect to admin page after updating
    }

    // delete records
    if (isset($_GET['del'])) {
        $contac_id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM contact WHERE contac_id=$contac_id");
        $_SESSION['msg'] = "Information deleted";
        header('location: contact_manage.php'); // redirect to admin page after updating
    }

    // retrieve records
    $results = mysqli_query($conn, "SELECT * FROM contact");

?>