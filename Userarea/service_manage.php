<?php include('employee_server.php'); 

    // fetch the record to be updated
    if (isset($_GET['edit'])){
        $service_id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($conn, "SELECT * FROM services WHERE service_id=$service_id");
        $record = mysqli_fetch_array($rec);
        $title = $record['title'];
        $description = $record['description'];
        $service_id = $record['service_id'];
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
    <?php $results = mysqli_query($conn, "SELECT * FROM services"); ?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($results)){ ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <a class="edit_btn" href="service_manage.php?edit=<?php echo $row['service_id']; ?>" class="edit_btn" >Edit</a>
                </td>
                <td>
                    <a class="del_btn" href="service_server.php?del=<?php echo $row['service_id']; ?>" class="del_btn">Delete</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <form method="post" action="service_server.php">
        <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
        <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $title; ?>">
        </div>
        <div class="input-group">
            <label>Description</label>
            <input type="text" name="description" value="<?php echo $description; ?>">
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