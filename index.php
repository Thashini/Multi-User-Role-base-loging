<?php

session_start();
//database confirguration
$con = mysqli_connect("localhost", "root", " ", "db_name");
if (!$con) {
    die("Failed to Establish Database Connection");
}

if (isset($_REQUEST["email"]) && isset($_REQUEST["password"])) {


    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $password = mysqli_real_escape_string($con, $_REQUEST['password']);
    $qr = mysqli_query($con, "select * from user where UserName='" . $email . "' and Password ='" . md5($password) . "'");

    if (mysqli_num_rows($qr) > 0) {
        $data = mysqli_fetch_assoc($qr);
        $_SESSION['user_email'] = $data['UserName'];
        $_SESSION['user_rollid'] = $data['RollId'];
        if ($data['RollId'] == 1) {
 //if the user role number matching to the inputed data(user name & password)in the data base user_rollid field, script will directed the relevent dashboard or the destination given by the programmer.
            header(("Location:dashboard.php"));
        } elseif ($data['RollId'] == 2) {
            header(("Location:routed path.php"));
        } elseif ($data['RollId'] == 3) {
            header("Location://routed path");
        } else {
            header("Location:routed path.php");
        }
    } else
?> <div class="alert-fixed"><?php
                            $error = "Invalid Login Details!"; ?>
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Invalied Login Details!
        </div>
    </div>
<?php
}

?>

<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/custom-css.css">
    <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>

    <style>
        .alert-fixed {
            position: fixed;
            top: 330px;
            left: 30px;
            width: 38.3%;
            z-index: 9999;
            border: 0px !important;
            padding: 0px;
            line-height: 15px;
        }
    </style>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    </script>

</head>

<body>

    <!-- To replace image, go to custom-css.css and replace the img link -->
    <div style="margin-top: 0px;" class="main-wrapper">
        <div>
            <div class="hd-1">
                <div style="height:100px;" class="container-fluid header-bg-main">
                    <div class="center-header">
                        <!-- <img class="img-fluid logo-img" src="./images/logo.jpeg" width="60px" height="60px"  alt="" srcset="">-->
                        <p style="font-size:50px; color:#001533;"><br><br><b> <a href="http://www.vle.uwu.ac.lk/"><i class="fa fa-graduation-cap" style="color:#001533;" aria-hidden="true"></i></a>Exam Process Management System</b></p><br>

                    </div>
                </div>
            </div>
            <div style="height: 50px; margin-top: 40px;" class="hd-2">
                <div class="container-fluid header-bg">
                    <div class="center-header">
                        <h4 style="margin-top:-9px" class="ml-20">Uva Wellassa University</h4>

                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-row">
            <div class="col-md-6">
                
                                                

                <!-- Student login section -->
                <section class="section margins-adm">
                    <div class="row ">
                        <div class="col-sm-12 pt-50 mob-rev">
                            <div class="row mt-30 ">
                                <div class="custom-shadow">
                                    <div style="border:none;" class="panel">
                                        <div class="panel-heading title-style">
                                            <div class="panel-title text-center">
                                                <h3 style=" text-align: center ;font-size:30px; font-family: calibri ;font-weight: bold, Times, serif;">LOGIN</h3>
                                            </div>
                                        </div>
                                        <div class="panel-body p-20">
                                            <form class="form-horizontal " action="index.php" method="post">
                                                <div style="margin-top: 30px;" class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="UserName">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group mt-20">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">
                                                            Signin
                                                            <span class="btn-label btn-label-right">
                                                                <i class="fa fa-check"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-11 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>
        </div>
        <!-- Footer -->
        <footer class="page-footer custom-footer font-small blue">
            <div class="footer-copyright text-center pt-15 pb-10">
                <div class="footer-content">
                    <div class="footer-details" ">
                        <img src=" ./images/phone.svg " height=" 24px " width=" 24px " alt=" " srcset=" ">

                        <div>+9455382478</div>
                    </div>
                    <div class=" footer-details " ">
                        <img src="./images/location.svg " height="24px " width="24px " alt=" " srcset=" ">

                        <div>Uva Wellassa University, Passara Road, Badulla, Sri Lanka. </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer -->
        <!-- /.row -->
        <!-- /.main-wrapper -->
        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js "></script>
        <script src="js/jquery-ui/jquery-ui.min.js "></script>
        <script src="js/bootstrap/bootstrap.min.js "></script>
        <script src="js/pace/pace.min.js "></script>
        <script src="js/lobipanel/lobipanel.min.js "></script>
        <script src="js/iscroll/iscroll.js "></script>
        <!-- ========== PAGE JS FILES ========== -->
        <!-- ========== THEME JS ========== -->
        <script src="js/main.js "></script>
        <script>
            $(function() {

            });
        </script>
</body>

</html>
