<?php
require_once "include/init.php";
$d =array();

//echo '<pre>'; print_r($_SESSION); echo '</pre>';

if(!isset($_SESSION["pseudo"]) || empty($_SESSION["pseudo"]) || !isset($_POST["action"])){
        $d["erreur"] = "Vous devez être connecté pour utiliser le tchat";
}
else{
    
    extract($_POST);
    $pseudo = $_SESSION["pseudo"];
    /**
     * Action : addMessage
     * Permet l'ajout d'un message
     * */
    if($_POST["action"]=="addMessage"){

        $resultat = $bdd->prepare("INSERT INTO messages(pseudo,message,date) VALUES (:pseudo,:message,".time().")");
        $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $resultat->bindValue(':message', $message, PDO::PARAM_STR);
        $resultat->execute();
        $d["erreur"] ="ok";
    }
    
    
    /**
     * Action : getMessages
     * Permet l'affichage des dernier messages
     * */
    if($_POST["action"]=="getMessages"){
        $lastid = floor($lastid);
        
        $resultat = $bdd->query("SELECT * FROM messages WHERE id < $lastid ORDER BY date DESC");
        $d["result"] = "";
        $d["lastid"] = $lastid; // on stock le dernier id message posté dans l'indice du tableau ARRAY
        while($data = $resultat->fetch(PDO::FETCH_ASSOC)){
             $d["result"] .= '<p><span class="text-info">'.$data["pseudo"].',</span> le '.date("d/m/Y à H:i:s",$data["date"]).' : '.htmlentities($data["message"]).'</p>';
             $d["lastid"] = $data["id"]; // pour chaque tour de boucle on stock le dernier id message dans le tableau de données pour le retour de requete AJAX
        }
        $d["erreur"]="ok";
    }
    
    
    /**
     * Action : getConnected
     * Permet l'affichage des derniers connectés
     **/
    if($_POST["action"]=="getConnected"){
        $now = time();

        $resultat = $bdd->query("SELECT pseudo FROM connected WHERE $now-date<60");
        $d["result"] = "Connectés : ";
        while($data = $resultat->fetch(PDO::FETCH_ASSOC)){
            $d["result"] .= "<span class='text-info'>$data[pseudo]</span>, ";
        }
        $d["result"]  = substr($d["result"],0,-2); // permet de supprimer la dernière virgule
        
        $resultat = $bdd->exec("UPDATE connected SET date = $now WHERE id={$_SESSION["idTchat"]}"); // on actualise le temps de connexion de cahque membre connectés    
        
        $d["erreur"] = "ok";
    }
}

echo json_encode($d);
?>