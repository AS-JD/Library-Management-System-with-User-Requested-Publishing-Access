<?php
include 'dbconnection.php';
session_start();
if (!isset($_SESSION["username"])) {
    header("location:login.php");
}
$sql = "select * from storys";
$result = mysqli_query($data, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="table.css" rel="stylesheet">
    <link href="navbar.css" rel="stylesheet">
    <link href="home.css" rel="stylesheet">


</head>


<body>
    <header>
        <nav class="navbar">
            <div class="logo">library</div>
            <ul class="nav-links">
                <div class="menu">
                    <li><a class="button" href='storynonapprouvee.php'>story en attente</a></li>
                    <li><a class="button" href='logout.php'>Logout</a></li>
                </div>
            </ul>
        </nav>
    </header>
    <h1 style="margin-left:auto;margin-right:auto">Admin Panel<br>Bienvenu <?php echo $_SESSION['username'] ?></h1>
    <div>

        <table class="container">
            <thead>
                <tr>
                    <th>id</th>
                    <th>titre</th>
                    <th>auteur</th>
                    <th>date_ajout</th>
                    <th>document</th>
                    <th>accepter</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <?php if ($result->num_rows >= 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo

                    '<form action="#" method="POST">
                    <tr>
                <td>' . $row["id"] . '</td>
                <td>' . $row["titre"] . '</td>
                <td>' . $row["auteur"] . '</td>
                <td>' . $row["date_ajoute"] . '</td>
                <td><a href="download.php?file=' . $row["id"] . '" target="_blank">telecharger</a></td>
                <td style="background-color:green" ><a style="text-decoration:none" name="accepter" href="accepter.php?file=' . $row["id"] . '">Accepter</a></td>
                <td style="background-color:red" ><a style="text-decoration:none" name="refuser" href="supprimer.php?file=' . $row["id"] . '">Supprimer</a></td>
                
            </tr>
            </form>';
                }
            } ?>
        </table>
    </div>
</body>

</html>