<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="One Way Chess Blog">
    <meta name="author" content="One Way Chess">

    <title>OWC Chess Blog</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/contact-buttons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/clean-blog.min.css" rel="stylesheet"> -->
    <!-- <link href="css/agency.css" rel="stylesheet"> -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
      
        <!-- Favicon --> 
        <link rel="shortcut icon" href="favicon.ico" /> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="js/lockfixed.js"></script>
        <script src="js/lockfixed.min.js"></script>
        <script src="js/stickyMojo.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
    <div id="fb-root"></div>
    

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../schools/">One Way Chess Schools</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a href="blog.php">Welcome</a>
                    </li>
                    <li> 
                        <a href="entries.php">Blog Entries</a> 
                    </li>
                    <li class="page-scroll">
                        <a href="writers.php">Writers</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive circle-crop" src="img/OneWayChessLogo.png" alt="">
                    <div class="intro-text">
                        <span class="name">One Way Chess Blog</span>
                        <hr class="star-light">
                        <span class="skills">Coaching Advice, Training Tips, Chess Thoughts, simply anything and everything chess!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!--     <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Recent Articles</a>    
 -->        <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Blog Posts </h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <h3 style="text-align:center"> <a href="entries.php?id=17"> 
                        <?php 
                            $server = "us-cdbr-iron-east-04.cleardb.net";
                            $username = "b0c4b9423d2803";
                            $password = "48a9e62a";
                            $db = "heroku_1dd2b8ffb0f1998";
                            $con = new mysqli($server, $username, $password, $db);
                            if ($con->connect_error) {
                                die("Connection failed: " . $con->connect_error);
                            }
                            $sql = "SELECT id, mydate, title, entryText, fname, lname FROM entries, posters WHERE posters.email = entries.pEmail ORDER BY id DESC LIMIT 1";
                            $result = $con->query($sql);
                            while($row = mysqli_fetch_array($result)) {
                                echo $row["title"] . '
                                    </a> </h3>
                                    <h4 style="text-align:center; color:#41B7D8"> <small> By: </small> <a href="entries.php?fname=' . $row["fname"] . '&lname=' . 
                                    $row["lname"] . '" style="color:#41B7D8;">' . $row["fname"] . ' ' . $row["lname"] . '</a><i class="fa fa-clock-o" style="color:#E53B2C; margin-left:2%"></i> <span style="color:black"><small>'
                                    . $row["mydate"] . '</small> </span> </h4>
                                    <hr>';
                                echo '<p><div style="text-align:center;font-size:21px;font-family:Lato;">' . $row["entryText"] . '</div></p>';
                            }
                            mysqli_close($con);
                        ?>
                </div>
                                <div class="col-md-4 col-md-offset-4" style="margin-top:2%">
                                    <img  width="100%"  allign="middle" src="img/blog/OneWayChessBlogWelcome.png"> 
                                </div>
            </div>
        </div>
    </section> 

        
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Contact</h3>
                        <p>Email: team@onewaychess.com</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Our Other Projects</h3>
                        <ul class="list-inline">
                                                        <li>
                                <a href="http://www.onewaychess.com" class="btn-social btn-outline"><i class="fa fa-home"></i> </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/NationalChessLeagueNCL/" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About One Way Chess</h3>
                        <p>Our mission is to expand the chess community through entertainment and instruction. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        &copy; One Way Chess 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.contact-buttons.js"></script>
    <script src="js/demo.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
    

</body>

</html>
