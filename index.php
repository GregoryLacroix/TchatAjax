<?php
require 'include/init.php';
require 'include/header.php';
if(!empty($_POST) && isset($_POST["pseudo"]) && !empty($_POST["pseudo"])){
      $pseudo = $_POST["pseudo"];
      //$pseudo = mysql_escape_string($pseudo);

      $resultat = $bdd->prepare("SELECT * FROM connected WHERE pseudo LIKE :pseudo LIMIT 1");
      $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
      $resultat->execute();

      $data = $resultat->fetch(PDO::FETCH_ASSOC);

      if(empty($data)){ // resultat de la requte est vide
          $ip = $_SERVER["REMOTE_ADDR"]; // on stock l IP de l'internaute au pseudo qui disponible qui vient de se connecter
          
          $resultat = $bdd->prepare("INSERT INTO connected(pseudo,ip,date) VALUES (:pseudo, :ip,".time().")"); // on insert dans la BDD les informations de l'internaute connecté
          $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
          $resultat->bindValue(':ip', $ip, PDO::PARAM_INT);
          $resultat->execute();
          $idTchat = $bdd->lastInsertId(); // on récupère le dernier id du membre qui vient de se connecter avec un pseudo valide 
      }
      else{
            //on contrôle le même utlisateur essaye de se reconnecter (bug, plantage navigateur) si le temps de reconnection est inférieru à 1 minute
            if($data["ip"] == $_SERVER["REMOTE_ADDR"] && time()-$data["date"]<60 ){
                $idTchat = $data["id"]; // on stock l'id recupéré en BDD dans la session
            }
            elseif(time()-$data["date"]>60){ // sinon si le temps depasse d'une minute aprés la connexion, un autre internaute peux prendre le pseudo
                $idTchat =  $data["id"];// on sstock l'id recupéré en BDD dans la session
            }
            else{ // sinon lepseudo est déja utlisé
                $erreur = "<div class='col-md-4 offset-md-4 alert alert-danger text-center'>Ce pseudo est déja en cours d'utilisation</div>";
            }
      }
      if(!isset($erreur)){ // si l'id n'est pas définit dans la session on entre dans la condition et on stock les données dans la sessio  et on redirige vers la tchat 
          $_SESSION["pseudo"] = $_POST["pseudo"];
          $_SESSION["idTchat"] = $idTchat;
          header("location:" . URL . "tchat.php");
      }
}
?>

<h1 class="text-center mt-3">Mon TCHAT</h1><hr>
  <?php if(isset($erreur)){ echo $erreur; }?>
<form class="col-md-4 offset-md-4 text-center" method="post" action="index.php">
  <div class="form-group">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo">
  </div>
  <input type="submit" class="col-md-12 btn btn-dark mt-2" value="tchatter">
</form>

<?php 
require 'include/footer.php';