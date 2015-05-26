<div>
	<p id="nbVisiteursSusceptibles">Ce praticien possède <?php print(count($visiteursSusceptibles)) ?> visiteur(s) susceptible(s)</p>
	<div id="listeVisiteursSucsceptibles">
		<?php
			foreach ($visiteursSusceptibles as $visiteurSusceptible){
				?>
					<p><?php print($visiteurSusceptible["prenom"]." ".$visiteurSusceptible["nom"]); ?></p>
				<?php
			}
		?>
	</div>
</div>
