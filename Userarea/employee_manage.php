<?php include('employee_server.php'); 

    // fetch the record to be updated
    if (isset($_GET['edit'])){
        $user_id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$user_id");
        $record = mysqli_fetch_array($rec);
        $name = $record['name'];
        $username = $record['username'];
        $password = $record['password'];
        $user_type = $record['user_type'];
        $user_id = $record['user_id'];
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
    <?php $results = mysqli_query($conn, "SELECT * FROM users"); ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>User Type</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($results)){ ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['user_type']; ?></td>
                <td>
                    <a class="edit_btn" href="employee_manage.php?edit=<?php echo $row['user_id']; ?>" class="edit_btn" >Edit</a>
                </td>
                <td>
                    <a class="del_btn" href="employee_server.php?del=<?php echo $row['user_id']; ?>" class="del_btn">Delete</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <form method="post" action="employee_server.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="text" name="password" value="<?php echo $password; ?>">
        </div>
        <div class="input-group">
            <label>User Type</label>
            <input type="text" name="user_type" value="<?php echo $user_type; ?>">
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