<?php session_start(); ?>
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
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <center>
					<div class="sidebar-header" style="background-color: #3acf61">
						<img src="assets/images/scs.png">
						<br>
						<a style="color:white;font-size:22px;">School of Computer Studies</a>
					</div>	
				</center>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <div class="divider">
                            <div class="divider-text" style="color: gray; font-size: 12px">Main Menu</div>
                        </div>
                        <li class="sidebar-item active ">
                            <a href="dean-page.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="book" width="20"></i>
                                <span>Attendance Monitoring</span>
                            </a>
                            <ul class="submenu " style="background-color: #e3e3e3">
                                <li>
                                    <a href="dean-student-info.php">View Student's Information</a>
                                </li>
                                <li>
                                    <a href="dean-student-attendance.php">View Student's Attendance</a>
                                </li>
                            </ul>
                        </li>
						<div class="divider">
                            <div class="divider-text" style="color: gray; font-size: 12px">More Options</div>
                        </div>
						<li class="sidebar-item active ">
                            <a href="dean-createacc.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="plus" width="20"></i>
                                <span>Create Faculty Account</span>
                            </a>
                        </li>
						<li class="sidebar-item active ">
                            <a href="dean-update-database.php" class='sidebar-link' style="background-color: #e3e3e3">
                                <i data-feather="database" width="20"></i>
                                <span>Update Student Database</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
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
                                    <img src="assets/images/avatar/<?php echo $_SESSION['lastname']; ?>.jpg" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?>!</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Attendance Recording</h3>
                </div>
				<br>
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card ">
                                <div class="card-header" style="background-color: #3acf61">
                                    <center><h4 style="color: white"><strong>Scan QR Code</strong></h4></center>
                                </div>
                                <center><div class="square"></div></center>
                                <div class="card-footer" style="background-color: #3acf61; height: 60px; position: sticky; padding: 20px;">
                                    <center><p style="color: #b31d2c"><strong>Scanning...</strong></p></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header" style="background-color: #3acf61">
                                    <h4 style="color:white"><center>Subject - Section Selector</center></h4>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <center>
                                                        <p style= "font-size:16px;"><strong>Select Subject:</strong></p>
                                                    </center>
                                                    <div class="dropdown">
                                                        <Select class="body_text" name="subject" onchange="getSubject(this)">
                                                            <option value="Please Select"> Please Select </option>
                                                            <option value="Subject 1"> Subject 1 </option>
                                                            <option value="Subject 2"> Subject 2 </option>
                                                            <option value="Subject 3"> Subject 3 </option>
                                                            <option value="Subject 4"> Subject 4 </option>
                                                            <option value="Subject 5"> Subject 5 </option>
                                                            <option value="Subject 6"> Subject 6 </option>
                                                            <option value="Subject 7"> Subject 7 </option>
                                                            <option value="Subject 8"> Subject 8 </option>
                                                            <option value="Subject 9"> Subject 9 </option>    
                                                        </select>
                                                        <br><br>
                                                        <div id="subject" style="color:Green; font-size: 13px; font-weight:bold"> </div>
                                                    </div>
                                                    <script language="JavaScript">
                                                        var SSubject = new Array()
                                                        SSubject[0] = "Please Select Subject!"
                                                        SSubject[1] = "Subject 1 Selected!"
                                                        SSubject[2] = "Subject 2 Selected!"
                                                        SSubject[3] = "Subject 3 Selected!"
                                                        SSubject[4] = "Subject 4 Selected!"
                                                        SSubject[5] = "Subject 5 Selected!"
                                                        SSubject[6] = "Subject 6 Selected!"
                                                        SSubject[7] = "Subject 7 Selected!"
                                                        SSubject[8] = "Subject 8 Selected!"
                                                        SSubject[9] = "Subject 9 Selected!"

                                                        function getSubject(slction){
                                                        txtSelected = slction.selectedIndex;
                                                        document.getElementById('subject').innerHTML = SSubject[txtSelected];
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <center>
                                                        <p style= "font-size:16px;"><strong>Select Section:</strong></p>
                                                    </center>
                                                    <div class="dropdown">
                                                        <Select class="body_text" name="section" onchange="getSection(this)">
                                                            <option value="Please Select"> Please Select </option>
                                                            <option value="Section 1"> Section 1 </option>
                                                            <option value="Section 2"> Section 2 </option>
                                                            <option value="Section 3"> Section 3 </option>
                                                            <option value="Section 4"> Section 4 </option>
                                                            <option value="Section 5"> Section 5 </option>
                                                            <option value="Section 6"> Section 6 </option>
                                                            <option value="Section 7"> Section 7 </option>
                                                            <option value="Section 8"> Section 8 </option>
                                                            <option value="Section 9"> Section 9 </option>    
                                                        </select>
                                                        <br><br>
                                                        <div id="section" style="color:Green; font-size: 13px; font-weight:bold"> </div>
                                                    </div>
                                                    <script language="JavaScript">
                                                        var SSection = new Array()
                                                        SSection[0] = "Please Select Section!"
                                                        SSection[1] = "Section 1 Selected!"
                                                        SSection[2] = "Section 2 Selected!"
                                                        SSection[3] = "Section 3 Selected!"
                                                        SSection[4] = "Section 4 Selected!"
                                                        SSection[5] = "Section 5 Selected!"
                                                        SSection[6] = "Section 6 Selected!"
                                                        SSection[7] = "Section 7 Selected!"
                                                        SSection[8] = "Section 8 Selected!"
                                                        SSection[9] = "Subject 9 Selected!"

                                                        function getSection(Section){
                                                        SectionSelected = Section.selectedIndex;
                                                        document.getElementById('section').innerHTML = SSection[SectionSelected];
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </diV>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
</body>

</html>