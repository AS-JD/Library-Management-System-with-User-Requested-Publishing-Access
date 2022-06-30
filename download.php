<?php
include 'dbconnection.php';
if(!empty($_GET['file'])){
   $filid=$_GET['file'];
    $sql = "select file_story from storys where id='" . $filid ."'";
    $result = mysqli_query($data, $sql);
    while ($row = $result->fetch_assoc()) {
        $file= $row['file_story'];
    if(!empty($file)){
      header("Cache-Controle: public");
      header("Contetnt-Description: File Transfer");
      header("Contetnt-Disposition: attachement; filename=$file");
      header('Content-Type: application/pdf');
      readfile($file);
      exit;
   }
   else{
       echo 'fichier non trouve';
   }
}
}






?>