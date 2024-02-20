<?php include('contact_server.php'); 

    // fetch the record to be updated
    if (isset($_GET['edit'])){
        $contac_id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($conn, "SELECT * FROM contact WHERE contac_id=$contac_id");
        $record = mysqli_fetch_array($rec);
        $firstname = $record['firstname'];
        $lastname = $record['lastname'];
        $email = $record['email'];
        $phone = $record['phone'];
        $subject = $record['subject'];
        $message = $record['message'];
        $contac_id = $record['contac_id'];
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
    <?php $results = mysqli_query($conn, "SELECT * FROM contact"); ?>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($results)){ ?>
            <tr>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td>
                    <a class="edit_btn" href="contact_manage.php?edit=<?php echo $row['contac_id']; ?>" class="edit_btn" >Edit</a>
                </td>
                <td>
                    <a class="del_btn" href="contact_server.php?del=<?php echo $row['contac_id']; ?>" class="del_btn">Delete</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <form method="post" action="contact_server.php">
        <input type="hidden" name="contac_id" value="<?php echo $contac_id; ?>">
        <div class="input-group">
            <label>First Name</label>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>">
        </div>
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class="input-group">
            <label>Subject</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class="input-group">
            <label>Message</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
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