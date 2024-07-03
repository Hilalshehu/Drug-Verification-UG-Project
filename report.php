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
            <p>Please fill out the form below to file a report.</p>
            <form action="report.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="fName" class="form-control" id="name" placeholder="Your Name" required minlength="4" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" name="reportDrug" class="form-control" id="reportDrug" placeholder="Drug Name" required minlength="4" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" name="reportManufacturer" class="form-control" id="reportManufacturer" placeholder="Drug Manufacturer" required minlength="4" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" name="reportLocation" class="form-control" id="reportLocation" placeholder="Purchase Location" required minlength="4" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="tel" name="reportPhone" class="form-control" id="reportPhone" placeholder="Your phone number (digits only)" pattern="[0-9]{10}" required minlength="10" />
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="error-message" style="color: red;"></div>
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
    $(document).ready(function() {
      $('.sent-message').hide(); // Hide the sent message initially

      // Handle form submission
      $('.php-email-form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        // Validate the form fields
        if (validateForm()) {
          var form = $(this);
          $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
              $('.sent-message').fadeIn().delay(3000).fadeOut(); // Show message for 3 seconds
              form.trigger('reset'); // Reset the form after submission
            },
            error: function() {
              $('.error-message').text('An error occurred. Please try again later.');
            }
          });
        }
      });

      function validateForm() {
        var isValid = true;

        // Basic validation checks
        $('.form-control').each(function() {
          var input = $(this);
          if (input.val().length < 4) {
            isValid = false;
            input.siblings('.validate').text('Please enter at least 4 characters.');
          } else {
            input.siblings('.validate').text('');
          }
        });

        // Validate phone number
        var phone = $('#reportPhone').val();
        if (!/^\d{10}$/.test(phone)) {
          isValid = false;
          $('#reportPhone').siblings('.validate').text('Please enter a valid 10-digit phone number.');
        } else {
          $('#reportPhone').siblings('.validate').text('');
        }

        return isValid;
      }
    });
  </script>

</body>
</html>
