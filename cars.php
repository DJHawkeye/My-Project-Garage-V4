<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second-Hand Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0786b37048.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="Assets/CSS/style.css">
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-body fixed-top py-2" data-bs-theme="dark">
        <div class="container-fluid">
          <img src="Assets/IMGS/Logo.JPG">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Second-Hand Cars</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#reviews">Customer Testimony</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#contact">Contact Us</a>
              </li>
              <li class="nav-item">
                <i class="fas fa-user"></i>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!--Title-->
    <section id="title">
      <h2 class="service-title"><span>Our</span> Second-Hand Cars</h2>
    </section>

    <!--Cars-->
    <section id="cars">
      <div class="car-container">
      <?php include('server/get_cars.php'); ?>
      <?php while($row=$cars->fetch_assoc()){ ?>
        <div class="car-details">
          <a href="<?php echo "car_page.php?car_id=". $row['car_id']; ?>"><img class="main-car-image" src="data:image/jpeg;charset=utf8;base64, <?php echo base64_encode($row['image1']); ?>"></a>
          <div class="info"><?php echo $row['make']; ?> <?php echo $row['model']; ?> - <?php echo $row['kilometers']; ?> - <?php echo $row['year']; ?> <br><?php echo $row['price']; ?></div>
        </div>
      <?php } ?>
      </div>
      <nav aria-label="Page navigation example">
          <ul class="pagination mt-5">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
    </section>

    <!--Footer-->
    <section id="footer">
        <div class="container-footer">
          <div class="footer-section">
            <div>Address</div>
            <div>33 Rue Smith</div>
            <div>Toulouse</div>
            <div>31000</div>
          </div>
          <div class="footer-section">
            <div>Hours</div>
            <div>Monday: 9:30 - 5:00</div>
            <div>Tuesday: 9:00 - 5:00</div>
            <div>Wednesday: 9:00 - 5:00</div>
            <div>Thursday: 9:00 - 5:00</div>
            <div>Friday: 9:00 - 5:00</div>
            <div>Saturday: 10:00 - 2:00</div>
            <div>Sunday: Closed</div>
          </div>
          <div class="footer-section">
            <div>Contact Us</div>
            <div>info@parrot.fr</div>
            <div>0X XX XX XX XX</div>
          </div>
        </div>
      </section>
       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>