<?php
include 'dbconnection.php';
if (!empty($_GET['file'])) {
    $filid = $_GET['file'];
    $sql = "DELETE FROM storys WHERE id='" . $filid . "'";
    if (mysqli_query($data, $sql)) {
        header("location:adminhome.php");
    } else {
        header("location:adminhome.php");
    }

}
