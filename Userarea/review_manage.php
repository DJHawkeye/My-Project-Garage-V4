<?php include('review_server.php'); 

    // fetch the record to be updated
    if (isset($_GET['edit'])){
        $review_id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($conn, "SELECT * FROM review WHERE review_id=$review_id");
        $record = mysqli_fetch_array($rec);
        $name = $record['name'];
        $rating = $record['rating'];
        $comment = $record['comment'];
        $approved = $record['approved'];
        $review_id = $record['review_id'];
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
    <?php $results = mysqli_query($conn, "SELECT * FROM review"); ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>User Type</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($results)){ ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['comment']; ?></td>
                <td><?php echo $row['approved']; ?></td>
                <td>
                    <a class="edit_btn" href="review_manage.php?edit=<?php echo $row['review_id']; ?>" class="edit_btn" >Edit</a>
                </td>
                <td>
                    <a class="del_btn" href="review_server.php?del=<?php echo $row['review_id']; ?>" class="del_btn">Delete</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <form method="post" action="review_server.php">
        <input type="hidden" name="review_id" value="<?php echo $review_id; ?>">
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="input-group">
            <label>Rating</label>
            <input type="text" name="rating" value="<?php echo $rating; ?>">
        </div>
        <div class="input-group">
            <label>Comment</label>
            <input type="text" name="comment" value="<?php echo $comment; ?>">
        </div>
        <div class="input-group">
            <label>User Type</label>
            <input type="text" name="approved" value="<?php echo $approved; ?>">
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