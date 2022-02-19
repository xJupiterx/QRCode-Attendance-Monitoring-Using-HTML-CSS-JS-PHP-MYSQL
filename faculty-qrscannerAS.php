<?php 
include('server.php');
include('system-restriction/faculty.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Another Student</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
    <script type="text/javascript" src="assets/js/qrscanner/adapter.js"></script>
    <script type="text/javascript" src="assets/js/qrscanner/vue.js"></script>
    <script type="text/javascript" src="assets/js/qrscanner/instascan.js"></script>
    <style>
        .square {
            height: 60vh;
            width: 60vh;
            border-width:2px;
            border-style:solid;
            border-color:black;
        }
        .dropbtn {
            background-color: #04590b;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            height: 50px;
        }
        .dropdown {
            position: relative;
            display: block;
        }
        .dropdown-content {
            display: none;
            position: static;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 8px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropbtn {
            background-color: #3acf61;
        }
    </style>
</head>
<body>
    <div id="app">
        <?php include('sidebar/faculty_sidebar.html'); ?>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <?php 
                                    $file = 'assets/images/avatar/' . $_SESSION['username'] . '.jpg';
                                    if(file_exists($file)): ?>
                                        <img src="assets/images/avatar/<?php echo $_SESSION['username']; ?>.jpg" alt="" srcset="">
                                    <?php endif ?>
                                    <?php 
                                    if(!(file_exists($file))):  ?>
                                        <img src="assets/images/avatar/default.png" height="80">
                                    <?php endif ?>
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?>!</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="change-password.php"><i data-feather="settings"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <form class = 'row' style = 'height:22px' method ='post'>
                                    <input class = "col-md-6" type="submit" name="logout" value="LOGOUT" style = 'border:none; background-color:white; position:relative; left:34px; height:18px'>
                                    <p class="col-md-6" style = 'width:5px; position:relative; right:92px; bottom:2px'><i data-feather="log-out"></i></p>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Scan/Select Another Student</h3>
                </div>
				<br>
                <section class="section">
                    <form class="row mb-4" action="dean-qrscanner.php" method="POST">
                        <div class="col-md-8">
                            <div class="card">
                                <div class='card-header' style='background-color: #3acf61;'>
                                    <center><h4 style="color: white"><strong>Scan QR Code</strong></h4></center>
                                </div>
                                <div class='card-body'>
                                    <br>
                                    <div>
                                        <video id="preview" width="100%"></video>
                                    </div>
                                </div>
                                <div class="card-footer" style="background-color: #3acf61;">
                                    <input type="hidden" name="scannedqr" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
                                    <center><p id="test1" style="color: #b31d2c; position:relative; top:7px" ><strong>Scanning...</strong></p></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="position:relative; height:200px">
                                <div class="card-header" style="background-color: #3acf61">
                                    <h4 style="color:white"><center>Selected Schedule</center></h4>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <center>
                                                        <p style= "font-size:13px;"><strong>Selected Subject:</strong></p>
                                                    </center>
                                                    <center>
                                                        <input type="hidden" name="subject" value = "<?php echo $_SESSION['currentSubject'] ?>" >
                                                        <p style= "font-size:14px;"><strong><u><?php echo $_SESSION['currentSubject'] ?></u></strong></p>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <center>
                                                        <p style= "font-size:13px;"><strong>Selected Section:</strong></p>
                                                    </center>
                                                    <center>
                                                        <input type="hidden" name="section" value = "<?php echo $_SESSION['currentSection'] ?>" >
                                                        <p style= "font-size:14px;"><strong><u><?php echo $_SESSION['currentSection'] ?></u></strong></p>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="position:relative; height:86px; bottom:60px; border-top-style:hidden">
                                <div class="card-body">
                                    <br>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-12" style='position:relative; bottom:50px'>
                                                <div>
                                                    <center>
                                                        <p style= "font-size:13px;"><strong>Class Start:</strong></p>
                                                    </center>
                                                    <center>
                                                        <input type="hidden" name="time-in" value = "<?php echo $_SESSION['currentTimein'] ?>" >
                                                        <p style= "font-size:14px;"><strong><u><?php echo $_SESSION['currentTimein'] ?></u></strong></p>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style='height: 200px; position:relative; bottom:83px'>
                                <div class="card-header" style="background-color: #7a7777">
                                    <h4 style="color:white"><center>Student ID Manual Selector</center></h4>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div class="position-relative" style='width:100%;'>
                                        <input type="text" name="student_id" class="form-control" id="student_id" placeholder='Enter Student ID'>
                                    </div>
                                    <div class="clearfix" style='position:relative;'>
                                        <input type="submit" name="selectStud" value="Select Another Student" class="btn btn-primary float-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
       Instascan.Camera.getCameras().then(function(cameras){
           if(cameras.length > 0 ){
               scanner.start(cameras[0]);
           } else{
               alert('No cameras found');
           }

        }).catch(function(e) {
           console.error(e);
       });

        scanner.addListener('scan',function(c){
            document.getElementById('test1').innerHTML = c;
           document.getElementById('text').value=c;
       });

    </script>
</body>
</html>