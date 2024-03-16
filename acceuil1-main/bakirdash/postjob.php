<?php
session_start();
if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailS"]))
    header("location:../../WITHDBREC/index.php");
$_SESSION["emailS"];

include 'config.php';

$titre = $lieu = $desc = '';
$titreErr = $lieuErr = $descErr = '';

$stmt = $conn->prepare("SELECT id_r FROM loginrec WHERE email = :email");
$stmt->bindParam(':email', $user_email); 
$user_email = $_SESSION['emailS']; 
$stmt->execute();
$user_row = $stmt->fetch();

if ($user_row) {
    $id_r = $user_row['id_r'];

    if (isset($_POST['submit'])) {
        if (empty($_POST['titre'])) {
            $titreErr = 'Veuillez entrer le titre';
        } else {
            $titre = filter_input(
                INPUT_POST,
                'titre',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($_POST['lieu'])) {
            $lieuErr = 'veuilez entrer le lieu';
        } else {
            $lieu = filter_input(INPUT_POST, 'lieu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if (empty($_POST['descri'])) {
            $descErr = 'veillez entrez la description';
        } else {
            $desc = filter_input(
                INPUT_POST,
                'descri',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );
        }
        if (empty($titreErr) && empty($lieuErr) && empty($descErr)) {
            // Add to database using prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO offre (titre_off, lieu, `descri`, id_r) VALUES (:titre, :lieu, :descri, :id_r)");
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':lieu', $lieu);
            $stmt->bindParam(':descri', $desc);
            $stmt->bindParam(':id_r', $id_r);

            try {
                $stmt->execute();
                echo "Record inserted successfully";
            } catch(PDOException $e) {
                echo "Error inserting record: " . $e->getMessage();
            }
        }
    }
} else {
    echo "User not found";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="cssb/bak.css">
</head>
<body>
    <header class="header">
        <section class="flex">
            <div class="img">
            <img src="images/logob1.png" alt="">
            </div>
            <!-- <a href="#" class="Carrer">
                <i class="bars"></i>
                <img src="images/logob1.png" alt="">
                 
            </a> -->
            <nav class="navbar">
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Search</a>
                <a href="#">Contact Us</a>
                <a href="#">Account</a>
            </nav>
        </section>
    </header>
    <div class="account-form-container">
        <section class="account-form">
            <form action="<?php echo htmlspecialchars(
      $_SERVER['PHP_SELF']
    ); ?>" method="post">
                <h3>Post Now</h3>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo $error;
                    }
                } 
                ?>
                <input type="text" required name="titre" placeholder="titre" class="input">
             
                <input type="text" required name="lieu" placeholder="lieu" class="input">
            
                <textarea required name="descri" placeholder="post a job" class="input" cols="30" rows="10"></textarea>
                <input type="submit" value="Send" name="submit" class="btn">
                <a href="../recruiter.php" font-size: 50px; ><h4>back home</h4></a>
            </form>
        </section>
    </div>
    
    <footer class=footer>
        <section> 
            <div class="copy">
            &copy;copyright @2024
            </div>
        </section>
    </footer>
    
   
    <script src="jsb/script.js"></script>
</body>
</html>