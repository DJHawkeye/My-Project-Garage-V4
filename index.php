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
                <a class="nav-link active" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cars.php">Second-Hand Cars</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#reviews">Customer Testimony</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact Us</a>
              </li>
              <li class="nav-item">
                <a href="login.php"><i class="fas fa-user"></i></a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!--Home-->
    <section id="home">
        <div class="container-intro">
            <h1><span>Garage</span> V. Parrot</h1>
            <h2>Experts who care for your car as much as you do</h2>
            <div class="button-container">
              <a class="button" href="#contact">Contact Us</a>
              <a class="button" href="#about">Learn More</a>
            </div>
        </div>
    </section>

    <!--Sercives-->
    <section id="services">
      <h2 class="service-title"><span>Our</span> Services</h2>
      <div class="service-container">
      <?php include('server/get_services.php'); ?>
      <?php while($row=$services->fetch_assoc()){ ?>
        <div class="details">
          <h3><?php echo $row['title']; ?></h3>
          <p><?php echo $row['description'];?></p>
        </div>
      <?php } ?>
      </div>
    </section>

    <!--About-->
    <section id="about">
      <div class="container-about">
          <h2><span>About</span> Us</h2>
          <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
      </div>
    </section>

    <!--Why-->
    <section id="why">
      <div class="container-reasons">
        <div class="reasons">
          <i class="fa-solid fa-circle-check"></i>
          <h3 class="reason-text">Reason One</h3>
        </div>
        <div class="reasons">
          <i class="fa-solid fa-circle-check"></i>
          <h3 class="reason-text">Reason Two</h3>
        </div>
        <div class="reasons">
          <i class="fa-solid fa-circle-check"></i>
          <h3 class="reason-text">Reason Three</h3>
        </div>
        <div class="reasons">
          <i class="fa-solid fa-circle-check"></i>
          <h3 class="reason-text">Reason Four</h3>
        </div>
      </div>
      <div class="container-why">
        <h2><span>Why</span> Us</h2>
        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
    </div>
    </section>

    <!--Reviews-->
    <section id="reviews">
      <h2><span>Customer</span> Testimony</h2>
      <div class="review-container">
      <?php include('server/get_reviews.php'); ?>
      <?php while($row=$review->fetch_assoc()){ ?>
        <div class="feedback-container">
          <div class="rating"><?php echo $row['rating']; ?></div>
          <p><?php echo $row['comment']; ?></p>
          <div class="feeback-name"><?php echo $row['name']; ?></div>
        </div>
      <?php } ?>
      </div>
      <div class="review-button">
        <button class="button" onclick="openForm()">Leave a Review</button>
      </div>
    </section>

    <!--Popup Form-->
    <div class="form-popup" id="myForm">
      <form action="server/process_review.php" class="popup-container" method="POST">
        <h2>Leave a Review</h2>
        <label for="rating"><b>Rating</b></label>
        <select name="rating" id="rating" required>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5" selected>5</option>
        </select>
        <br>
        <label for="name"><b>Name</b></label>
        <input id="name" type="text" placeholder="Enter Your Name" name="name" required>
        <br>
        <label for="comment"><b>Comment</b></label>
        <textarea id="comment" placeholder="Enter Your Comment" name="comment" required></textarea>
        <button type="submit" class="button">Submit</button>
        <button type="button" class="button cancel" onclick="closeForm()">Cancel</button>
      </form>
    </div>

    <!--Contact-->
    <section id="contact">
      <div class="container-contact">
        <h2><span>Contact</span> Us</h2>
        <div class="form-container">
          <form id="messageForm" action="server/process_contact.php" method="POST">
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
            <div class="input-form w-100">
              <label for="subject">Subject</label>
              <input id="subject" name="subject" class="input" type="text" placeholder="Your Subject" required maxlength="250">
            </div>
            <div class="input-form w-100">
              <label for="message">Message</label>
              <textarea id="message" name="message" class="input" placeholder="Your Message" rows=8 required></textarea>
            </div>
            <button class="submit-button" name="submit" type="submit" onclick="message()">Send</button>
          </form>
        </div>
      </div>
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

    <script src="Assets/JS/review_form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>