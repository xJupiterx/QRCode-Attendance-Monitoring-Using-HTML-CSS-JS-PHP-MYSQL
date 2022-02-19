<?php
if($_SESSION['accesslevel'] != 'PROGRAMCOORDINATOR'){
    header("location: error404.php");
}