<?php
session_start();
if (!isset($_POST["FORMATS"]) || !isset($_POST["SKILLS"]) || !isset($_POST["LANGS"])) {
    header("location:./acceuil1-main/condidat.php");
} else { ?>

    <?php

    try {
        $connect = new PDO("mysql:host=localhost;dbname=clients;port=3306;charset=utf8","root","");
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
$DOMAIN=htmlspecialchars($_POST["DOMAIN"]);
$ADRESSE=htmlspecialchars($_POST["TEL"]);
$TEL=htmlspecialchars($_POST["ADRESSE"]);

$SETDOMAIN=$connect->prepare("update logincan set domain=? where id_cl=?");
$SETDOMAIN->execute(array($DOMAIN,$_SESSION["ID_C"]));
$SETADRESSE=$connect->prepare("update logincan set ADRESSE=? where id_cl=?");
$SETADRESSE->execute(array($ADRESSE,$_SESSION["ID_C"]));
$SETTEL=$connect->prepare("update logincan set TEL=? where id_cl=?");
$SETTEL->execute(array($TEL,$_SESSION["ID_C"]));


    $FORMAT = [];
    $SKILLS = [];
    $EXPER = [];
    $PROJETS = [];
    $LANGS = [];
    $i = 0;
    $j = 0;
    $k = 0;
    $l = 0;
    $m = 0;
    $FIRST = $_POST["FORMATS"];
    $SECOND = $_POST["SKILLS"];
    $FIFTH = $_POST["LANGS"];

    $_SERVER["FORMATION"]=[];
    $_SERVER["SKILLS"]=[];
    $_SERVER["EXPERINCE"]=[];
    $_SERVER["PROJECTS"]=[];
    $_SERVER["LANGS"]=[];

    foreach ($FIRST as $TAB) {
        $FORMAT[$i] = htmlspecialchars($TAB);
        $_SERVER["FORMATION"][$i]= htmlspecialchars($TAB);
        $i++;
    }

    

    try {

        $content = $connect->prepare("insert into educt (id_c,INSTUT,date_OBT,FILIER,diplome) values (?,?,?,?,?)");

        for ($i = 0; $i < sizeof($FORMAT); $i = $i + 4) {

            $content->execute(array($_SESSION["ID_C"], $FORMAT[$i], $FORMAT[$i + 1], $FORMAT[$i + 2], $FORMAT[$i + 3]));
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
    foreach ($SECOND as $TAB) {
        $SKILLS[$j] = htmlspecialchars($TAB);
        $_SERVER["SKILLS"][$j]=htmlspecialchars($TAB);
        $j++;
    }

    try {
        //         $ID_ETUD = $connect->prepare("select  * from educt where id_c=? ");
        // $ID_ETUD->execute(array($_SESSION["ID_C"]));
        // $VAL=$ID_ETUD->fetchAll(PDO::FETCH_ASSOC);
        // $G=0;
        // $ID_ET=[];
        // foreach($VAL as $TABLE)
        // {
        //    if (is_array($TABLE))
        //   {
        //     $ID_ET[$G]=$TABLE["ID_ED"];
        //     $G++;
        //   }

        // }

        // echo $ID_ET[$G-1];



        $content = $connect->prepare("insert into skills (id_c,skills,level) values (?,?,?)");

        for ($i = 0; $i < sizeof($SKILLS); $i = $i + 2) {

            $content->execute(array($_SESSION["ID_C"], $SKILLS[$i], $SKILLS[$i + 1]));
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
    foreach ($FIFTH as $TAB) {
        $LANGS[$k] = htmlspecialchars($TAB);
        $_SERVER["LANGS"][$k]=htmlspecialchars($TAB);
        $k++;
    }

    try {

        $content = $connect->prepare("insert into languages (id_c,langs,level) values(?,?,?)");

        for ($i = 0; $i < sizeof($LANGS); $i = $i + 2) {

            $content->execute(array($_SESSION["ID_C"], $LANGS[$i], $LANGS[$i + 1]));
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
    if (isset($_POST["EXPS"])) {
        $THIRD = $_POST["EXPS"];

        foreach ($THIRD as $TAB) {
            $EXPER[$l] = htmlspecialchars($TAB);
            $_SERVER["EXPERINCE"][$l]=htmlspecialchars($TAB);
            $l++;
        }

        try {

            $content = $connect->prepare("insert into exprt (id_c,societe,period,POSTE) values(?,?,?,?)");

            for ($i = 0; $i < sizeof($EXPER); $i = $i + 3) {

                $content->execute(array($_SESSION["ID_C"], $EXPER[$i], $EXPER[$i + 1], $EXPER[$i + 2]));
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        };
    }
    if (isset($_POST["PROJETS"])) {

        $FOURTH = $_POST["PROJETS"];
        //PART OF GRABBING ID OF ID FORMATION
        $ID_ETUD = $connect->prepare("select  * from educt where id_c=? ");
        $ID_ETUD->execute(array($_SESSION["ID_C"]));
        $VAL = $ID_ETUD->fetchAll(PDO::FETCH_ASSOC);
        $G = 0;
        $ID_ET = [];
        foreach ($VAL as $TABLE) {
            if (is_array($TABLE)) {
                $ID_ET[$G] = $TABLE["ID_ED"];
                $G++;
            }
        }

        

        //PART OF GRABBING ID OF ID EXPERIANCE
        $ID_EXPR = $connect->prepare("select  * from exprt where id_c=? ");
        $ID_EXPR->execute(array($_SESSION["ID_C"]));
        $VAL1 = $ID_EXPR->fetchAll(PDO::FETCH_ASSOC);
        $G1 = 0;
        $ID_EX = [];
        foreach ($VAL1 as $TABLE) {
            if (is_array($TABLE)) {
                $ID_EX[$G1] = $TABLE["id_exp"];
                $G1++;
            }
        }

       


        foreach ($FOURTH as $TAB) {
            $PROJETS[$m] = htmlspecialchars($TAB);
            $_SERVER["PROJECTS"][$m]=htmlspecialchars($TAB);
            $m++;
        }
      
        $ID_ETV= $ID_ET[$G - 1] ?? null;
        $ID_EXV= $ID_EX[$G1 - 1] ?? null;
        // echo $ID_EXV ." THE NEXT VALUE ".$ID_ETV;

        try {

           

            $content = $connect->prepare("insert into projects (id_exp,project_name,project_desc,id_etud) values(?,?,?,?)");

            for ($i = 0; $i < sizeof($PROJETS); $i = $i + 2) {

                $content->execute(array($ID_EXV,$PROJETS[$i], $PROJETS[$i + 1],$ID_ETV));
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        };
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <style>
            h1{
                background-color: RED;
                position: absolute;
                top:50%;
                left: 50%;
                transform: translate(-50%,-50%);

            }
        </style>
        <h1>VALIDTY AL YOUR DATA ARE IN HERE</h1>
        <script>

setTimeout(()=>
{
location.href="./acceuil1-main/NEWCANDIDATE.php";
},3000);
        </script>

    </body>

    </html>


<?php } ?>