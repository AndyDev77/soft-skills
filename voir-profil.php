<?php

session_start();

@include 'config.php';

$utilisateur_id = (int) trim($_GET['id']);

// echo $utilisateur_id;exit;

if(empty($utilisateur_id)){
    header('Location: admin_page.php');
    exit;
}

/*Données Personnelles*/
$req = $conn->prepare("SELECT * FROM user_form WHERE user_form.id = ? ");
$req->execute(array($utilisateur_id));

$resultSet = $req->get_result();
$voir_utilisateur = $resultSet->fetch_assoc();

if(!isset($voir_utilisateur['id'])){
    header('Location: admin_page.php');
    exit;
}

/*Données de la roue */
$req = $conn->prepare("SELECT * FROM roue WHERE roue.id = ? ");
$req->execute(array($utilisateur_id));

$resultSet = $req->get_result();
$voir_roue = $resultSet->fetch_assoc();

if(!isset($voir_roue['id'])){
    echo "<script>alert(\"l'utilisateur n'a pas rempli le formulaire de softs-skills\")</script>";
    exit;
}

/*Données tableau de la roue*/

//Apprentisage 

$req = $conn->prepare("SELECT * FROM apprentissage WHERE apprentissage.id = ? ");
$req->execute(array($utilisateur_id));

$resultSet = $req->get_result();
$voir_apprentissage = $resultSet->fetch_assoc();

if(!isset($voir_apprentissage['id'])){
    echo "<script>alert(\"l'utilisateur n'a pas rempli le formulaire de softs-skills\")</script>";
    exit;
}

// Compétences intrapersonnelles

$req = $conn->prepare("SELECT * FROM intrapersonnelles WHERE intrapersonnelles.id = ? ");
$req->execute(array($utilisateur_id));

$resultSet = $req->get_result();
$voir_intrapersonnelles = $resultSet->fetch_assoc();

if(!isset($voir_intrapersonnelles['id'])){
    echo "<script>alert(\"l'utilisateur n'a pas rempli le formulaire de softs-skills\")</script>";
    exit;

}

// Réfléxion et imagination

$req = $conn->prepare("SELECT * FROM reflexion WHERE reflexion.id = ? ");
$req->execute(array($utilisateur_id));

$resultSet = $req->get_result();
$voir_reflexion = $resultSet->fetch_assoc();

if(!isset($voir_reflexion['id'])){
    echo "<script>alert(\"l'utilisateur n'a pas rempli le formulaire de softs-skills\")</script>";
    exit;
}

// Communication

$req = $conn->prepare("SELECT * FROM communication WHERE communication.id = ? ");
$req->execute(array($utilisateur_id));

$resultSet = $req->get_result();
$voir_communication = $resultSet->fetch_assoc();

if(!isset($voir_communication['id'])){
    header('Location: admin_page.php');
    echo "<script>alert(\"l'utilisateur n'a pas rempli le formulaire de softs-skills\")</script>";
    exit;
}

// Compétences interpersonnelles

$req = $conn->prepare("SELECT * FROM interpersonnelles WHERE interpersonnelles.id = ? ");
$req->execute(array($utilisateur_id));

$resultSet = $req->get_result();
$voir_interpersonnelles = $resultSet->fetch_assoc();

if(!isset($voir_interpersonnelles['id'])){
    header('Location: admin_page.php');
    echo "<script>alert(\"l'utilisateur n'a pas rempli le formulaire de softs-skills\")</script>";
    exit;
}


// Leadership

$req = $conn->prepare("SELECT * FROM leadership WHERE leadership.id = ? ");
$req->execute(array($utilisateur_id));

$resultSet = $req->get_result();
$voir_leadership = $resultSet->fetch_assoc();

if(!isset($voir_leadership['id'])){
    header('Location: admin_page.php');
    echo "<script>alert(\"l'utilisateur n'a pas rempli le formulaire de softs-skills\")</script>";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/roues.css">
    <title>Profil de <?= $voir_utilisateur['name']; ?></title>
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!-- Demo styles -->
   <style>
      
      .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }


   </style>
