<?php
if($_SESSION['accesslevel'] != 'DEAN'){
    header("location: error404.php");
}