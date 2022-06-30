<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Publier une nouvelle</title>
    <link rel="stylesheet" type="text/css" href="stylepub.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="navbar.css" rel="stylesheet">
    <link href="home.css" rel="stylesheet">

</head>

<body>

    <header>
        <nav class="navbar">
            <div class="logo">MY-Bibliotheque</div>
            <ul class="nav-links">
                <div class="menu">
                    <li><a class="button" href='userhome.php'>accueil</a></li>
                    <li><a class="button" href='addstory.php'>ajouter story</a></li>
                    <li><a class="button" href='logout.php'>Logout</a></li>
                </div>
            </ul>
        </nav>
    </header>
    <div class="container">

        <form action="addstory.php" enctype="multipart/form-data" method="POST">
            <fieldset>
                <legend>Information </legend>
                <label for="field1">
                    <span>Titre <span class="required">*</span>
                    </span>
                    <input type="text" class="input-field" name="titre" value="" /> <br>
                </label>

                <label for="field3">
                    <span>Langue <span class="required">*</span>
                    </span>
                    <input type="text" class="input-field" name="langue" value="" /><br>
                </label>
                <label for="field4"><span>Genre</span>
                    <select name="genre" class="select-field">
                        <option value="Romantique">Romantique</option>
                        <option value="Histoire">Histoire</option>
                        <option value="Geographie">Geographie</option>
                        <option value="Science Fiction">Science Fiction</option>
                        <option value="Aventure">Aventure</option>
                        <option value="Biographie">Biographie</option>
                        <option value="Drame">Drame</option>
                        <option value="Vaudeville">Vaudeville</option>
                        <option value="Autre..">Autre</option>
                    </select><br>
                </label>

                <legend>Résumé</legend>
                <label for="field6">
                    <span>Résumé <span class="required">*</span>
                    </span>
                    <input name="field6" name="description_story" class="textarea-field"></input></label><br>
                <br>
                <label>
                    <div>
                        <label for="file">ajouter la story</label>
                        <input type="file" name="file" required>
                    </div>
                    <input type="submit" value="publier" name='save' />
                </label>
            </fieldset>
        </form>
    </div>
</body>

</html>
<?php
session_start();
include 'dbconnection.php';
if (isset($_POST['save'])) {
    $titre = $_POST['titre'];
    $langue = $_POST['langue'];
    $description = $_POST['description_story'];
    $date = date('Y-m-d');
    $auteur = $_SESSION['username'];
    $genre = filter_input(INPUT_POST, 'genre');
    $upload_dossier = 'storys_dossier';
    $file = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    $file_storage_name = $upload_dossier . '/' . $_FILES['file']['name'];
    move_uploaded_file($file, $file_storage_name);
    $sql = "INSERT into storys(titre,auteur,description_story,date_ajoute,file_story,genre) VALUES('$titre','$auteur','$description','$date','$file_storage_name','$genre')";
    if (mysqli_query($data, $sql)) {
        echo '<script>alert("demande bien enregistree")</script>';
        header("location:userhome.php");
    }
} else {
    echo '<script>alert("un erreur se produit")</script>';
}


?>