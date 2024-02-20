<?php
    session_start();

    // initialize variables
    $name = "";
    $username = "";
    $password = "";
    $user_type = "";
    $user_id = 0;
    $edit_state = false;

    // connect to database
    include('../server/connection.php');

    // if save button is clicked
    if (isset($_POST['save'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        $query = "INSERT INTO users (name, username, password, user_type) VALUES ('$name', '$username', '$password', '$user_type')";
        mysqli_query($conn, $query);
        $_SESSION['msg'] = "Information saved";
        header('location: employee_manage.php'); // redirect to admin page after inserting
    }

    // update records
    if (isset($_POST['update'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

        mysqli_query($conn, "UPDATE users SET name='$name', username='$username', password='$password', user_type='$user_type' WHERE user_id=$user_id");
        $_SESSION['msg'] = "Information updated";
        header('location: employee_manage.php'); // redirect to admin page after updating
    }

    // delete records
    if (isset($_GET['del'])) {
        $user_id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM users WHERE user_id=$user_id");
        $_SESSION['msg'] = "Information deleted";
        header('location: employee_manage.php'); // redirect to admin page after updating
    }

    // retrieve records
    $results = mysqli_query($conn, "SELECT * FROM users");

?>