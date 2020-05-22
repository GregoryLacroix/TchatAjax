<?php
require_once 'include/init.php';
if(!isset($_SESSION['pseudo']) || empty($_SESSION['pseudo']))
{
		header("location:" . URL . "index.php");
}

require_once 'include/header.php';
?>
		<h1 class="text-center mt-3">Mon TCHAT, connectez en tant que <strong class="text-info"><?= strtoupper($_SESSION['pseudo']) ?></strong></h1><hr>

    <div id="connected">
	
    </div><hr>
    
    <div id="tchat">
	 	<?php
		$resultat = $bdd->query("SELECT * FROM messages ORDER BY date DESC LIMIT 15");
		while($data = $resultat->fetch(PDO::FETCH_ASSOC)):
		?>

			<p><span class="text-info"><?php echo $data["pseudo"]; ?></span>, le <?= date("d/m/Y à H:i:s",$data["date"]); ?> : <?= htmlentities($data["message"]); ?></p>

		<?php
		endwhile;
	 	?>
    </div>
  </div>
  
  <!--<div id="tchatForm">
       <form method="post" action="#">
	  <div style="margin-right:110px;">
	      <textarea name="message" style="width:100%;"></textarea>
	  </div>
	  <div style="position:absolute; top:12px; right:0;">
	      <input type="submit" value="Envoyer"/>
	  </div>
	</form>-->

	<div id="tchatForm">    
    <form method="post" action="#" class="col-md-10 offset-md-1">
        <div class="form-group">
            <label for="message">Poster votre message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <input type="submit" id="submit" class="btn btn-dark" value="envoyer">
        <!--<div class="text-center loader"></div>--><div class="clear"></div>
    </form>
</div>  

<?php
require_once 'include/footer.php';