<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - City College of Tagaytay</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="shortcut icon" href="assets/images/scs.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
	<style>
		body{
			background:  url('assets/images/background/auth.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			align-items: center;
			justify-content: center;
        }
	</style>
</head>

<body>
    <div>
        <?php if($_SESSION['accesslevel'] == 'SYSTEMADMIN'): ?>
            <?php include('sidebar/sysad_sidebar.html') ?>
        <?php endif ?>
        <?php if($_SESSION['accesslevel'] == 'DEAN'): ?>
            <?php include('sidebar/dean_sidebar.html') ?>
        <?php endif ?>
        <?php if($_SESSION['accesslevel'] == 'PROGRAMCOORDINATOR'): ?>
            <?php include('sidebar/progcoor_sidebar.html') ?>
        <?php endif ?>
        <?php if($_SESSION['accesslevel'] == 'FACULTY'): ?>
            <?php include('sidebar/faculty_sidebar.html') ?>
        <?php endif ?>
        <?php if($_SESSION['accesslevel'] == 'STUDENT'): ?>
            <?php include('sidebar/student_sidebar.html') ?>
        <?php endif ?>
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
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Change Password</a>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 mx-auto">
                        <div class="card pt-4">
                            <div class="card-body">
                                <div class="text-center mb-5">
                                    <img src="assets/images/scs.png" height="80" class='mb-4'>
                                    <h3>Change Password for</h3>
                                    <h5>Username: <?php echo $_SESSION['username'] ?></h5>
                                    <h5>Accesslevel: <?php echo $_SESSION['accesslevel'] ?></h5>
                                </div>
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="rpassword-column">Recent Password</label>
                                                <input type="password" id="rpassword-column" class="form-control"
                                                    name="rpassword">
                                            </div>
                                        </div>
                                        <br><br>
                                        <br><br>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="npassword-column">New Password</label>
                                                <input type="password" id="npassword-column" class="form-control"
                                                    name="npassword">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="repassword-column">Repeat Password</label>
                                                <input type="password" id="repassword-column" class="form-control"
                                                    name="repassword">
                                            </div>
                                        </div>
                                        <?php 
                                            if(isset($_SESSION['errors1'])){
                                                if($_SESSION['errors1'] > 0){
                                                    if(isset($_SESSION['data1'])){
                                                        if($_SESSION['data1'] == 'empty'){
                                                            echo '<p style = "color:red"> Please Fillup all Fields!</p>';
                                                        }
                                                        if($_SESSION['data1'] == 'unmatched1'){
                                                            echo '<p style = "color:red"> New Password not Match!</p>';
                                                        }
                                                        if($_SESSION['data1'] == 'unmatched2'){
                                                            echo '<p style = "color:red"> Incorrect Password!</p>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    <div class="clearfix">
                                        <input type="submit" name="changepass" value="Confirm" class="btn btn-primary float-end" style="margin-right: 200px;" onclick="return  confirm('Do you really want to update password?')">
                                    </div>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>