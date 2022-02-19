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
                    <h3>View Faculty Complete Information</h3>
                </div></center>
				<br>
                <div class = 'row'>
                    <div class = 'col-md-12'>
                        <form class="card" method = 'post'>
                        <div class="card ">
                            <div class="card-header" style="background-color: #3acf61">
                                <h4 style="color: white"><center><strong>Loaded Subjects And Section</strong></center></h4>
                            </div>
                            <div class="card-body">
                                <br>
                                <div class = 'row'>
                                    <p class="col-md-12 col-12" style='font-size:18px'><b>Name: </b>
                                        <?php echo $_SESSION['plastname']; ?>, <?php echo $_SESSION['pfirstname']; ?> <?php echo substr($_SESSION['pmiddlename'], 0, 1); ?>
                                    </p>
                                </div>
                                <p class='col-md-12' style='font-size:18px'><b>Email: </b><?php echo $_SESSION['pemail']; ?></p>
                                <input type='hidden' name = 'p_email' value="<?php echo $_SESSION['pemail']; ?>" style='position:relative;right:80px'>
                                <br>
                                <div class = 'row'>
                                    <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted;'>
                                        <center><p style='position:relative; top:7px'><strong>SUBJECT</strong></p></center>
                                    </div>
                                    <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                        <center><p style='position:relative; top:7px'><strong>SECTION</strong></p></center>
                                    </div>
                                    <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                        <center><p style='position:relative; top:7px'><strong>Action</strong></p></center>
                                    </div>
                                </div>
                                <?php $count = 0; ?>
                                <?php if($_SESSION['sched1'] != ''): ?>
                                    <?php
                                    $count = $count + 1;
                                    $sched1 = $_SESSION['sched1'];
                                    $splitter = strpos($sched1,":");
                                    $length = strlen($sched1);
                                    $n1subject = substr($sched1, 0, ($splitter));
                                    $n1section = substr($sched1, ($splitter+1), $length);
                                    ?>
                                    <div class = 'row'>
                                        <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                            <center><p style='position:relative; top:7px'><?php echo $n1subject ?></p></center>
                                        </div>
                                        <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                            <center><p style='position:relative; top:7px'><?php echo $n1section ?></p></center>
                                        </div>
                                        <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                            <center>
                                                <input type="submit" onclick="return  confirm('Do you really want to REMOVE subject?')" name="removeSubject1" value="Remove Subject" class="btn btn-primary" style = "background-color:gray; border-color:black; position:relative; top:1px">
                                            </center>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if($_SESSION['sched2'] != ''): ?>
                                    <?php
                                    $count = $count + 1;
                                    $sched2 = $_SESSION['sched2'];
                                    $splitter = strpos($sched2,":");
                                    $length = strlen($sched2);
                                    $n2subject = substr($sched2, 0, ($splitter));
                                    $n2section = substr($sched2, ($splitter+1), $length);
                                    ?>
                                    <div class = 'row'>
                                        <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                            <center><p style='position:relative; top:7px'><?php echo $n2subject ?></p></center>
                                        </div>
                                        <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                            <center><p style='position:relative; top:7px'><?php echo $n2section ?></p></center>
                                        </div>
                                        <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                            <center>
                                                <input type="submit" onclick="return  confirm('Do you really want to REMOVE subject?')" name="removeSubject2" value="Remove Subject" class="btn btn-primary" style = "background-color:gray; border-color:black; position:relative; top:1px">
                                            </center>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if($_SESSION['sched3'] != ''): ?>
                                    <?php
                                    $count = $count + 1;
                                    $sched3 = $_SESSION['sched3'];
                                    $splitter = strpos($sched3,":");
                                    $length = strlen($sched3);
                                    $n3subject = substr($sched3, 0, ($splitter));
                                    $n3section = substr($sched3, ($splitter+1), $length);
                                    ?>
                                    <div class = 'row'>
                                        <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                            <center><p style='position:relative; top:7px'><?php echo $n3subject ?></p></center>
                                        </div>
                                        <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                            <center><p style='position:relative; top:7px'><?php echo $n3section ?></p></center>
                                        </div>
                                        <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                            <center>
                                                <input type="submit" onclick="return  confirm('Do you really want to REMOVE subject?')" name="removeSubject3" value="Remove Subject" class="btn btn-primary" style = "background-color:gray; border-color:black; position:relative; top:1px">
                                            </center>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if($_SESSION['sched4'] != ''): ?>
                                    <?php
                                    $count = $count + 1;
                                    $sched4 = $_SESSION['sched4'];
                                    $splitter = strpos($sched4,":");
                                    $length = strlen($sched4);
                                    $n4subject = substr($sched4, 0, ($splitter));
                                    $n4section = substr($sched4, ($splitter+1), $length);
                                    ?>
                                    <div class = 'row'>
                                        <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                            <center><p style='position:relative; top:7px'><?php echo $n4subject ?></p></center>
                                        </div>
                                        <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                            <center><p style='position:relative; top:7px'><?php echo $n4section ?></p></center>
                                        </div>
                                        <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                            <center>
                                                <input type="submit" onclick="return  confirm('Do you really want to REMOVE subject?')" name="removeSubject4" value="Remove Subject" class="btn btn-primary" style = "background-color:gray; border-color:black; position:relative; top:1px">
                                            </center>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if($_SESSION['sched5'] != ''): ?>
                                    <?php
                                    $count = $count + 1;
                                    $sched5 = $_SESSION['sched5'];
                                    $splitter = strpos($sched5,":");
                                    $length = strlen($sched5);
                                    $n5subject = substr($sched5, 0, ($splitter));
                                    $n5section = substr($sched5, ($splitter+1), $length);
                                    ?>
                                    <div class = 'row'>
                                        <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                            <center><p style='position:relative; top:7px'><?php echo $n5subject ?></p></center>
                                        </div>
                                        <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                            <center><p style='position:relative; top:7px'><?php echo $n5section ?></p></center>
                                        </div>
                                        <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                            <center>
                                                <input type="submit" onclick="return  confirm('Do you really want to REMOVE subject?')" name="removeSubject5" value="Remove Subject" class="btn btn-primary" style = "background-color:gray; border-color:black; position:relative; top:1px">
                                            </center>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if($_SESSION['sched6'] != ''): ?>
                                    <?php
                                    $count = $count + 1;
                                    $sched6 = $_SESSION['sched6'];
                                    $splitter = strpos($sched6,":");
                                    $length = strlen($sched6);
                                    $n6subject = substr($sched6, 0, ($splitter));
                                    $n6section = substr($sched6, ($splitter+1), $length);
                                    ?>
                                    <div class = 'row'>
                                        <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                            <center><p style='position:relative; top:7px'><?php echo $n6subject ?></p></center>
                                        </div>
                                        <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                            <center><p style='position:relative; top:7px'><?php echo $n6section ?></p></center>
                                        </div>
                                        <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                            <center>
                                                <input type="submit" onclick="return  confirm('Do you really want to REMOVE subject?')" name="removeSubject6" value="Remove Subject" class="btn btn-primary" style = "background-color:gray; border-color:black; position:relative; top:1px">
                                            </center>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if($_SESSION['sched7'] != ''): ?>
                                    <?php
                                    $count = $count + 1;
                                    $sched7 = $_SESSION['sched7'];
                                    $splitter = strpos($sched7,":");
                                    $length = strlen($sched7);
                                    $n7subject = substr($sched7, 0, ($splitter));
                                    $n7section = substr($sched7, ($splitter+1), $length);
                                    ?>
                                    <div class = 'row'>
                                        <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                            <center><p style='position:relative; top:7px'><?php echo $n7subject ?></p></center>
                                        </div>
                                        <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                            <center><p style='position:relative; top:7px'><?php echo $n7section ?></p></center>
                                        </div>
                                        <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                            <center>
                                                <input type="submit" onclick="return  confirm('Do you really want to REMOVE subject?')" name="removeSubject7" value="Remove Subject" class="btn btn-primary" style = "background-color:gray; border-color:black; position:relative; top:1px">
                                            </center>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if($_SESSION['sched8'] != ''): ?>
                                    <?php
                                    $count = $count + 1;
                                    $sched8 = $_SESSION['sched8'];
                                    $splitter = strpos($sched8,":");
                                    $length = strlen($sched8);
                                    $n8subject = substr($sched8, 0, ($splitter));
                                    $n8section = substr($sched8, ($splitter+1), $length);
                                    ?>
                                    <div class = 'row'>
                                        <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                            <center><p style='position:relative; top:7px'><?php echo $n8subject ?></p></center>
                                        </div>
                                        <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                            <center><p style='position:relative; top:7px'><?php echo $n8section ?></p></center>
                                        </div>
                                        <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                            <center>
                                                <input type="submit" onclick="return  confirm('Do you really want to REMOVE subject?')" name="removeSubject8" value="Remove Subject" class="btn btn-primary" style = "background-color:gray; border-color:black; position:relative; top:1px">
                                            </center>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if($_SESSION['sched9'] != ''): ?>
                                    <?php
                                    $count = $count + 1;
                                    $sched9 = $_SESSION['sched9'];
                                    $splitter = strpos($sched9,":");
                                    $length = strlen($sched9);
                                    $n9subject = substr($sched9, 0, ($splitter));
                                    $n9section = substr($sched9, ($splitter+1), $length);
                                    ?>
                                    <div class = 'row'>
                                        <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                            <center><p style='position:relative; top:7px'><?php echo $n9subject ?></p></center>
                                        </div>
                                        <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                            <center><p style='position:relative; top:7px'><?php echo $n9section ?></p></center>
                                        </div>
                                        <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                            <center>
                                                <input type="submit" onclick="return  confirm('Do you really want to REMOVE subject?')" name="removeSubject9" value="Remove Subject" class="btn btn-primary" style = "background-color:gray; border-color:black; position:relative; top:1px">
                                            </center>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <div class="divider">
                                    <div class="divider-text" style="color: gray; font-size: 12px">Load Another Subject</div>
                                </div>
                                <div class = 'row'>
                                    <div class = 'col-md-4' style='border-style:solid; border-right-style:dotted'>
                                        <div class="dropdown" style = "position:relative; left:90px; top:7px">
                                            <Select class="body_text" name="subject" id='SelectedSection'>
                                                <option value="Please Select"> Select Subject </option>
                                                <?php include("PHPRequestDatas/subjects.php"); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = 'col-md-4' style='border-style:solid; border-left-style:none;'>
                                        <div class="dropdown" style = "position:relative; left:90px; top:7px">
                                            <Select class="body_text" name="section" id='SelectedSection'>
                                                <option value="Please Select"> Select Section </option>
                                                <?php include("PHPRequestDatas/sections.php"); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "col-md-4 clearfix" style = "border-style:solid; border-left-style:none;">
                                        <center>
                                            <input type="submit" onclick="return  confirm('Do you really want to LOAD subject?')" name="addSubject" value="Load Subject" class="btn btn-primary" style = "background-color:gray; border-color:black;">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
</body>

</html>