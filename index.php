<?php
session_start();
if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailS"]))
    header("location:WITHDBCAN/index.php");

   

else { 
  
    ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="NORMALIZE.css">
        <link rel="icon" href="fantasy-flight-games.svg">

        <title>NEW PROJECTJS
        </title>
    </head>

    <body>
        <div class="settings" title="SETTINGS">

            <div class="SOUSCONTAINER">
                <i class="fa fa-gear" id="II"></i>
            </div>
            <div class="settings_container">
                SETTING OPTIONS
                <div class="options">
                    <h4>COLORS </h4>
                    <ul class="LIST">
                        <li data-color="red"></li>
                        <li data-color="blue"></li>
                        <li data-color="yellow"></li>
                        <li data-color="green"></li>
                        <li data-color="pink"></li>
                        <li data-color="black"></li>
                    </ul>
                    <!-- <button id="SPEC" style=" cursor: pointer;text-align: center; border-radius:20px;padding:10px;border:none;">RESET</button> -->
                </div>
                <div class="options">
                    <h4>RANDOM OPTIONS</h4>
                    <div class="RANDOM">
                        <span class="YEAS" data-text="YEAS">YES</span>
                        <span class="NO" data-text="NO">NO</span>
                    </div>
                </div>
                <!-- <button id="SPEC" style="position:absolute;bottom:0;cursor: pointer;;text-align: center;border-radius:20px;padding:10px;border:none;margin:10px;"><a href="decon.php" style="text-decoration:none;color:red">DISCONNECT</a></button> -->

            </div>
        </div>

        <div class="page" id="pager">

            <div class="container">
                <button class="btn"></button>
                <h2 class="LOGO"><i class="fa-brands fa-fantasy-flight-games icon"></i>HAMZA WEB</h2>
                <nav>
                    <ul>
                        <li> <a href="./acceuil1-main/condidat.php ">About</a></li>
                        <li><a href="./acceuil1-main/condidat.php ">Home</a> </li>
                        <li><a href="./acceuil1-main/condidat.php ">Service</a></li>
                        <li><a href="./acceuil1-main/condidat.php ">Contact</a></li>

                    </ul>
                </nav>
                <section class="articles">


                    <form action="VALIDITIY.php" method="post"  >

                        <div class="PERSON">
                            <label for="NOM">NOM</label>
                            <input type="text" readonly value="<?php echo $_SESSION["nom"] ?>" id="NOM">
                            <label for="PRENOM">PRENOM</label>
                            <input type="text" readonly value="<?php echo $_SESSION["prenom"] ?>" id="PRENOM">
                            <label for="email">email</label>
                            <input type="email" readonly value="<?php echo $_SESSION["emailS"] ?>" id="email" />
                            <label for="DOMAINE">DOMAIN</label>
                            <input type="text"  name="DOMAIN" id="DOMAINE" required placeholder="DOMAINE"/>
                            <label for="ADRESSE">ADRESSE</label>
                            <input type="text"  name="ADRESSE" id="ADRESSE" required placeholder="ADRESSE"/>
                            <label for="TEL">TEL</label>
                            <input type="text" name="TEL" minlength="10" maxlength="12" required id="TEL" placeholder="TEL NUMBER">
                            <!-- <label for="NOM" >NOM</label>
    <input type="text" readonly value="" id="NOM" >
    <label for="NOM">NOM</label>
    <input type="text" readonly value="" id="NOM" > -->
                        </div>
                        <div class="DYNAMIC">
                            <div class="PART1">
                            <h1>FORMATION</h1>
                                <div class="FORMAT">
                                    <input type="text" id="TASK1"  placeholder="INSTITUTION">
                                    <label for="TASK">GRADUATION_DATE</label>
                                    <input type="DATE"  id="TASK1"   placeholder="DATE" title="GRADUATION_DATE">
                                    <input type="text"  id="TASK1"  placeholder="FILLIER">
                                    <input type="text"  id="TASK1"  placeholder="DIPLOME">
                                    <button type="button" title="ADD FORMATIONS" class="FOR">+</button>

                                </div>
                                <div class="TAHT1">
                          
                                </div>

                            </div>
                            <div class="PART2">
                            <h1>COMPETENCES</h1>
                                <div class="FORMAT">
                                    
                                    <input type="text"  id="TASK2"  placeholder="SKILL">
                                    <input type="text"  id="TASK2"  placeholder="LEVEL">
                                
                                  
                                    <button type="button" class="SKILL" title="ADD COMPETENCES"  >+</button>

                                </div>
                                <div class="TAHT2">

                                </div>
                            </div>
                            <div class="PART3">
                            <h1>EXPRIENCES</h1>
                                <div class="FORMAT">
                                    
                                    <input type="text" id="TASK3" placeholder="SOCIETE">
                                    <input type="text"  id="TASK3" placeholder="PERIOD">
                                    <input type="text"  id="TASK3" placeholder="POSTE">
                                   
                                    <button type="button" class="EXPS" title="ADD EXPERIANCES" >+</button>


                                </div>
                                <div class="TAHT3">

                                </div>
                            </div>
                            <div class="PART4">
                            <h1>PROJETS</h1>
                                <div class="FORMAT">
                                   
                                    <input type="text"  id="TASK4" placeholder="PROJECT_NAME">
                                    <textarea style="margin-left: 5px; min-height:150px;min-width:300px;outline:none;border-raduis:20px; border:3px solid black; caret-color:red;max-width:400px"     id="TASK4" placeholder="DESCRIPTION"></textarea>
                                    
                                    
                                    <button type="button" class="PROJET" title="ADD PROJECTS" >+</button>

                                </div>
                                <div class="TAHT4">

                                </div>
                            </div>
                            <div class="PART5">
                            <h1>LANGUES</h1>
                                <div class="FORMAT">
                                    <input type="text"  id="TASK5"  placeholder="LANGUAGE">
                                    <input type="text" id="TASK5"  placeholder="LEVEL">

                                    <button type="button" class="LANG"  title="ADD LANGUAGES">+</button>

                                </div>
                                <div class="TAHT5">

                                </div>
                            </div>
                        </div>

<button class="END" style="margin-left:50%;border-radius:7px;padding:10px;background-color:BLUE;color:black;cursor:pointer" >SET THE CV</button>

                    </form>
                    <script src="INPUTS.js"></script>
                    <!-- <div class="IMPO"></div>
    <button>RESET</button>
    </div>  -->



                    <!-- <div class="skills">
                        <h3>SKILLS</h3>
                        <div class="skill-box">
                            <div class="skill-name">JAVASCRIPT</div>
                            <div class="skill-progress">
                                <span data-progress="89%"></span>
                            </div>
                        </div>
                        <div class="skill-box">
                            <div class="skill-name">HTML</div>
                            <div class="skill-progress" >
                                <span data-progress="60%"></span>
                            </div>
                        </div>
                        <div class="skill-box">
                            <div class="skill-name">CSS</div>
                            <div class="skill-progress" >
                                <span data-progress="50%"></span>
                            </div>
                        </div>
                        
                    </div> -->
                    <!-- <div class="POPUP" style="padding: 20px;">
                <div class="POPUP_box">
                    <img style="width: 100px; height:100px" src="images/Screenshot2024-01-22153054.png" alt="image one">
                    <img style="width: 100px; height:100px" src="images/pexels-pixabay-373543.jpg" alt="image two">
                </div>
                        </div> -->



                </section>
            </div>
        </div>
        <footer> Copyright &copy; All Rights Reserved</footer>
        <script src="backend.js"></script>
    </body>

    </html>
<?php } ?>