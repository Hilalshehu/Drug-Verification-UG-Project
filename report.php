<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Report Drug</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo mr-auto"><img src="img/logo.png" alt="" class="img-fluid"></a>
      <nav class="main-nav d-none d-lg-block dark">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="drug-verification.php">VERIFY DRUG</a></li>
          <li><a href="login/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN</a></li>
          <li class="active"><a href="report-drug.html">REPORT DRUG</a></li>
        </ul>
      </nav><!-- .main-nav-->
    </div>
  </header><!-- End Header -->

  <main id="main">
    <section id="report-drug" class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="col-lg-6">
          <div class="form">
            <h4>Report Drug</h4>
            <p>Please fill out the form below to file report.</p>
            <form action="report.php" method="post" role="form" class="php-email-form" onsubmit="return validateForm()">
              <div class="form-group">
                <input type="text" name="fName" class="form-control" id="name" placeholder="Your Name" required data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" name="reportDrug" class="form-control" id="reportDrug" placeholder="Drug Name" required data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" name="reportManufacturer" class="form-control" id="reportManufacturer" placeholder="Drug Manufacturer" required data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" name="reportLocation" class="form-control" id="reportLocation" placeholder="Purchase Location" required data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="tel" name="reportPhone" class="form-control" id="reportPhone" placeholder="Your phone number (digits only)" pattern="[0-9]{10}" required data-rule="minlen:10" data-msg="Please enter at least 10 digits" />
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="error-message" style="background-color: lime;"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" title="Send Message">Send Report</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Custom Script for Form Submission -->
  <script>
    function validateForm() {
      // Your additional validation logic can go here before submitting the form

      // Example: You can check if the form data is valid and return true/false accordingly

      // For now, always return true to allow form submission
      return true;
    }

    $(document).ready(function() {
      $('.sent-message').hide(); // Hide the sent message initially

      // Handle form submission
      $('.php-email-form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Perform AJAX submission or other processing here
        // For demonstration, we'll just show the sent message after a delay
        $('.sent-message').fadeIn().delay(3000).fadeOut(); // Show message for 3 seconds
        this.reset(); // Reset the form after submission (optional)
      });
    });
  </script>

</body>
</html>
