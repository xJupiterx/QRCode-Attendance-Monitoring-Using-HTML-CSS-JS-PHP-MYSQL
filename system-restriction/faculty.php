<?php
if($_SESSION['accesslevel'] != 'FACULTY'){
    header("location: error404.php");
}