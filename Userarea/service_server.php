<?php
    session_start();

    // initialize variables
    $title = "";
    $description = "";
    $service_id = 0;
    $edit_state = false;

    // connect to database
    include('../server/connection.php');

    // if save button is clicked
    if (isset($_POST['save'])){
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "INSERT INTO services (title, description) VALUES ('$title', '$description')";
        mysqli_query($conn, $query);
        $_SESSION['msg'] = "Information saved";
        header('location: service_manage.php'); // redirect to admin page after inserting
    }

    // update records
    if (isset($_POST['update'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $service_id = mysqli_real_escape_string($conn, $_POST['service_id']);

        mysqli_query($conn, "UPDATE services SET title='$title', description='$description' WHERE service_id=$service_id");
        $_SESSION['msg'] = "Information updated";
        header('location: service_manage.php'); // redirect to admin page after updating
    }

    // delete records
    if (isset($_GET['del'])) {
        $service_id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM service WHERE service_id=$service_id");
        $_SESSION['msg'] = "Information deleted";
        header('location: service_manage.php'); // redirect to admin page after updating
    }

    // retrieve records
    $results = mysqli_query($conn, "SELECT * FROM users");

?>