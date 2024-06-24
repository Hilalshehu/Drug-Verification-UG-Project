<!DOCTYPE html>
<html lang="en">

    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <title>Dashboard : Drug Verification System</title>
        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="assets/css/bootstrap.min.css"/>

        <!-- MetisMenu CSS -->
        <link href="assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

                <!-- Custom CSS -->
        <link href="assets/css/sb-admin-2.css" rel="stylesheet">
        
        <!-- Custom Fonts -->
        <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="d17af46b-afdd-4665-8862-2ca604c2cadc" data-blockingmode="auto" type="text/javascript"></script>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true): ?>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">NAFDAC ADMIN DASHBOARD</a>
                    </div>
                    <!-- /.navbar-header -->

                    <ul class="nav navbar-top-links navbar-right">
                            <!-- <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE): ?>
            <li style="color: #000000; padding: 15px 15px;">
                Welcome <?php echo ucfirst($_SESSION['admin_type']); ?>: 
                <?php echo htmlspecialchars($_SESSION['user_name']); ?>
            </li>
        <?php endif; ?> -->
        <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE): ?>
        <li style="color: #000000; padding: 15px 15px;">
            Welcome <?php echo ucfirst($_SESSION['admin_type']); ?>
            <!-- <?php if (isset($_SESSION['user_name'])): ?>
                : <?php echo htmlspecialchars($_SESSION['user_name']); ?>
            <?php endif; ?> -->
        </li>
    <?php endif; ?>
                        <!-- /.dropdown -->

                        <!-- /.dropdown -->
                        <li class="dropdown" style="float: right;">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="edit_admin.php?admin_user_id=<?php echo $_SESSION['user_id']; ?>&operation=edit"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.navbar-top-links -->

                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li><a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                                <li<?php echo (CURRENT_PAGE == 'drugs.php' || CURRENT_PAGE == 'add_drug.php') ? ' class="active"' : ''; ?>>
                                    <a href="#"><i class="fa fa-user-circle fa-fw"></i> Drugs<i class="fa arrow"></i></a>
                                    <ul class="nav nav-second-level">
                                        <li><a href="drugs.php"><i class="fa fa-list fa-fw"></i> List all</a></li>
                                        <li><a href="add_drug.php"><i class="fa fa-plus fa-fw"></i> Add New</a></li>
                                    </ul>
                                </li>
                                <li><a href="report.php"><i class="fa fa-phone-square fa-fw"></i> Report Responses</a></li>
                                                                <li><a href="admin_users.php"><i class="fa fa-users fa-fw"></i> Users</a></li>
                                <li><a href="cookies.php"><i class="fa fa-cogs fa-fw"></i> Cookies</a></li>
                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>
            <?php endif; ?>
            <!-- The End of the Header -->
