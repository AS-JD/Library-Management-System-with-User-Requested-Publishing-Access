<?php
include 'dbconnection.php';
if (!empty($_GET['file'])) {
    $filid = $_GET['file'];
    $sql = "UPDATE storys SET acceptation=1 WHERE id='" . $filid . "'";
    if (mysqli_query($data, $sql)) {
        header("location:adminhome.php");
    } else {
        header("location:adminhome.php");
    }
}

?>