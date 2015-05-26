<div>
	<p id="nbVisites"><?php print($nbVisites); ?></p>
	<div id="listeVisites">
		<?php
			foreach ($visites as $visite){
				?>
					<div class="visite">
						<p>Visite faite par <?php print($visite["prenom"]." ".$visite["nom"]); ?>
						<p><span class="libelle">Date : </span><span class="dateVisite"><?php print($visite["dateVisite"]); ?></span></p>
						<p><span class="libelle">Commentaire : </span><?php print($visite["commentaire"]); ?></p>
					</div>
				<?php
			}
		?>
	</div>
</div>
