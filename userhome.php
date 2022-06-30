<?php
include 'dbconnection.php';
session_start();
if (!isset($_SESSION["username"])) {
    header("location:login.php");
}
$sql = "select * from storys where acceptation=1";
$result = mysqli_query($data, $sql);
$row = mysqli_fetch_array($result);
$sql2 = "select * from storys where acceptation=1 and auteur='" . $_SESSION["username"] . "'";
$result2 = mysqli_query($data, $sql2);
$row2 = mysqli_fetch_array($result2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="navbar.css" rel="stylesheet">
    <link href="home.css" rel="stylesheet">


</head>

<body class="lineaire-simple">
    <nav class="navbar">
        <div class="logo">MY-Bibliotheque</div>
        <ul class="nav-links">
            <div class="menu">
                <li class="services">
                    <a href="/">storys acceptee</a>
                    <ul class="dropdown">
                        <?php if ($result2->num_rows >= 0) {
                            while ($row2 = mysqli_fetch_array($result2)) {
                                echo '<li><a href="/">' . $row2["titre"] . '</a></li>';
                            }
                        } ?>
                    </ul>
                </li>
                <li><a class="button" href='addstory.php'>ajouter story</a></li>
                <li><a class="button" href='logout.php'>Logout</a></li>
            </div>
        </ul>
    </nav>
    <div class="welcome">
        <h1>Bienvenu <?php echo $_SESSION['username'] ?> ...</h1>
    </div>
    <div>
        <?php if ($result->num_rows >= 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo

                '
<hr style="height:2px;border-width:0;background-color:black;width:70%">
            <div class="card">
                <h2 class="fakeimg">Titre : ' . $row["titre"] . '</h2>
                <div>Auteur : '  . $row["auteur"] . '</div>
                <h5>ajouter le ' . $row["date_ajoute"] . '</h5>
                <p style="text-decoration: underline;">Description :</p>
                <p>Description de la story' . $row["description_story"] . '</p>
                <p style="text-decoration: underline;">Telecharger le pdf:</p>
               <button class="btn"><i class="fa fa-download"></i>  <a href="download.php?file=' . $row["id"] . '" target="_blank">Telecharger Pdf</a></button>

                
            </div>
';
            }
        } ?>
    </div>

</body>

</html>