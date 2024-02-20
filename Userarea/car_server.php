<?php
    session_start();

    // initialize variables
    $price = "";
    $make = "";
    $model = "";
    $year = "";
    $kilometers = "";
    $fueltype = "";
    $bodytype = "";
    $color = "";
    $transmission = "";
    $doors = "";
    $comments = "";
    $image1 = "";
    $image2 = "";
    $image3 = "";
    $image4 = "";
    $car_id = 0;
    $edit_state = false;

    // connect to database
    include('../server/connection.php');

    // if save button is clicked
    if (isset($_POST['save'])){
        $price = $_POST['price'];
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $kilometers = $_POST['kilometers'];
        $fueltype = $_POST['fueltype'];
        $bodytype = $_POST['bodytype'];
        $color = $_POST['colo'];
        $transmission = $_POST['transmission'];
        $doors = $_POST['doors'];
        $comments = $_POST['comments'];
        $images1 = $_POST['images1'];
        $imges2 = $_POST['Images2'];
        $imges3 = $_POST['Images3'];
        $imges4 = $_POST['Images4'];

        $query = "INSERT INTO cars (price, make, model, year, kilometers, fueltype, bodytype, color, transmission, doors, comments, image1, image2, image3, image4) VALUES ('$price', '$make', '$model', '$year', '$kilometers', '$fueltype', '$bodytype', '$color, '$transmission', '$doors', '$comments', '$image1', '$image2', '$image3', '$image4')";
        mysqli_query($conn, $query);
        $_SESSION['msg'] = "Information saved";
        header('location: employee_manage.php'); // redirect to admin page after inserting
    }

    // update records
    if (isset($_POST['update'])){
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $make = mysqli_real_escape_string($conn, $_POST['make']);
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $kilometers = mysqli_real_escape_string($conn, $_POST['kilometers']);
        $fueltype = mysqli_real_escape_string($conn, $_POST['fueltype']);
        $bodytype = mysqli_real_escape_string($conn, $_POST['bodytyope']);
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $transmission = mysqli_real_escape_string($conn, $_POST['transmission']);
        $doors = mysqli_real_escape_string($conn, $_POST['doors']);
        $comments = mysqli_real_escape_string($conn, $_POST['comments']);
        $image1 = mysqli_real_escape_string($conn, $_POST['image1']);
        $image2 = mysqli_real_escape_string($conn, $_POST['image2']);
        $image3 = mysqli_real_escape_string($conn, $_POST['image3']);
        $image4 = mysqli_real_escape_string($conn, $_POST['image4']);
        $car_id = mysqli_real_escape_string($conn, $_POST['car_id']);

        mysqli_query($conn, "UPDATE cars SET price='$price', make='$make', model='$model', year='$year', kilometers='$kilometers', fueltype='$fueltype', bodytype='$bodytype', color='$color', transmission='$transmission', doors='$doors', comments='$comments' image1='$image1, image2='$image2', image3='$image3', image4=$image4  WHERE car_id=$car_id");
        $_SESSION['msg'] = "Information updated";
        header('location: car_manage.php'); // redirect to admin page after updating
    }

    // delete records
    if (isset($_GET['del'])) {
        $car_id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM cars WHERE car_id=$car_id");
        $_SESSION['msg'] = "Information deleted";
        header('location: car_manage.php'); // redirect to admin page after updating
    }

    // retrieve records
    $results = mysqli_query($conn, "SELECT * FROM cars");

?>