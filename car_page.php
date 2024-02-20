<?php

include('server/connection.php');

if(isset($_GET['car_id'])) {
  $car_id = $_GET['car_id'];
  $stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = ?");
  $stmt->bind_param("i", $car_id);
  $stmt->execute();
  $car = $stmt->get_result();

}else{
  header('locaton: index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V. Parrot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0786b37048.js" crossorigin="anonymous"></script>
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
                <a class="nav-link" href="cars.php">Second-Hand Cars</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#reviews">Customer Testimony</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#contact">Contact Us</a>
              </li>
              <li class="nav-item">
                <a href="login.html"><i class="fas fa-user"></i></a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div id="single-car">
        <div class="back">
            <a class="back-button" href="javascript:history.back()">Return to List</a>
        </div>
        <div class="row mt-5 car-container">
          <?php while($row = $car->fetch_assoc()){ ?>
            <div class="col-lg-5 col-md-6 col-sm-12 single-container">
                <img class="main-image" src="data:image/jpeg;charset=utf8;base64, <?php echo base64_encode($row['image1']); ?>" width="100%">
                <div class="image-gallery">
                    <div class="small-images">
                        <img class="gallery" src="data:image/jpeg;charset=utf8;base64, <?php echo base64_encode($row['image2']); ?>" width="100%">
                    </div>
                    <div>
                        <img class="gallery" src="data:image/jpeg;charset=utf8;base64, <?php echo base64_encode($row['image3']); ?>" width="100%">
                    </div>
                    <div>
                        <img class="gallery" src="data:image/jpeg;charset=utf8;base64, <?php echo base64_encode($row['image4']); ?>" width="100%">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="car-info-container">
                    <div class="car-title">
                      <h1 class="title"><?php echo "<p style='text-transform:uppercase;'>" . $row['make'] . "</p>"; ?></h1>
                      <h1 class="title"><?php echo "<p style='text-transform:uppercase;'>" . $row['model'] . "</p>"; ?></h1>
                    </div>
                    <div>
                        <h3><?php echo $row['year']; ?> - <?php echo $row['kilometers']; ?></h3>
                        <h2><?php echo $row['price']; ?> EURO</h2>
                    </div>
                    <div class="car-properties">
                        <div class="car-properties-container">
                            <div class="container-child">
                                <div>Body Type</div>
                                <div><?php echo "<p style='text-transform:capitalize;'>" . $row['bodytype'] . "</p>"; ?></div>
                            </div>
                            <div class="container-child">
                                <div>Fuel Type</div>
                                <div><?php echo "<p style='text-transform:capitalize;'>" . $row['fueltype'] . "</p>"; ?></div>
                            </div>
                            <div class="container-child">
                                <div>Transmission</div>
                                <div><?php echo "<p style='text-transform:capitalize;'>" . $row['transmission'] . "</p>"; ?></div>
                            </div>
                            <div class="container-child">
                                <div>Doors</div>
                                <div><?php echo $row['doors']; ?></div>
                            </div>
                            <div class="container-child">
                                <div>Colour</div>
                                <div><?php echo "<p style='text-transform:capitalize;'>" . $row['color'] . "</p>"; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="car-comments">
                        <h3>Comments</h3>
                        <p><?php echo $row['comments']; ?></p>
                    </div>
                    <div class="car-button">
                        <a class="button" onclick="openForm()">Contact Us</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <!--Popup Form-->
    <div class="form-popup" id="myForm">
    <?php

      include('server/connection.php');

      if(isset($_GET['car_id'])) {
        $car_id = $_GET['car_id'];
        $stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = ?");
        $stmt->bind_param("i", $car_id);
        $stmt->execute();
        $car = $stmt->get_result();

      }else{
      header('locaton: index.php');
      }

    ?>
    <form class="popup-contact-container" action="server/process_contact_popup.php" method="POST">
            <div class="input-form w-50">
              <label for="firstname">First Name</label>
              <input id="firstname" name="firstname" class="input" type="text" placeholder="Your First Name" required>
            </div>
            <div class="input-form w-50">
              <label for="lastname">Last Name</label>
              <input id="lastname" name="lastname" class="input" type="text" placeholder="Your Last Name" required>
            </div>
            <div class="input-form w-50">
              <label for="email">Email</label>
              <input id="email" name="email" class="input" type="email" placeholder="Your Email" required>
            </div>
            <div class="input-form w-50">
              <label for="phone">Phone Number</label>
              <input id="phone" name="phone" class="input" type="tel" placeholder="Your Number" required>
            </div>
            <?php while($row = $car->fetch_assoc()){ ?>
            <div class="input-form w-100">
              <label for="subject">Subject</label>
              <input id="subject" name="subject" class="input" type="text" value="<?php echo $row['make']; ?><?php echo $row['model']; ?>" required maxlength="250">
            </div>
            <?php } ?>
            <div class="input-form w-100">
              <label for="message">Message</label>
              <textarea id="message" name="message" class="input" placeholder="Your Message" rows=8 required></textarea>
            </div>
            <button type="submit" class="button">Submit</button>
            <button type="button" class="button cancel" onclick="closeForm()">Cancel</button>
          </form>
    </div>

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
  
      <script src="Assets/JS/review_form.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  </html>