<?php include('employee_server.php'); 

    // fetch the record to be updated
    if (isset($_GET['edit'])){
        $car_id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($conn, "SELECT * FROM cars WHERE car_id=$car_id");
        $record = mysqli_fetch_array($rec);
        $price = $record['price'];
        $make = $record['make'];
        $model = $record['model'];
        $year = $record['year'];
        $kilometers = $record['kilometers'];
        $fueltype = $record['fueltype'];
        $bodytyoe = $record['bodytype'];
        $color = $record['color'];
        $transmission = $record['transmission'];
        $doors = $record['doors'];
        $comments = $comments['comments'];
        $image1 = $record['image1'];
        $image2 = $record['image2'];
        $image3 = $record['image3'];
        $image4 = $record['image4'];
        $car_id = $record['car_id'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/userarea_style.css">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div>
    <?php endif ?>
    <?php $results = mysqli_query($conn, "SELECT * FROM cars"); ?>
    <table>
        <thead>
            <tr>
                <th>Price</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Kilometers</th>
                <th>Fuel Type</th>
                <th>Body Type</th>
                <th>Color</th>
                <th>Transmission</th>
                <th>Doors</th>
                <th>Comments</th>
                <th>Image 1</th>
                <th>Image 2</th>
                <th>Image 3</th>
                <th>Image 4</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($results)){ ?>
            <tr>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['make']; ?></td>
                <td><?php echo $row['model']; ?></td>
                <td><?php echo $row['year']; ?></td>
                <td><?php echo $row['kilometers']; ?></td>
                <td><?php echo $row['fueltype']; ?></td>
                <td><?php echo $row['bodytype']; ?></td>
                <td><?php echo $row['color']; ?></td>
                <td><?php echo $row['transmission']; ?></td>
                <td><?php echo $row['doors']; ?></td>
                <td><?php echo $row['comments']; ?></td>
                <td><?php echo $row['image1']; ?></td>
                <td><?php echo $row['image2']; ?></td>
                <td><?php echo $row['image3']; ?></td>
                <td><?php echo $row['image4']; ?></td>
                <td>
                    <a class="edit_btn" href="car_manage.php?edit=<?php echo $row['car_id']; ?>" class="edit_btn" >Edit</a>
                </td>
                <td>
                    <a class="del_btn" href="car_server.php?del=<?php echo $row['car_id']; ?>" class="del_btn">Delete</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <form method="post" action="car_server.php">
        <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
        <div class="input-group">
            <label>Price</label>
            <input type="text" name="price" value="<?php echo $price; ?>">
        </div>
        <div class="input-group">
            <label>Make</label>
            <input type="make" name="make" value="<?php echo $make; ?>">
        </div>
        <div class="input-group">
            <label>Model</label>
            <input type="text" name="model" value="<?php echo $model; ?>">
        </div>
        <div class="input-group">
            <label>Year</label>
            <input type="text" name="year" value="<?php echo $year; ?>">
        </div>
        <div class="input-group">
            <label>Kilometers</label>
            <input type="text" name="kilometers" value="<?php echo $kilometers; ?>">
        </div>
        <div class="input-group">
            <label>Fuel Type</label>
            <input type="text" name="fueltype" value="<?php echo $fueltype; ?>">
        </div>
        <div class="input-group">
            <label>Body Type</label>
            <input type="text" name="bodytype" value="<?php echo $bodytype; ?>">
        </div>
        <div class="input-group">
            <label>Color</label>
            <input type="text" name="color" value="<?php echo $color; ?>">
        </div>
        <div class="input-group">
            <label>Transmission</label>
            <input type="text" name="transmission" value="<?php echo $transmission; ?>">
        </div>
        <div class="input-group">
            <label>Doors</label>
            <input type="text" name="doors" value="<?php echo $doors; ?>">
        </div>
        <div class="input-group">
            <label>Comments</label>
            <input type="text" name="comments" value="<?php echo $doors; ?>">
        </div>
        <div class="input-group">
            <label>Image 1</label>
            <input type="text" name="image1" value="<?php echo $year; ?>">
        </div>
        <div class="input-group">
            <label>Image 2</label>
            <input type="text" name="image2" value="<?php echo $year; ?>">
        </div>
        <div class="input-group">
            <label>Image 3
            </label>
            <input type="text" name="image3" value="<?php echo $year; ?>">
        </div>
        <div class="input-group">
            <label>Image 4</label>
            <input type="text" name="image4" value="<?php echo $year; ?>">
        </div>
        <div class="input-group">
            <?php if ($edit_state == false): ?>
                <button type="submit" name="save" class="btn">Save</button>
            <?php else: ?>
                <button type="submit" name="update" class="btn">Update</button>
            <?php endif ?>
        </div>
    </form>
    <a href="../admin.php">Back to Admin Page</a>
</body>
</html>