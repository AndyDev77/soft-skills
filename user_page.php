<?php

    @include 'config.php';

    session_start();

    

    if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
    }

    $acquis = 100;
    $cours = 70;
    $compliquer = 40;
    $aide = 20; 
    $bar = "bar";
    $apprenti = "Apprentissage";
    $comp = "Compétences intrapersonnelles";
    $ref =  "Réfléxion et imagination";
    $com =  "Communication";
    $comp2 = "Compétences interpersonnelles";
    $lead =  "Leadership";

    

    // $image = "https://quickchart.io/chart?c={type:'doughnut',data:{labels:['Apprentissage','Compétences intrapersonnelles','Réfléxion et imagination','Communication','Compétences interpersonnelles','Leadership'],datasets:[{data:[$resultA,$resultIntra,$resultR,$moyenneC,$moyenneInter,$moyenneL],backgroundColor:['rgb(252, 66, 123)','rgb(52, 152, 219)','rgb(155, 89, 182)','rgb(254, 202, 87)','rgb(240, 147, 43)','rgb(106, 176, 76)'],color:['rgb(236, 240, 241)']}]},options:{plugins:{doughnutlabel:{labels:[{text:' soft-skills',font:{size:13}}]}}}}";

    // Calcul de la moyenne des softs skills
     
    if (isset($_POST['apprentissage'] )) {
        $moyenneA = array_sum($_POST['apprentissage'])/count($_POST['apprentissage']);
        $resultA = (int)$moyenneA ;
        //var_dump($_POST['apprentissage']);
        
    }

    if (isset($_POST['intrapersonnelles'] )){
       $moyenneIntra = array_sum($_POST['intrapersonnelles'])/count($_POST['intrapersonnelles']);
       $resultIntra = (int)$moyenneIntra;
       //var_dump($resultIntra);
         //var_dump($_POST['intrapersonnelles']);
       
    }

    if  (isset($_POST['reflexion'] )){
       $moyenneR = array_sum($_POST['reflexion'])/count($_POST['reflexion']);
       $resultR = (int)$moyenneR;
      //var_dump($_POST['reflexion']);
    }


    if  (isset($_POST['communication'] )){
       $moyenneC = array_sum($_POST['communication'])/count($_POST['communication']);
       $resultC = (int)$moyenneC;
       //var_dump($_POST['communication']);
      
    }

    if  (isset($_POST['interpersonnelles'] )){
       $moyenneInter = array_sum($_POST['interpersonnelles'])/count($_POST['interpersonnelles']);
       $resultInter = (int)$moyenneInter;
      //  $resultInter = (int)$moyenneInter . " %";
      // var_dump($_POST['interpersonnelles']);
       
 
    }

    if  (isset($_POST['leadership'] )){
       $moyenneL = array_sum($_POST['leadership'])/count($_POST['leadership']);
       $resultL = (int)$moyenneL; 
       //var_dump($_POST['leadership'] );
    }

    if(isset($_POST['valider-form'])){
        $name_user = $_SESSION['user_name'];

        $select = " SELECT * FROM roue";

        $result = mysqli_query($conn, $select);

        $insert = "INSERT INTO roue(name_user, apprentissage, competenceIntra, reflexion, communication, competenceInter,leadership,id) VALUES('$name_user','$resultA',' $resultIntra','$resultR','$resultC',' $resultInter','$resultL',3)";
        mysqli_query($conn, $insert);
        header('location:roue.php');
        
        // Apprentissage
        
        $volonte = $_POST['apprentissage'][0];
        $apprendre = $_POST['apprentissage'][1];
        $evaluation = $_POST['apprentissage'][2];
        $controle = $_POST['apprentissage'][3];
        $autonomie = $_POST['apprentissage'][4];
        $esprit = $_POST['apprentissage'][5];
        $curiosite = $_POST['apprentissage'][6];
        $methodologie = $_POST['apprentissage'][7];

        $selectApp = "SELECT * FROM apprentissage ";
        $resultApp = mysqli_query($conn, $selectApp);

        $insertApp = "INSERT INTO apprentissage(name_user, Volonte, Apprendre, evaluation, Controle, Autonomie, Esprit, Curiosite, Methodologie, id) VALUES('$name_user','$volonte',' $apprendre ','$evaluation','$controle',' $autonomie','$esprit','$curiosite','$methodologie',3)";

        mysqli_query($conn, $insertApp);
        header('location:roue.php');

        // Compétences intrapersonnelles

        $positive = $_POST['intrapersonnelles'][0];
        $ethique = $_POST['intrapersonnelles'][1];
        $temps = $_POST['intrapersonnelles'][2];
        $pression = $_POST['intrapersonnelles'][3];
        $stress = $_POST['intrapersonnelles'][4];
        $presence = $_POST['intrapersonnelles'][5];
        $motivation = $_POST['intrapersonnelles'][6];
        $faire_confiance = $_POST['intrapersonnelles'][7];
        $confiance_soi = $_POST['intrapersonnelles'][8];
        $resilience = $_POST['intrapersonnelles'][9];
        

        $selectIntra = "SELECT * FROM intrapersonnelles";
        $resultIntra = mysqli_query($conn, $selectIntra);

        $insertIntra = "INSERT INTO intrapersonnelles(name_user, positive, ethique, temps, pression, stress, presence, motivation, faire_confiance,confiance_soi, resilience, id) VALUES('$name_user',' $positive',' $ethique','$temps','$pression','$stress','$presence','$motivation','$faire_confiance','$confiance_soi','$resilience',3)";

        mysqli_query($conn, $insertIntra);
        header('location:roue.php');

        // Réflexion et Imagination
        
        $resolution = $_POST['reflexion'][0];
        $analytique = $_POST['reflexion'][1];
        $critique = $_POST['reflexion'][2];
        $creativite = $_POST['reflexion'][3];
        $ouverture = $_POST['reflexion'][4];
        $intuition = $_POST['reflexion'][5];
        

        $selectReflexion = "SELECT * FROM reflexion";
        $resultReflexion = mysqli_query($conn, $selectReflexion);

        $insertReflexion = "INSERT INTO reflexion(resolution, analytique, critique, creativite, ouverture, intuition, name_user, id) VALUES('$resolution','$analytique','  $critique ','$creativite',' $ouverture',' $intuition','$name_user',3)";

        mysqli_query($conn, $insertReflexion);
        header('location:roue.php');


        // Communication
        
        $orale = $_POST['communication'][0];
        $ecrite = $_POST['communication'][1];
        $nonverbale = $_POST['communication'][2];
        $active = $_POST['communication'][3];
       

        $selectComm = "SELECT * FROM communication";
        $resultComm = mysqli_query($conn, $selectComm);

        $insertComm = "INSERT INTO communication(orale, ecrite, nonverbale, active, name_user, id) VALUES('$orale','$ecrite',' $nonverbale ','$active','$name_user',3)";

        mysqli_query($conn, $insertComm);
        header('location:roue.php');

        // Compétences interpersonnelles

        $travailequipe = $_POST['interpersonnelles'][0];
        $collectif = $_POST['interpersonnelles'][1];
        $coordination = $_POST['interpersonnelles'][2];
        $conflit = $_POST['interpersonnelles'][3];
        $fiabilite = $_POST['interpersonnelles'][4];
        $flexibilite = $_POST['interpersonnelles'][5];
        $respect = $_POST['interpersonnelles'][6];
        $assertivite = $_POST['interpersonnelles'][7];
        $feedback = $_POST['interpersonnelles'][8];
        $politesse = $_POST['interpersonnelles'][9];
        

        $selectInter = "SELECT * FROM interpersonnelles";
        $resultInter = mysqli_query($conn, $selectInter);

        $insertInter = "INSERT INTO interpersonnelles(travailequipe, collectif, coordination, conflit, fiabilite, flexibilite, respect, assertivite, feedback,politesse, name_user, id) VALUES('$travailequipe',' $collectif',' $coordination','$conflit','$fiabilite','$flexibilite','$respect','$assertivite','$feedback','$politesse','$name_user',3)";

        mysqli_query($conn, $insertInter);
        header('location:roue.php');


        // Leadership

        $responsabilite = $_POST['leadership'][0];
        $incertitude = $_POST['leadership'][1];
        $vision = $_POST['leadership'][2];
        $strategique = $_POST['leadership'][3];
        $decision = $_POST['leadership'][4];
        $integrite = $_POST['leadership'][5];
        $audace = $_POST['leadership'][6];
        $negociation = $_POST['leadership'][7];
        $emotionnelle = $_POST['leadership'][8];
        $professionnalisme = $_POST['leadership'][9];
        

        $selectLead = "SELECT * FROM leadership";
        $resultLead = mysqli_query($conn, $selectLead);

        $insertLead = "INSERT INTO leadership(responsabilite, incertitude, vision, strategique, decision, integrite, audace, negociation, emotionnelle,professionnalisme , name_user, id) VALUES('$responsabilite',' $incertitude',' $vision','$strategique','$decision','$integrite','$audace','$negociation','$emotionnelle','$professionnalisme ','$name_user',3)";

        mysqli_query($conn, $insertLead);
        header('location:roue.php');
        
         
    }

    
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <!--------- <title>Responsive Navigation Menu</title>------>
    <link rel="stylesheet" href="./css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body onLoad="document.fo.login.focus()">
    <!--------- HEADER ------>
    <nav>
      <div class="logo">Bonjour, <?php echo $_SESSION['user_name'] ?></div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="#">Accueil</a></li>
        <li><a href="#">Tableau</a></li>
        <li><a href="logout.php">Déconexion</a></li>
      </ul>
    </nav>

    <!--------- Tableau ------>
    <div class="header-fixed-placeholder"></div>

    <section class="tab">
        <h2> Voici votre tableau des soft skills !</h2>

        <div class="tab-container">
        
            <form action="" method="POST">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Famille</th>
                            <th>Items</th>
                            <th>Taux</th>
                        </tr>
                    </thead>
                    <div class="tbl-content">
                        <tbody>
                            <tr>
                                <td class="status status-apprentissage" rowspan="8"> Apprentissage</td>
                                <td >Volonté d'apprendre
                                    <td class="label-check">
                                        <select id="app" name="apprentissage[]">
                                            <option value="<?php echo $acquis ?>">Acquis</option>
                                            <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                            <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                            <option value="<?php echo $aide  ?>">Besoin d'aide</option>

                                        </select>
                                    </td>
                                </td>
                            </tr>
                            <br>

                            <tr>
                                <td> Apprendre à apprendre </td>
                                <td class="label-check">
                                    <select id="app" name="apprentissage[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> Auto-évaluation</td>
                                <td class="label-check">
                                    <select id="app" name="apprentissage[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> Contrôle de qualité</td>
                                <td class="label-check">
                                    <select id="app" name="apprentissage[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> Autonomie</td>
                                <td class="label-check">
                                    <select id="app" name="apprentissage[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Esprit d'entreprendre</td>
                                <td class="label-check">
                                    <select id="app" name="apprentissage[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Curiosité</td>
                                <td class="label-check">
                                    <select id="app" name="apprentissage[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Compétence méthodologique</td>
                                <td class="label-check">
                                    <select id="app" name="apprentissage[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>


                            <br><br>

                                    <!-- Compétences intrapersonnelles -->
                            <tr>
                                <td class="status status-intrapersonnelles" rowspan="10"> Compétences intrapersonnelles</td>
                                <td >Attitude positive
                                <td class="label-check">
                                    <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                                </td>

                            </tr>

                            <tr>
                                <td>Éthique</td>
                                <td class="label-check">
                                <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> Gestion du temps</td>
                                <td class="label-check">
                                <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> Capacité à travailler sous pression</td>
                                <td class="label-check">
                                <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> Gestion du stress</td>
                                <td class="label-check">
                                <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Présence</td>
                                <td class="label-check">
                                <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Motivation intrinsèque</td>
                                <td class="label-check">
                                <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td >Faire confiance</td>
                                <td class="label-check">
                                <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td >Confiance en soi</td>
                                <td class="label-check">
                                <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Résilience</td>
                                <td class="label-check">
                                <select id="intra" name="intrapersonnelles[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                                        <!-- Réfléxion et imagination -->
                            <tr>
                                <td class="status status-reflexion" rowspan="6"> Réfléxion et imagination</td>
                                <td >Résolution de problème
                                <td class="label-check">
                                    <select id="ref" name="reflexion[]">
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                                </td>

                            </tr>
                            <tr>
                                <td > Compétence analytique</td>
                                <td class="label-check">
                                    <select id="ref" name="reflexion[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Esprit Critique</td>
                                <td class="label-check">
                                    <select id="ref" name="reflexion[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Créativité</td>
                                <td class="label-check">
                                    <select id="ref" name="reflexion[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Ouverture à la nouveauté</td>
                                <td class="label-check">
                                    <select id="ref" name="reflexion[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Intuition</td>
                                <td class="label-check">
                                    <select id="ref" name="reflexion[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <!-- Communication -->

                            <tr>
                                <td class="status status-communication" rowspan="4"> Communication</td>
                                <td >Communication orale
                                <td class="label-check">
                                    <select id="comm" name="communication[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                                </td>

                            </tr>

                            <tr>
                                <td > Communication écrite</td>
                                <td class="label-check">
                                    <select id="comm" name="communication[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td > Communication non verbale</td>
                                <td class="label-check">
                                    <select id="comm" name="communication[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td > Écoute active</td>
                                <td class="label-check">
                                    <select id="comm" name="communication[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <!-- Compétences interpersonnelles -->

                            <tr>
                                <td class="status status-interpersonnelles" rowspan="10"> Compétences interpersonnelles</td>
                                <td >Travail en équipe
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                                </td>

                            </tr>

                            <tr>
                                <td > Sens du collectif</td>
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td > Coordination</td>
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td > Gestion de conflit</td>
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td > Fiabilité</td>
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td > Flexibilité et adaptabilité</td>
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td > Respect</td>
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td > Assertivité</td>
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Acceptation du feedback</td>
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Politesse</td>
                                <td class="label-check">
                            <select id="inter" name="interpersonnelles[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>

                            <!-- Leadership -->

                            <tr>
                                <td class="status status-leadership" rowspan="10"> Leadership</td>
                                <td >Responsabilité
                                <td class="label-check">
                                    <div class="select">
                                        <select id="lead" name="leadership[]" >
                                            <option value="<?php echo $acquis ?>">Acquis</option>
                                            <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                            <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                            <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                        </select>
                                    </div>
                                </td>
                                </td>

                            </tr>
                            <tr>
                                <td > Capacité à faire face à l'incertitude</td>
                                <td class="label-check">
                            <select id="lead" name="leadership[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Vision, visualisation</td>
                                <td class="label-check">
                            <select id="lead" name="leadership[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Pensée stratégique</td>
                                <td class="label-check">
                            <select id="lead" name="leadership[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Jugement et prise de décision</td>
                                <td class="label-check">
                            <select id="lead" name="leadership[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Intégrité</td>
                                <td class="label-check">
                            <select id="lead" name="leadership[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Audace</td>
                                <td class="label-check">
                            <select id="lead" name="leadership[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Négociation</td>
                                <td class="label-check">
                            <select id="lead" name="leadership[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Intelligence émotionnelle</td>
                                <td class="label-check">
                            <select id="lead" name="leadership[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td > Professionnalisme</td>
                                <td class="label-check">
                            <select id="lead" name="leadership[]" >
                                        <option value="<?php echo $acquis ?>">Acquis</option>
                                        <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                        <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                        <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                </table>    
                    
                </div>
                <br><br>
                <button type="submit" id="bt-sub" class="btn" name="valider-form">Valider</button>
                
                
            </form>
        </div>
    </section>



    <script src="./js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        $(document).ready(function() {

            var showHeaderAt = 150;

            var win = $(window),
                body = $('body');

            // Show the fixed header only on larger screen devices

            if (win.width() > 400) {

                // When we scroll more than 150px down, we set the
                // "fixed" class on the body element.

                win.on('scroll', function(e) {

                    if (win.scrollTop() > showHeaderAt) {
                        body.addClass('fixed');
                    } else {
                        body.removeClass('fixed');
                    }
                });

            }

        });
    </script>

   

    
    <script>
        $("#bt-sub").click(function(){
            e.preventDefault();
            let apprentissage = $("#app").val();
            let intrapersonnelles = $("#intra").val();
            let reflexion = $("#ref").val();
            let communication = $("#comm").val();
            let interpersonnelles = $("inter").val();
            let leadership = $("#lead").val();

            if(apprentissage == '' || intrapersonnelles == '' || reflexion == '' || communication  == '' || interpersonnelles == '' || leadership == ''){
                swal({
                    title: "Oups!",
                    text: "L'email n'a pas bien été envoyé !!",
                    icon: "error",
                    button: "ok",
                });

            }
        });
    </script>

  </body>
</html>
