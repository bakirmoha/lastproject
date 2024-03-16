<?php
session_start();



if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailS"]))
    header("location:../../WITHDBREC/index.php");

else {  include 'config.php';
    $email=$_SESSION["emailS"];
    if(!isset($_GET['id'])){
        echo"la pade n'est pas valable";
    }else {
       $id=$_GET['id'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autres informations</title>
    <link rel="stylesheet" href="cssb/bak1.css">
</head>
<body>
    <header class="header">
        <section class="flex">
            <div class="img">
            <img src="images/logob1.png" alt="">
            </div>
           
            <nav class="navbar">
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Search</a>
                <a href="#">Contact Us</a>
                <a href="#">Account</a>
            </nav>
        </section>
    </header>
    <!-- zyada-->
    <div class="container">
        <h1 class="my-4">Autres informations</h1>
        <a href="view_applyb.php" class="return"><h3 class="my-4">return home</h3></a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    
                    <th>Formation</th>
                    <th>Experience</th>
                    <th>Skills</th>
                    <!-- <th>Projets</th> -->
                    <th>languages</th>
                    
                </tr>
                
            </thead>
            <tbody>
                
            <?php

       $sql = $conn->prepare("SELECT * FROM educt WHERE id_c=:idCa");
      $sql->bindParam(':idCa', $id, PDO::PARAM_INT);
      $sql->execute();

     $sqlE = $conn->prepare("SELECT * FROM exprt WHERE id_c=:idCa");
    $sqlE->bindParam(':idCa', $id, PDO::PARAM_INT);
    $sqlE->execute();

    $sqlS = $conn->prepare("SELECT * FROM skills WHERE id_c=:idCa");
    $sqlS->bindParam(':idCa', $id, PDO::PARAM_INT);
   $sqlS->execute();

$sqlG = $conn->prepare("SELECT * FROM languages WHERE id_c=:idCa");
$sqlG->bindParam(':idCa', $id, PDO::PARAM_INT);
$sqlG->execute();


while ($ligne = $sql->fetch()){
?>
    <tr>
        <td><?php echo $ligne['FILIER']; ?></td>
        <?php while($ligneE=$sqlE->fetch()){?>
        <td><?php echo $ligneE['societe'].': '. $ligneE['period']; ?></td>
        <?php }?>
        <?php while($ligneS=$sqlS->fetch()){?>
        <td><?php echo $ligneS['skills'].': '. $ligneS['level']; ?></td>
        <?php }?>
        <?php while($ligneG=$sqlG->fetch()){?>
        <td><?php echo $ligneG['langs'].': '. $ligneG['level']; ?></td>
        <?php }?>
    </tr>
<?php } ?>
<?php } ?>
<?php } ?>
</tbody>

        </table>
    </div>
    <footer class=footer>
        <section> 
            <div class="copy">
            &copy;copyright @2024
            </div>
        </section>
    </footer>
    
    
   
</body>
</html>