</head>
<body>
    <nav>
        <div class="logo">Profil de <?= $voir_utilisateur['name']; ?></div>
    </nav>
    <section class="data-user section-padding">
    
            <div class="container">
                <div class="card" style="width: 40rem;">

                    <div class="card-body">
                        <h2 class="card-title">Informations personnelles</h2>
                        <br>
                        <div class="card-text">
                            <h6>Nom et Prénom: <?= $voir_utilisateur['name']; ?></h6>
                            <h6>Email: <?= $voir_utilisateur['email']; ?></h6>
                            <h6>Téléphone: <?= $voir_utilisateur['phone']; ?></h6>
                        </div>
                    </div>
                </div>
                <br><br><br>
                
            </div>
      
        <div class="container">
                    <div class="card" style="width: 40rem;">
                        <div class="card-container">
                            <div class="chart-container">
                                <h2>Roue des compétences</h2>
                                <br>
                                <canvas id="barCanvas" aria-label="chart" role="img"></canvas>
                            </div>

                            <p id="apprentissage" style="display: none;"><?php echo $voir_roue['apprentissage']; ?></p>

                            <p id="intrapersonnelles" style="display: none;"><?php echo $voir_roue['competenceIntra']; ?></p>

                            <p id="reflexion" style="display: none;"><?php echo $voir_roue['reflexion']; ?></p>

                            <p id="communication" style="display: none;"><?php echo $voir_roue['communication']; ?></p>

                            <p id="interpersonnelles" style="display: none;"><?php echo $voir_roue['competenceInter'];  ?></p>

                            <p id="leadership" style="display: none;"><?php echo $voir_roue['leadership']; ?></p>
                        </div>
                    </div>
                    <div class="card" style="width: 40rem;">
                        <div class="swiper-body">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <!-- Apprentissage -->
                                    <div class="swiper-slide">
                                        <div class="card-container">
                                            <div class="chart-container">
                                                <h2>Apprentissages</h2>
                                                <br>
                                                <canvas id="barCanvasApp" aria-label="chart" role="img"></canvas>
                                            </div>
                                            <p id="volonte" style="display: none;"><?= $voir_apprentissage['Volonte']; ?></p>
                                            <p id="apprendre" style="display: none;"><?= $voir_apprentissage['Apprendre'];  ?></p>
                                            <p id="evaluation" style="display: none;"><?= $voir_apprentissage['evaluation']; ?></p>
                                            <p id="controle" style="display: none;"><?= $voir_apprentissage['Controle']; ?></p>
                                            <p id="auto" style="display: none;"><?= $voir_apprentissage['Autonomie']; ?></p>
                                            <p id="esprit" style="display: none;"><?= $voir_apprentissage['Esprit']; ?></p>
                                            <p id="curiosite" style="display: none;"><?= $voir_apprentissage['Curiosite']; ?></p>
                                            <p id="methodologie" style="display: none;"><?= $voir_apprentissage['Methodologie']; ?></p>
                                        </div>
                                    </div>


                                    <!-- Compétences intrapersonnelles -->
                                    <div class="swiper-slide">
                                        <div class="card-container">
                                            <div class="chart-container">
                                                <h2>Compétences intrapersonnelles</h2>
                                                <br>
                                                <canvas id="barCanvasIntra" aria-label="chart" role="img"></canvas>
                                            </div>
                                            <p id="positive" style="display: none;"><?= $voir_intrapersonnelles['positive']; ?></p>
                                            <p id="ethique" style="display: none;"><?= $voir_intrapersonnelles['ethique']; ?></p>
                                            <p id="temps" style="display: none;"><?= $voir_intrapersonnelles['temps']; ?></p>
                                            <p id="pression" style="display: none;"><?= $voir_intrapersonnelles['pression']; ?></p>
                                            <p id="stress" style="display: none;"><?= $voir_intrapersonnelles['stress']; ?></p>
                                            <p id="presence" style="display: none;"><?= $voir_intrapersonnelles['presence']; ?></p>
                                            <p id="motivation" style="display: none;"><?= $voir_intrapersonnelles['motivation']; ?></p>
                                            <p id="confiance" style="display: none;"><?= $voir_intrapersonnelles['faire_confiance']; ?></p>
                                            <p id="soi" style="display: none;"><?= $voir_intrapersonnelles['confiance_soi']; ?></p>
                                            <p id="resilience" style="display: none;"><?= $voir_intrapersonnelles['resilience']; ?></p>
                                        </div>
                                    </div>

                                    <!-- Réfléxion et imagination -->
                                    <div class="swiper-slide">
                                        <div class="card-container">
                                            <div class="chart-container">
                                                <h2>Réfléxion et imagination</h2>
                                                <br>
                                                <canvas id="barCanvasRef" aria-label="chart" role="img"></canvas>
                                            </div>
                                            <p id="resolution" style="display: none;"><?= $voir_reflexion['resolution']; ?></p>
                                        
                                            <p id="analytique" style="display: none;"><?= $voir_reflexion['analytique']; ?></p>
                                        
                                            <p id="critique" style="display: none;"><?= $voir_reflexion['critique']; ?></p>
                                        
                                            <p id="creativite" style="display: none;"><?= $voir_reflexion['creativite']; ?></p>
                                        
                                            <p id="ouverture" style="display: none;"><?= $voir_reflexion['ouverture']; ?></p>
                                        
                                            <p id="intuition" style="display: none;"><?= $voir_reflexion['intuition']; ?></p>
                                        
                                        </div>
                                    </div>

                                    <!-- Communication -->
                                    <div class="swiper-slide">
                                        <div class="card-container">
                                            <div class="chart-container">
                                                <h2>Communication</h2>
                                                <br>
                                                <canvas id="barCanvasCom" aria-label="chart" role="img"></canvas>
                                            </div>
                                            <p id="orale" style="display: none;"><?= $voir_communication['orale']; ?></p>
                                            <p id="ecrite" style="display: none;"><?= $voir_communication['ecrite']; ?></p>
                                            <p id="nonverbale" style="display: none;"><?= $voir_communication['nonverbale']; ?></p>
                                            <p id="active" style="display: none;"><?= $voir_communication['active']; ?></p>
                                        
                                            
                                        
                                        </div>
                                    </div>

                                    <!-- Compétences intrapersonnelles -->
                                    <div class="swiper-slide">
                                        <div class="card-container">
                                            <div class="chart-container">
                                                <h2>Compétences interpersonnelles</h2>
                                                <br>
                                                <canvas id="barCanvasInter" aria-label="chart" role="img"></canvas>
                                            </div>
                                            <p id="travailequipe" style="display: none;"><?= $voir_interpersonnelles['travailequipe']; ?></p>
                                            <p id="collectif" style="display: none;"><?= $voir_interpersonnelles['collectif']; ?></p>
                                            <p id="coordination" style="display: none;"><?= $voir_interpersonnelles['coordination']; ?></p>
                                            <p id="conflit" style="display: none;"><?= $voir_interpersonnelles['conflit']; ?></p>
                                            <p id="fiabilite" style="display: none;"><?= $voir_interpersonnelles['fiabilite']; ?></p>
                                            <p id="flexibilite" style="display: none;"><?= $voir_interpersonnelles['flexibilite']; ?></p>
                                            <p id="respect" style="display: none;"><?= $voir_interpersonnelles['respect']; ?></p>
                                            <p id="assertivite" style="display: none;"><?= $voir_interpersonnelles['assertivite']; ?></p>
                                            <p id="feedback" style="display: none;"><?= $voir_interpersonnelles['feedback']; ?></p>
                                            <p id="politesse" style="display: none;"><?= $voir_interpersonnelles['politesse']; ?></p>
                                        
                                            
                                        </div>
                                    </div>

                                    <!-- Leadership -->
                                    <div class="swiper-slide">
                                        <div class="card-container">
                                            <div class="chart-container">
                                                <h2>Leadership</h2>
                                                <br>
                                                <canvas id="barCanvasLead" aria-label="chart" role="img"></canvas>
                                            </div>
                                            <p id="responsabilite" style="display: none;"><?= $voir_leadership['responsabilite']; ?></p>
                                            <p id="incertitude" style="display: none;"><?= $voir_leadership['incertitude']; ?></p>
                                            <p id="vision" style="display: none;"><?= $voir_leadership['vision']; ?></p>
                                            <p id="strategique" style="display: none;"><?= $voir_leadership['strategique']; ?></p>
                                            <p id="decision" style="display: none;"><?= $voir_leadership['decision']; ?></p>
                                            <p id="integrite" style="display: none;"><?= $voir_leadership['integrite']; ?></p>
                                            <p id="audace" style="display: none;"><?= $voir_leadership['audace']; ?></p>
                                            <p id="negociation" style="display: none;"><?= $voir_leadership['negociation']; ?></p>
                                            <p id="emotionnelle" style="display: none;"><?= $voir_leadership['emotionnelle']; ?></p>
                                            <p id="professionnalisme" style="display: none;"><?= $voir_leadership['professionnalisme']; ?></p>
                                        
                                            
                                        </div>
                                    </div>



                                </div>
                                <div class="swiper-pagination"></div> 
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>      
                            </div>
                                

                                        
                        </div>
                    </div>
                        


                    
                    <!-- <div class="swiper-body">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                               
                                 <br>
                                 <div class="swiper-slide">
                                   
                               
                                 
                                 </div>

                            </div>
                            <div class="swiper-pagination"></div> 
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div> -->
                </div>
    </section>


    <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script src="js/roue.js"></script>
<script src="js/apprenti.js"></script>
<script src="js/intra.js"></script>
<script src="js/ref.js"></script>
<script src="js/communication.js"></script>
<script src="js/inter.js"></script>
<script src="js/lead.js"></script>
</body>
</html>