<?php
    session_start();

    // initialize variables
    $name = "";
    $rating = "";
    $comment = "";
    $approved = "";
    $review_id = 0;
    $edit_state = false;

    // connect to database
    include('../server/connection.php');

    // if save button is clicked
    if (isset($_POST['save'])){
        $name = $_POST['name'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];
        $approved = $_POST['approved'];

        $query = "INSERT INTO review (name, rating, comment, approved) VALUES ('$name', '$rating', '$comment', '$approved')";
        mysqli_query($conn, $query);
        $_SESSION['msg'] = "Information saved";
        header('location: review_manage.php'); // redirect to admin page after inserting
    }

    // update records
    if (isset($_POST['update'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $rating = mysqli_real_escape_string($conn, $_POST['rating']);
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
        $approved = mysqli_real_escape_string($conn, $_POST['approved']);
        $reviewid = mysqli_real_escape_string($conn, $_POST['review_id']);

        mysqli_query($conn, "UPDATE review SET name='$name', rating='$rating', comment='$comment', approved='$approved' WHERE review_id=$review_id");
        $_SESSION['msg'] = "Information updated";
        header('location: review_manage.php'); // redirect to admin page after updating
    }

    // delete records
    if (isset($_GET['del'])) {
        $review_id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM review WHERE review_id=$review_id");
        $_SESSION['msg'] = "Information deleted";
        header('location: review_manage.php'); // redirect to admin page after updating
    }

    // retrieve records
    $results = mysqli_query($conn, "SELECT * FROM review");

?>