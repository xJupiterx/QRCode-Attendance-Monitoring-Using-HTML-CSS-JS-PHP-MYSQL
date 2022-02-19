<?php 
include('server.php'); 
include('system-restriction/programcoordinator.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/qrious.min.js"></script>
</head>

<body>
<div id="app">
        <?php include('sidebar/progcoor_sidebar.html'); ?>
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
                <center><div class="page-title">
                    <h3>View Student Complete Information</h3>
                </div></center>
				<br>
                <div class = 'row'>
                    <div class = 'col-md-12'>
                        <div class="card">
                            <div class="card-header" style="background-color: #3acf61">
                                <h4 style="color: white"><center><strong>Student Details</strong></center></h4>
                            </div>
                            <div class="card-body">
                                <br>
                                <center><p class="col-md-12 col-12" style='font-size:18px'><b>Access Level: </b><?php echo $_SESSION['paccesslevel']; ?></p></center>
                                <div class="row">
                                    <p class="col-md-12 col-12" style='font-size:18px'><b>Name: </b>
                                        <?php echo $_SESSION['plastname']; ?>, <?php echo $_SESSION['pfirstname']; ?> <?php echo substr($_SESSION['pmiddlename'], 0, 1); ?>
                                    </p>
                                    <p class="col-md-12 col-12" style='font-size:18px'><b>Email: </b>
                                        <?php echo $_SESSION['pemail'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = 'col-md-12'>
                        <div class="card ">
                            <div class="card-header" style="background-color: #3acf61">
                                <h4 style="color: white"><center><strong>Loaded Subjects And Section</strong></center></h4>
                            </div>
                            <div class="card-body">
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style = "width:8%; font-size: 14px"><center>Subject</center></th>
                                                <th style = "width:8%; font-size: 14px"><center>Section</center></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            for($i = 1; $i<10; $i++) {
                                                $i = strval($i);
                                                $schedcounter = 'sched' . $i;
                                                $splitter = strpos($_SESSION[$schedcounter],":");
                                                $length = strlen($_SESSION[$schedcounter]);
                                                $nsubject = substr($_SESSION[$schedcounter], 0, ($splitter));
                                                $nsection = substr($_SESSION[$schedcounter], ($splitter+1), $length);
                                        ?>
                                        <tbody>
                                            <tr>
                                                <?php if($_SESSION[$schedcounter] != ''): ?>
                                                    <td><center><?php  echo $nsubject ?></center></td>
                                                    <td><center><?php  echo $nsection ?></center></td>
                                                <?php endif ?>
                                                <?php if($_SESSION[$schedcounter] == ''): ?>
                                                    <?php $_SESSION['count']=$i ;
                                                    ?>
                                                <?php endif ?>
                                            </tr>
                                        <?php
                                            $i = intval($i);
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: gray; position:relative; height:30px">
                                <a style="color: white; font-size:14px; position:relative; bottom:3px" href='progcoor-edit_add-subject_section.php'><center>Click <u>here</u> to edit/load Faculty Subject/Section.</center></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>