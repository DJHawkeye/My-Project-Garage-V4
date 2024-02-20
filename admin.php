<?php
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role']!="admin"){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0786b37048.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Assets/CSS/userarea_style.css">
    <title>Employee Page</title>
</head>
<body>
    <div class="header">
        <h1>Welcome Admin</h1>
    </div>
    <div class="task-container">
        <h2>What Would You Like To Do?</h2>
        <div class="task">
            <a href="Userarea/employee_manage.php">
                <button>Employee Management</button>
            </a>
        </div>
        <div class="task">
            <a href="Userarea/service_manage.php">
                <button>Service Management</button>
            </a>
        </div>
        <div class="task">
            <a href="Userarea/contact_manage.php">
                <button>Contact Requests</button>
            </a>
        </div>
        <div class="task">
            <a href="Userarea/review_manage.php">
                <button>Manage Reviews</button>
            </a>
        </div>
        <div class="task">
            <a href="Userarea/car_manage.php">
                <button>Manage Second-Hand Cars</button>
            </a>
        </div>
    </div>
    <a href="server/logout.php">Logout</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
