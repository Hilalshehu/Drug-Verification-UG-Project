<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NAFDAC Drug Verification System</title>
  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">

  <!-- Favicons -->
  <link href="img/logo/favicon/favicon-32x32.png" rel="icon">
  <link href="img/logo/favicon/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- External CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="d17af46b-afdd-4665-8862-2ca604c2cadc" data-blockingmode="auto" type="text/javascript"></script>
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <style>
    /* Custom Scroll */
    /* width */
    ::-webkit-scrollbar {
      width: 15px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      box-shadow: inset 0 0 5px grey;
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #1a6002;
      border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #D48C1A;
    }
    /* End Custom Scroll */
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo mr-auto"><img src="img/logo.png" alt="" class="img-fluid"></a>

      <nav class="main-nav d-none d-lg-block dark">
        <ul>
          <li class="active"><a href="index.php">HOME</a></li>
          <li><a href="drug-verification.php">VERIFY DRUG</a></li>
          <li><a href="login/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN</a></li>
          <li><a href="report.php">REPORT DRUG</a></li>
        </ul>
      </nav><!-- .main-nav-->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
            <span>NAFDAC </span>Online Drug Verification System</h2>
          <div>
            <a href="drug-verification.php" class="btn-get-started scrollto">Verify Drug</a>
            <a href="report-drug.html" class="btn-get-started scrollto">Report Drug</a>
          </div>
        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="img/drugs.jpg" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Click the link below to verify drugs</h3>
        </header>

        <div class="col">
          <div class="col-md-6 col-lg-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <div class="icon" style="background:white;"><span class="iconify" data-icon="ion:checkmark-done" data-inline="false" data-width="50" data-height="50" style="color: #f058dc;"></span></div>
              <h4 class="title"><a href="drug-verification.php">Verify Drug</a></h4>
              <p class="description">Please type your drug number to verify drug only if your details is present in our database or else report your organization.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- Feedback Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Recipient:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End of feedback modal -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>NAFDAC</strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by <a href="">Idris Wadaji</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="index.php" class="scrollto">Home</a>
            <a href="report-drug.html" class="scrollto">Report Drug</a>
            <a href="drug-verification.php" class="scrollto">Verify Drug</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- External JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
