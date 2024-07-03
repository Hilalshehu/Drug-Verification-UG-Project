<?php 
require_once('config/configverify.php'); // Include your configuration file if necessary
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>NAFDAC Drug Verification System</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta charset="utf-8">
  <link rel="icon" href="img/logo.png" type="image/gif">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
  
  <!-- Custom Styles -->
  <style>
    body {
      font-family: 'Source Serif Pro', serif;
      background-image: url('img/certv.png');
      height: 100vh;
      background-position: center;
      background-size: cover;
    }
    .logo-container {
      text-align: center;
      margin-top: 20px;
    }
    .logo {
      height: 60px;
      width: 60px;
    }
    .heading {
      font-size: 24px;
      font-weight: bold;
    }
    .form-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    .form-inline {
      text-align: center;
    }
    .form-inline .form-group {
      margin-right: 10px;
    }
    .footer {
      font-size: 16px;
      padding-top: 120px;
    }
    .table-title, .table-title-red {
      display: block;
      margin: auto;
      max-width: 600px;
      padding: 5px;
      width: 100%;
    }
    .table-title h3, .table-title-red h3 {
      font-size: 20px;
      font-weight: 400;
      font-family: "Roboto", helvetica, arial, sans-serif;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      text-transform: uppercase;
    }
    .table-title h3 {
      color: green;
    }
    .table-title-red h3 {
      color: red;
    }
    .table-fill {
      background: white;
      border-radius: 3px;
      border-collapse: collapse;
      margin: auto;
      max-width: 600px;
      padding: 5px;
      width: 100%;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      animation: float 5s infinite;
    }
    th {
      color: #D5DDE5;
      background: #1b1e24;
      border-bottom: 4px solid #9ea7af;
      border-right: 1px solid #343a45;
      font-size: 23px;
      font-weight: 100;
      padding: 24px;
      text-align: left;
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      vertical-align: middle;
    }
    th:first-child {
      border-top-left-radius: 3px;
    }
    th:last-child {
      border-top-right-radius: 3px;
      border-right: none;
    }
    tr {
      border-top: 1px solid #C1C3D1;
      color: #666B85;
      font-size: 16px;
      font-weight: normal;
      text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
    }
    tr:hover td {
      background: #4E5066;
      color: #FFFFFF;
      border-top: 1px solid #22262e;
    }
    tr:first-child {
      border-top: none;
    }
    tr:last-child {
      border-bottom: none;
    }
    tr:nth-child(odd) td {
      background: #EBEBEB;
    }
    tr:nth-child(odd):hover td {
      background: #4E5066;
    }
    tr:last-child td:first-child {
      border-bottom-left-radius: 3px;
    }
    tr:last-child td:last-child {
      border-bottom-right-radius: 3px;
    }
    td {
      background: #FFFFFF;
      padding: 20px;
      text-align: left;
      vertical-align: middle;
      font-weight: 300;
      font-size: 18px;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      border-right: 1px solid #C1C3D1;
    }
    td:last-child {
      border-right: 0px;
    }
    th.text-left, td.text-left {
      text-align: left;
    }
    th.text-center, td.text-center {
      text-align: center;
    }
    th.text-right, td.text-right {
      text-align: right;
    }
    .main-nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      text-align: right;
    }
    .main-nav ul li {
      display: inline;
    }
    .main-nav ul li a {
      display: inline-block;
      padding: 10px 20px;
      text-decoration: none;
      color: #000000;
      transition: background-color 0.3s, color 0.3s;
    }
    .main-nav ul li a:hover {
      background-color: #00FF00;
      color: #ffffff;
    }
    .main-nav ul li.active a {
      background-color: #00FF00;
      color: #ffffff;
    }
    .logo-container {
      text-align: center;
      margin-top: 20px;
    }
    .logo {
      height: 60px;
      width: 60px;
    }
    .heading {
      font-size: 24px;
      font-weight: bold;
    }
    .form-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    .form-inline {
      text-align: center;
    }
    .form-inline .form-group {
      margin-right: 10px;
    }
    .footer {
      font-size: 16px;
      padding-top: 120px;
    }
    .table-title, .table-title-red {
      display: block;
      margin: auto;
      max-width: 600px;
      padding: 5px;
      width: 100%;
    }
    .table-title h3, .table-title-red h3 {
      font-size: 20px;
      font-weight: 400;
      font-family: "Roboto", helvetica, arial, sans-serif;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      text-transform: uppercase;
    }
    .table-title h3 {
      color: green;
    }
    .table-title-red h3 {
      color: red;
    }
    .table-fill {
      background: white;
      border-radius: 3px;
      border-collapse: collapse;
      margin: auto;
      max-width: 600px;
      padding: 5px;
      width: 100%;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      animation: float 5s infinite;
    }
    th {
      color: #D5DDE5;
      background: #1b1e24;
      border-bottom: 4px solid #9ea7af;
      border-right: 1px solid #343a45;
      font-size: 23px;
      font-weight: 100;
      padding: 24px;
      text-align: left;
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      vertical-align: middle;
    }
    th:first-child {
      border-top-left-radius: 3px;
    }
    th:last-child {
      border-top-right-radius: 3px;
      border-right: none;
    }
    tr {
      border-top: 1px solid #C1C3D1;
      color: #666B85;
      font-size: 16px;
      font-weight: normal;
      text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
    }
    tr:hover td {
      background: #4E5066;
      color: #FFFFFF;
      border-top: 1px solid #22262e;
    }
    tr:first-child {
      border-top: none;
    }
    tr:last-child {
      border-bottom: none;
    }
    tr:nth-child(odd) td {
      background: #EBEBEB;
    }
    tr:nth-child(odd):hover td {
      background: #4E5066;
    }
    tr:last-child td:first-child {
      border-bottom-left-radius: 3px;
    }
    tr:last-child td:last-child {
      border-bottom-right-radius: 3px;
    }
    td {
      background: #FFFFFF;
      padding: 20px;
      text-align: left;
      vertical-align: middle;
      font-weight: 300;
      font-size: 18px;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      border-right: 1px solid #C1C3D1;
    }
    td:last-child {
      border-right: 0px;
    }
    th.text-left, td.text-left {
      text-align: left;
    }
    th.text-center, td.text-center {
      text-align: center;
    }
    th.text-right, td.text-right {
      text-align: right;
    }
    html {
      overflow: scroll;
      overflow-x: hidden;
    }
    ::-webkit-scrollbar {
      width: 0px;
      background: transparent;
    }
    ::-webkit-scrollbar-thumb {
      background: #FF0000;
    }
    @media (max-width: 767px) {
      .logo {
        height: 40px;
        width: 40px;
      }
      .heading {
        font-size: 20px;
      }
      .form-inline .form-group {
        margin-bottom: 10px;
      }
      .form-container {
        flex-direction: column;
      }
    }
  </style>

  <!-- Disable Right Click -->
  <script>
    var message="Right Click Disabled!";
    function clickIE4() {
      if (event.button == 2) {
        alert(message);
        return false;
      }
    }
    function clickNS4(e) {
      if (document.layers || document.getElementById && !document.all) {
        if (e.which == 2 || e.which == 3) {
          alert(message);
          return false;
        }
      }
    }
    if (document.layers) {
      document.captureEvents(Event.MOUSEDOWN);
      document.onmousedown = clickNS4;
    } else if (document.all && !document.getElementById) {
      document.onmousedown = clickIE4;
    }
    document.oncontextmenu = new Function("alert(message); return false");
  </script>
</head>

<body>
<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">
      <nav class="main-nav d-none d-lg-block dark">
        <ul>
          <li class="active"><a href="drug-verification.php">VERIFY DRUG</a></li>
          <li><a href="index.php">HOME</a></li>
          <li><a href="login/login.php">LOGIN</a></li>
          <li><a href="report.php">REPORT DRUG</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Drug Verification Form -->
  <div class="container">
    <div class="row form-container">
      <div class="col-sm-12">
        <form class="form-inline" method="POST">
          <div class="form-group">
            <input type="text" class="form-control input-lg" name="drug_no" placeholder="Drug Number" required>
          </div>
          <button type="submit" name="validate" class="btn btn-primary btn-lg">View</button>
        </form>
      </div>
    </div>

    <!-- Output Section -->
    <div class="row">
      <?php validate(); ?>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
