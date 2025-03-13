
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="styles.css" />
    <title>Hundred Islands Reservation App</title>
    <link rel="icon" href="assets/logo.png" type="image/icon type">
  </head>
  <body>
    <script>
      const urlParams = new URLSearchParams(window.location.search);
      const showAlert = urlParams.get('showAlert');
      if(showAlert === "true") {
        alert("Reservation Successful");
      }
    </script>
    <header class="header">
      <nav>
        <div class="nav__bar">
          <div class="logo">
            <a href="#"><img src="assets/logo.png" alt="logo" /></a>
          </div>
          <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#home"><b>Home</b></a></li>
          <li><a href="#about"><b>About</b></a></li>
          <li><a href="#service"><b>Map</b></a></li>
          <li><a href="#contact"><b>Contact</b></a></li>
        </ul>
        <form action = 'reservation.php'>
        <button class="btn nav__btn">Reserve Now</button>
        </form>
      </nav>
      <div class="section__container header__container" id="home">
        <p>Simple - Unique - Friendly</p>
        <h1>Make Yourself At Peace<br />In <span>Hundred Island Experience</span>.</h1>
      </div>
    </header>

    <section class="section__container about__container" id="about">
      <div class="about__image">
        <img src="assets/about.webp" alt="about" />
      </div>
      <div class="about__content">
        <p class="section__subheader">ABOUT US</p>
        <h2 class="section__header">Your Best Travel Start Here!</h2>
        <p class="section__description">
          Is a web and mobile app that would streamline the booking process for tourist, 
          ensuring a smooth and organized way to enjoy the hundred islands attractions. 
        </p>
        <div class="about__btn">
          <button class="btn">Reserve Now</button>
        </div>
      </div>
    </section>

    <section class="section__container room__container">
      <p class="section__subheader">Reserve Now</p>
      <h2 class="section__header">The Most Memorable Travel Starts Here.</h2>
      <div class="room__grid">
        <div class="room__card">
          <div class="room__card__image">
            <img src="assets\pil.jpeg" alt="room" />
          </div>
          <div class="room__card__details">
            <h4>Island Viewing</h4>
            <p>
                Grab your paper and pencil, take note of island that you want to visit.
            </p>
            <a href="Island.html"><button class="btn">Reserve Now</button></a>
          </div>
        </div>
        <div class="room__card">
          <div class="room__card__image">
            <img src="assets\banana.jpg" alt="room" />
          </div>
          <div class="room__card__details">
            <h4>Water Activities</h4>
            <p>
            Select the best activities in Hundred islands that you want to try
            </p>
            <h5>Starting from <span>₱270</span></h5>
            <a href="activities.html"><button class="btn">Reserve Now</button></a>
          </div>
        </div>
        <div class="room__card">
          <div class="room__card__image">
            <img src="assets\small.jpg" alt="room" />
          </div>
          <div class="room__card__details">
            <h4>Boat Reservation and Other</h4>
            <p>
              You can reserve from small to large boat 
            </p>
            <h5>Starting from <span>₱1,800 to ₱2,400</span></h5>
            <a href="fees.html"><button class="btn">Reserve Now</button></a>
          </div>
        </div>
      </div>
    </section>

    <section class="service" id="service">
      <div class="section__container service__container">
        <div class="service__content">
          <p class="section__subheader">Map</p>
          <h2 class="section__header">Schedule your travel now!</h2>
          <class="service__list">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30649.36503091761!2d120.0246780806758!3d16.211665407242993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3393dbca44626905%3A0xb94e52fa71c995bd!2sHundred%20Islands!5e0!3m2!1sen!2sph!4v1739374703945!5m2!1sen!2sph" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
    <footer class="footer" id="contact">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo">
            <a href="#home"><img src="assets/logo.png" alt="logo" /></a>
          </div>
          <p class="section__description">
            A web-based platform for tourists to book trips going to hundred islands. 
          </p>
          <button class="btn">Reserve Now</button>
        </div>
        <div class="footer__col">
          <h4>QUICK LINKS</h4>
          <ul class="footer__links">
            <li><a href="#">Browse Destinations</a></li>
            <li><a href="#">Special Offers & Packages</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>OUR SERVICES</h4>
          <ul class="footer__links">
            <li><a href="#">Booking</a></li>
            <li><a href="#">Flexible Resevation Options</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>CONTACT US</h4>
          <ul class="footer__links">
            <li><a href="#">rayalpark@info.com</a></li>
          </ul>
          <div class="footer__socials">
            <a href="#"><img src="assets/facebook.png" alt="facebook" /></a>
            <a href="#"><img src="assets/instagram.png" alt="instagram" /></a>
            <a href="#"><img src="assets/youtube.png" alt="youtube" /></a>
            <a href="#"><img src="assets/twitter.png" alt="twitter" /></a>
          </div>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2025 Hundred Islands Reservation App. All rights reserved.
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
  </body>
</html>