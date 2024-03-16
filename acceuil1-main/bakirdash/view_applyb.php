<?php
session_start();
if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailS"]))
    header("location:../../WITHDBREC/index.php");
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des candidats</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="cssb/bak1.css">
</head>
<body>
    <!-- zyada-->
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
        <h1 class="my-4">Liste des candidats</h1>
        <a href="../recruiter.php" class="return"><h3 class="my-4">return home</h3></a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <!-- <th>id</th> -->
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>date de postulation</th>
                    <th>phone</th>
                    <th>message</th>
                    <th>CV</th>
                    <th>score</th>
                    <th>autre info</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // $i = 1;
                    $sqlC = $conn->prepare("SELECT id_cl FROM logincan");
                    $sqlC->execute();
                    
                    while ($idCa = $sqlC->fetch()):
                        // echo $idCa['id_ca'];
                    
                        $sql = $conn->prepare("SELECT * FROM postulation WHERE id_c=:idca");
                        $sql->bindParam(':idca', $idCa['id_cl'], PDO::PARAM_INT);
                        $sql->execute();
                    
                    
                 
             
                    while($ligne=$sql->fetch()):
                        //echo $ligne['id_ca'];
                        
                        
                ?>
                    <tr>
                        <!-- <td><?php //echo $i++; ?></td> -->
                        <td><?php echo $ligne['nom']; ?></td>
                        <td><?php echo $ligne['prenom']; ?></td>
                        <td><?php echo $ligne['mail']; ?></td>
                        <td><?php echo $ligne['date_postulation']; ?></td>
                        <td><?php echo $ligne['phone']; ?></td>
                        <td><?php echo $ligne['message']; ?></td>
                        <td> 
                            <?php
                         
                            if($sql && $sql->rowcount() > 0){
                                $fileURL = 'pdf/'.$ligne["cv"];
                            ?>
                                <a href="<?php echo $fileURL; ?>" class="btn btn-primary" download>Download PDF</a>
                            <?php } else { ?>
                                <p>No PDF file found for this application...</p>
                            <?php } ?>  
                        </td>
                        <td><?php echo $ligne['score']; ?></td>
                        <td><a href="autreinformation.php?id=<?php echo $ligne['id_c']?>">autre info</a></td>

                    </tr>
                <?php endwhile; ?>
                <?php endwhile; ?>
            </tbody>

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
