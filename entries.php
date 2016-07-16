<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Looking to get chess involved in your school? Look no further, One Way Chess is your solution to high quality chess instruction at your school.  ">
    <meta name="author" content="One Way Chess">

    <title>Blog Posts</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/contact-buttons.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <!-- <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="css/agency.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/submitpost.js"></script> 
    <script src = "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="js/formjs.js"></script>
	  
		<!-- Favicon --> 
		<link rel="shortcut icon" href="favicon.ico" /> 
    
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		<script src="../js/analytics.js"> </script>
</head>
<!-- style="background-color:#18bc9c" -->
<body id="page-top" class="index">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
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
                    <li> <a href="entries.php">Blog Entries</a> </li>
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
                        <span class="name">One Way Chess</span>
                        <hr class="star-light">
                        <span class="skills">Coaching Advice, Training Tips, Chess Thoughts, simply anything and everything chess!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
    <div class="container">
    <div class="col-md-12 col-md-offset-0" style="text-align:center">
        <div style="font-family:Lato">
            <div style="font-size:18px">
        <?php
        $f_name = $_GET["fname"];
        $l_name = $_GET["lname"];
        $id = $_GET["id"]; 
        $server = "us-cdbr-iron-east-04.cleardb.net";
        $username = "b0c4b9423d2803";
        $password = "48a9e62a";
        $db = "heroku_1dd2b8ffb0f1998";
        $con = new mysqli($server, $username, $password, $db);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $con = new mysqli($server, $username, $password, $db);
        
        if (is_null($f_name) === false) {
            echo '
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Author</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row"> ';
                
                $sqlNew = "SELECT email, fname, lname, bioText, position, imagelink FROM posters WHERE fname = '$f_name' AND lname = '$l_name'";
                $result = $con->query($sqlNew);
                while($row = mysqli_fetch_array($result)) {
                    echo '<div style="text-align:center;"> <strong>    ' . $row["fname"] . ' ' . $row["lname"] . '</strong> :<i> ' . $row["email"] . '</i>' ;
                    echo '<br>';
                    if (is_null($row["imagelink"])) {
                        echo '<img src="img\Users\nophoto_user.png" class="img-circle" alt="user no picture" style="width:220px;height:220px;float:left;">';
                    }
                    else {
                        echo '<img src="img\Users\\' . $row["imagelink"] . '"class="img-circle" alt=' . $row["email"] . ' picture" style = "width:240px;height:220px;float:left">';
                    }
                    
                    echo '<br>';
                    //echo '<div style="display:inline; white-space:nowrap; font-size:18px">';
                    echo '    <span style = "font-size: 20px !important;">' . $row["bioText"] . '</span></div>';
                    echo "<br><br><br><br><br>";
                }                 
                echo '</div>';
                echo '<h2> Posts </h2><br>';
            $sql = "SELECT id, mydate, title, entryText, fname, lname FROM entries, posters WHERE posters.email = entries.pEmail AND fname = '$f_name' AND lname = '$l_name' ORDER BY id DESC";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo '<div class="col-lg-12 text-center"> <h3><a href="entries.php?id=' . $row["id"] . '" style="color: #2c3e50;">' . $row["title"] . '</a></h3><hr class="star-primary"> </div>';
                    echo '<p>' . $row["entryText"];
                    echo '<div> Posted ' . $row["mydate"] . ' by <a href="entries.php?fname=' . $row["fname"] . '&lname=' . $row["lname"] . '">' . $row["fname"] . ' ' . $row["lname"] . '</a></div></p>';
                    echo "<br>";
                    echo "<br><br>";
                }
            } 
            else {
                echo "0 results";
            }
            
        }
        elseif(is_null($id) === false) {
            $idLeft = $id - 1; $idRight = $id + 1;
            $sqlLeft = "SELECT id FROM entries WHERE id = '$idLeft'";
            $sqlRight = "SELECT id FROM entries WHERE id = '$idRight'";
            $resultLeft = $con->query($sqlLeft);
            $resultRight = $con->query($sqlRight);
            echo '<div style="float:center"><a href="entries.php" class="btn btn-primary">All Entries</a></div>';
            if ($resultLeft->num_rows > 0) {
                echo '<div style="float:left"><a href="entries.php?id=' . $idLeft . '" class="btn btn-primary">Previous Entry</a></div>';
            }
            
            if ($resultRight->num_rows > 0) {
                echo '<div style="float:right"><a href="entries.php?id=' . $idRight . '" class="btn btn-primary">Next Entry</a></div>';
            }

            echo '<br><br>';
            $sql = "SELECT id, mydate, title, entryText, fname, lname FROM entries, posters WHERE posters.email = entries.pEmail AND id = '$id'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo '<div class="col-lg-12 text-center"> <h3>' . $row["title"] . '</h3><hr class="star-primary"> </div>';
                    echo '<p>' . $row["entryText"];
                    echo '<div> Posted ' . $row["mydate"] . ' by <a href="entries.php?fname=' . $row["fname"] . '&lname=' . $row["lname"] . '">' . $row["fname"] . ' ' . $row["lname"] . '</a></div></p>';
                    $fNameID = $row["fname"];
                    $lNameID = $row["lname"];
                }
                echo '<div class="fb-share-button" data-href="http://onewaychess.com/schools_old/entries.php?' . $id . '" data-layout="button" data-mobile-iframe="true"></div><br>';
            } 
            else {
                echo "article not found";
            }
            /*echo '<br><br>';
            $sql2 = "SELECT commenttext, comments.mydate, post, username, id FROM comments, entries WHERE post = id AND id = '$id'";
            $result = $con->query($sql2);
            if ($result->num_rows > 0) {
                echo '<h3>comments</h3>';
                while($row = mysqli_fetch_array($result)) {
                    echo '<table class="center" border="1"><tr>';
                    echo '<td>' . $row["username"] . '    ' . $row["mydate"] . '<br>';
                    echo $row["commenttext"] . '</td></tr>';
                }
                echo '</table><br><br>';
            } 
            else { echo ''; }
            
            echo ' <form action = "php/submitComment.php" name = "submitComment" method="post">
                    <div class="col-md-6 col-md-offset-3" style="text-align:center">
                            <div class="form-group" style="float:left;"> 
                                <label for="name"> Name </label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>                        
                    </div>
                    <input type="hidden" name="id" value=' . $id . '>
                <textarea name="comment" cols="50" rows="6" placeholder="Write a Comment"></textarea>
                        <div class="grid">
                            <div class="row" style="margin:auto">
                                <br>
                            </div>
                        </div>
                    <div>
                        <button type="submit" class="btn btn-secondary">Post Comment</button>
                    </div>
            </form> ';*/
            echo '<br><br>';
            echo '
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Author</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row"> ';
                
                $sqlNew = "SELECT email, fname, lname, bioText, position, imagelink FROM posters WHERE fname = '$fNameID' AND lname = '$lNameID'";
                $result = $con->query($sqlNew);
                while($row = mysqli_fetch_array($result)) {
                    echo '<div style="text-align:center;"> <strong>    ' . $row["fname"] . ' ' . $row["lname"] . '</strong> :<i> ' . $row["email"] . '</i>' ;
                    echo '<br>';
                    if (is_null($row["imagelink"])) {
                        echo '<img src="img\Users\nophoto_user.png" class="img-circle" alt="user no picture" style="width:220px;height:220px;float:left;">';
                    }
                    else {
                        echo '<img src="img\Users\\' . $row["imagelink"] . '"class="img-circle" alt=' . $row["email"] . ' picture" style = "width:240px;height:220px;float:left">';
                    }
                    
                    echo '<br>';
                    //echo '<div style="display:inline; white-space:nowrap; font-size:18px">';
                    echo '    <span style = "font-size: 20px !important;">' . $row["bioText"] . '</span></div>';
                    echo "<br>";
                }                 
                echo '</div>';
        }
        else {
            $sql = "SELECT id, mydate, title, entryText, fname, lname, email, bioText FROM entries, posters WHERE posters.email = entries.pEmail ORDER BY id DESC LIMIT 10";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo '<div class="col-lg-12 text-center"> <h3><a href="entries.php?id=' . $row["id"] . '" style="color: #2c3e50;">' . $row["title"] . '</a></h3><hr class="star-primary"> </div>';
                    echo '<p>' . substr($row["entryText"], 0, 200) . '<a href="entries.php?id=' . $row["id"] . '">... see full article</a>';
                    echo '<div> Posted ' . $row["mydate"] . ' by <a href="entries.php?fname=' . $row["fname"] . '&lname=' . $row["lname"] . '" title="click here to see all posts by this author">' . $row["fname"] . ' ' . $row["lname"] . '</a></div></p>';
                    //echo '<div class="fb-share-button" data-href="http://onewaychess.com/schools_old/entries.php?' . $row["id"] . '" data-layout="button" data-mobile-iframe="true"></div>';
                    echo '<br>';
                    /*echo '<div ng-app="myApp" ng-controller="commentCtrl">
                        <button ng-click="showTheForm = !showTheForm">Submit a Comment</button>
    add comment and see more articles
                        <form ng-show="showTheForm" ng-submit="submitForm()">
                            <br>
                            Name: <input type="text" name = "name" ng-model="user.name" /><br />
                            Comment: <input type="text" name = "comment" ng-model="user.comment" /><br />
                            <input type="hidden" name = "id" ng-model="user.id" value="' . $row["id"] . '"/>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" ng-click="showTheForm = false">Cancel</button>
                        </form>
                        ';*/
                    echo "<br>";
                }
            } 
            else {
                echo "0 results";
            }
        }
        mysqli_close($con);
        ?>
    </div>
    </div>
    </div>
