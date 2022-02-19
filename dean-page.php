<?php 
include('server.php'); 
include('system-restriction/dean.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dean Dashboard</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php include('sidebar/dean_sidebar.html'); ?>
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
            <form class="main-content container-fluid" method = 'post' action = 'dean-page.php'>
                <section class="col-md-12">
                    <?php
						$sqlSelect = "SELECT * FROM loaded_subjects WHERE username = '" . $_SESSION['username'] . "';";
						$result = mysqli_query($db, $sqlSelect);
									
						if (mysqli_num_rows($result) > 0) {
					?>
						<?php
						    while ($row = mysqli_fetch_array($result)) {
						?>
                            <div class = 'row'>
                            <?php 
                                if($row['sched1'] != ''):
                            ?>
                                <?php 
                                    $sched = $row['sched1'];
                                    $splitter = strpos($sched,":");
                                    $length = strlen($sched);
                                    $nsubject = substr($sched, 0, ($splitter));
                                    $nsection = substr($sched, ($splitter+1), $length);
                                ?>
                                <div class = 'col-md-3'>
                                    <div class="card ">
                                        <div class="card-header" style="background-color: #3acf61">
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <input type="submit" name="schedViewer1" value=<?php echo $nsubject ?> style="background-color:#3acf61; border:none; color: white; position:relative; top:20px; right:7px; font-size:40px; font-weight:bold">
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <input type="hidden" name="schedule1" value=<?php echo $row['sched1'] ?>>
                                                </div>
                                            </div>
                                            <h1 style="color: white; font-size:10px"><strong><?php echo $nsubject ?></strong></h1>
                                            <h5 style="color: white;"><?php echo $nsection ?></h5>
                                        </div>
                                        <div class="card-body" style = 'height:120px'>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endif
                            ?>
                            <!-- ########### -->
                            <?php 
                                if($row['sched2'] != ''):
                            ?>
                                <?php 
                                    $sched = $row['sched2'];
                                    $splitter = strpos($sched,":");
                                    $length = strlen($sched);
                                    $nsubject = substr($sched, 0, ($splitter));
                                    $nsection = substr($sched, ($splitter+1), $length);
                                ?>
                                <div class = 'col-md-3'>
                                    <div class="card ">
                                        <div class="card-header" style="background-color: #3acf61">
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <input type="submit" name="schedViewer2" value=<?php echo $nsubject ?> style="background-color:#3acf61; border:none; color: white; position:relative; top:20px; right:7px; font-size:40px; font-weight:bold">
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <input type="hidden" name="schedule2" value=<?php echo $row['sched2'] ?>>
                                                </div>
                                            </div>
                                            <h1 style="color: white; font-size:10px"><strong><?php echo $nsubject ?></strong></h1>
                                            <h5 style="color: white;"><?php echo $nsection ?></h5>
                                        </div>
                                        <div class="card-body" style = 'height:120px'>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endif
                            ?>
                            <!-- ########### -->
                            <?php 
                                if($row['sched3'] != ''):
                            ?>
                                <?php 
                                    $sched = $row['sched3'];
                                    $splitter = strpos($sched,":");
                                    $length = strlen($sched);
                                    $nsubject = substr($sched, 0, ($splitter));
                                    $nsection = substr($sched, ($splitter+1), $length);
                                ?>
                                <div class = 'col-md-3'>
                                    <div class="card ">
                                        <div class="card-header" style="background-color: #3acf61">
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <input type="submit" name="schedViewer3" value=<?php echo $nsubject ?> style="background-color:#3acf61; border:none; color: white; position:relative; top:20px; right:7px; font-size:40px; font-weight:bold">
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <input type="hidden" name="schedule3" value=<?php echo $row['sched3'] ?>>
                                                </div>
                                            </div>
                                            <h1 style="color: white; font-size:10px"><strong><?php echo $nsubject ?></strong></h1>
                                            <h5 style="color: white;"><?php echo $nsection ?></h5>
                                        </div>
                                        <div class="card-body" style = 'height:120px'>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endif
                            ?>
                            <!-- ########### -->
                            <?php 
                                if($row['sched4'] != ''):
                            ?>
                                <?php 
                                    $sched = $row['sched4'];
                                    $splitter = strpos($sched,":");
                                    $length = strlen($sched);
                                    $nsubject = substr($sched, 0, ($splitter));
                                    $nsection = substr($sched, ($splitter+1), $length);
                                ?>
                                <div class = 'col-md-3'>
                                    <div class="card ">
                                        <div class="card-header" style="background-color: #3acf61">
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <input type="submit" name="schedViewer4" value=<?php echo $nsubject ?> style="background-color:#3acf61; border:none; color: white; position:relative; top:20px; right:7px; font-size:40px; font-weight:bold">
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <input type="hidden" name="schedule4" value=<?php echo $row['sched4'] ?>>
                                                </div>
                                            </div>
                                            <h1 style="color: white; font-size:10px"><strong><?php echo $nsubject ?></strong></h1>
                                            <h5 style="color: white;"><?php echo $nsection ?></h5>
                                        </div>
                                        <div class="card-body" style = 'height:120px'>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endif
                            ?>
                            <!-- ########### -->
                            <?php 
                                if($row['sched5'] != ''):
                            ?>
                                <?php 
                                    $sched = $row['sched5'];
                                    $splitter = strpos($sched,":");
                                    $length = strlen($sched);
                                    $nsubject = substr($sched, 0, ($splitter));
                                    $nsection = substr($sched, ($splitter+1), $length);
                                ?>
                                <div class = 'col-md-3'>
                                    <div class="card ">
                                        <div class="card-header" style="background-color: #3acf61">
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <input type="submit" name="schedViewer5" value=<?php echo $nsubject ?> style="background-color:#3acf61; border:none; color: white; position:relative; top:20px; right:7px; font-size:40px; font-weight:bold">
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <input type="hidden" name="schedule5" value=<?php echo $row['sched5'] ?>>
                                                </div>
                                            </div>
                                            <h1 style="color: white; font-size:10px"><strong><?php echo $nsubject ?></strong></h1>
                                            <h5 style="color: white;"><?php echo $nsection ?></h5>
                                        </div>
                                        <div class="card-body" style = 'height:120px'>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endif
                            ?>
                            <!-- ########### -->
                            <?php 
                                if($row['sched6'] != ''):
                            ?>
                                <?php 
                                    $sched = $row['sched6'];
                                    $splitter = strpos($sched,":");
                                    $length = strlen($sched);
                                    $nsubject = substr($sched, 0, ($splitter));
                                    $nsection = substr($sched, ($splitter+1), $length);
                                ?>
                                <div class = 'col-md-3'>
                                    <div class="card ">
                                        <div class="card-header" style="background-color: #3acf61">
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <input type="submit" name="schedViewer6" value=<?php echo $nsubject ?> style="background-color:#3acf61; border:none; color: white; position:relative; top:20px; right:7px; font-size:40px; font-weight:bold">
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <input type="hidden" name="schedule6" value=<?php echo $row['sched6'] ?>>
                                                </div>
                                            </div>
                                            <h1 style="color: white; font-size:10px"><strong><?php echo $nsubject ?></strong></h1>
                                            <h5 style="color: white;"><?php echo $nsection ?></h5>
                                        </div>
                                        <div class="card-body" style = 'height:120px'>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endif
                            ?>
                            <!-- ########### -->
                            <?php 
                                if($row['sched7'] != ''):
                            ?>
                                <?php 
                                    $sched = $row['sched7'];
                                    $splitter = strpos($sched,":");
                                    $length = strlen($sched);
                                    $nsubject = substr($sched, 0, ($splitter));
                                    $nsection = substr($sched, ($splitter+1), $length);
                                ?>
                                <div class = 'col-md-3'>
                                    <div class="card ">
                                        <div class="card-header" style="background-color: #3acf61">
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <input type="submit" name="schedViewer7" value=<?php echo $nsubject ?> style="background-color:#3acf61; border:none; color: white; position:relative; top:20px; right:7px; font-size:40px; font-weight:bold">
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <input type="hidden" name="schedule7" value=<?php echo $row['sched7'] ?>>
                                                </div>
                                            </div>
                                            <h1 style="color: white; font-size:10px"><strong><?php echo $nsubject ?></strong></h1>
                                            <h5 style="color: white;"><?php echo $nsection ?></h5>
                                        </div>
                                        <div class="card-body" style = 'height:120px'>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endif
                            ?>
                            <!-- ########### -->
                            <?php 
                                if($row['sched8'] != ''):
                            ?>
                                <?php 
                                    $sched = $row['sched8'];
                                    $splitter = strpos($sched,":");
                                    $length = strlen($sched);
                                    $nsubject = substr($sched, 0, ($splitter));
                                    $nsection = substr($sched, ($splitter+1), $length);
                                ?>
                                <div class = 'col-md-3'>
                                    <div class="card ">
                                        <div class="card-header" style="background-color: #3acf61">
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <input type="submit" name="schedViewer8" value=<?php echo $nsubject ?> style="background-color:#3acf61; border:none; color: white; position:relative; top:20px; right:7px; font-size:40px; font-weight:bold">
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <input type="hidden" name="schedule8" value=<?php echo $row['sched8'] ?>>
                                                </div>
                                            </div>
                                            <h1 style="color: white; font-size:10px"><strong><?php echo $nsubject ?></strong></h1>
                                            <h5 style="color: white;"><?php echo $nsection ?></h5>
                                        </div>
                                        <div class="card-body" style = 'height:120px'>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endif
                            ?>
                            <!-- ########### -->
                            <?php 
                                if($row['sched9'] != ''):
                            ?>
                                <?php 
                                    $sched = $row['sched9'];
                                    $splitter = strpos($sched,":");
                                    $length = strlen($sched);
                                    $nsubject = substr($sched, 0, ($splitter));
                                    $nsection = substr($sched, ($splitter+1), $length);
                                ?>
                                <div class = 'col-md-3'>
                                    <div class="card ">
                                        <div class="card-header" style="background-color: #3acf61">
                                            <div class = 'row'>
                                                <div class = 'col-md-6'>
                                                    <input type="submit" name="schedViewer9" value=<?php echo $nsubject ?> style="background-color:#3acf61; border:none; color: white; position:relative; top:20px; right:7px; font-size:40px; font-weight:bold">
                                                </div>
                                                <div class = 'col-md-6'>
                                                    <input type="hidden" name="schedule9" value=<?php echo $row['sched9'] ?>>
                                                </div>
                                            </div>
                                            <h1 style="color: white; font-size:10px"><strong><?php echo $nsubject ?></strong></h1>
                                            <h5 style="color: white;"><?php echo $nsection ?></h5>
                                        </div>
                                        <div class="card-body" style = 'height:120px'>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endif
                            ?>
                            <!-- ########### -->
                            </div> 
						<?php
						    }
						?>
	                <?php } ?>
                    </div>
                </section>
            </form>
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