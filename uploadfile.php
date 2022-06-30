<?php
session_start();
include 'dbconnection.php';
if(isset($_POST['submit'])){
    $titre=$_POST['titre'];
    $description = $_POST['description'];
    $date= date('Y-m-d');
    $file= $_POST['file'];
    $auteur= $_SESSION['username'];
    $upload_dossier= '/storys_dossier';
    $file_storage_name= $upload_dossier . '/' . $_FILES['file']['titre'];
    move_uploaded_file($titre, $file_storage_name);
    $sql="INSERT into storys(titre,auteur,description_story,date_ajoute,file_story) VALUES('$titre','$auteur','$description','$date','$file')";
    if(mysqli_query($data, $sql)){
        echo '<script>alert("fichier bien enregistree")</script>';
    }
    else {
        echo '<script>alert("erreur")</script>';
    }


}
