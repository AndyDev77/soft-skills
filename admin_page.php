<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

$query = "SELECT * FROM user_form WHERE user_type = 'user'";
$req = $conn->prepare($query);
$req->execute();

$resultSet = $req->get_result();
$data = $resultSet->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/admin.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" />

</head>
<body>
   
   <nav>
      <div class="logo">Bonjour, <?php echo $_SESSION['admin_name'] ?></div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="#">Accueil</a></li>
        <li><a href="logout.php">Déconexion</a></li>
      </ul>
    </nav>

   <br><br><br><br>
   <section>
   <br><br><br><br>
      <h2> Liste des utilisateurs</h2>
      <br>
      <div class="tab-container">
      
         <br>

         <table>
               <thead>

                  <tr>
                     <th>Id</th>
                     <th>Nom/Prénom</th>
                     <th>Email</th>
                     <th>Téléphone</th>
                     <th>Profil</th>
                  </tr>

               </thead>
               <tbody>

                  <?php
                  
                  foreach($data as $rm){
                  
                  ?>

                     <tr>
                        <td><?php echo '<p class="status status-leadership">'. $rm['id']; ?></td>
                        <td>
                           <?php 
                              if($rm['user_type'] == 'user'){
                                 echo '<p class="status status-intrapersonnelles">'. $rm['name'].'</p>';
                              }
                           ?>                  
                              
                        </td>
                        <td><?php echo '<p class="status status-reflexion">'. $rm['email']; ?></td>
                        <td><?php echo '<p class="status status-interpersonnelles">'. $rm['phone']; ?></td>
                        <td>
                           <a href="voir-profil.php?id=<?= $rm['id'] ?>" class="btn-admin" name="btn-admin">Voir les softs-skills</a>
                        </td>
                     </tr>

                  <?php
                  
                  }
                  
                  ?> 

               </tbody>
         </table>
      </div>
   </section>
</body>
</html>