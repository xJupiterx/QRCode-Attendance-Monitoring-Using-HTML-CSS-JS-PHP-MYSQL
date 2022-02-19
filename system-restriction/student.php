<?php
if($_SESSION['accesslevel'] != 'SYSTEMADMIN'){
    header("location: error404.php");
}