</div>
</section>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!--

<p ng-show="myVar">
                    <form ng-show="showForm" action = "php/postComment.php" name = "postComment" method="post">
                    <textarea name="entry" cols="32" rows="4" ></textarea>
                    Name: <input type=text ng-model="firstName">
                    Comment: <input type=text ng-model="comment"><br>
                    </p>
                    </div>


<script>
var app = angular.module('myApp', []);
app.controller('commentCtrl', function($scope) {
    $scope.submitForm = function() {
    // execute something
    $scope.showTheForm = false;
}

    $scope.fname = "",
    $scope.comment = "",
    $scope.myVar = false;
    $scope.toggle = function() {
        $scope.myVar = !$scope.myVar;
    };
});
</script> 
<script>
    // Defining angularjs application.
    var postApp = angular.module('myApp', []);
    // Controller function and passing $http service and $scope var.
    postApp.controller('commentCtrl', function($scope, $http) {
      // create a blank object to handle form data.
        $scope.user = {};
      // calling our submit function.
        $scope.submitForm = function() {
        // Posting data to php file
        $http({
          method  : 'POST',
          url     : 'php/submitComment.php',
          data    : $scope.user, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         })
        };
    });
</script> 
-->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/jquery.contact-buttons.js"></script>
    <script src="js/demo.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>


    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
</body>
</html>