<p><?php print("Gerez vos affectations (suppression et ajout)"); ?></p>
<p id="infosStatutAction"></p>
<table>
	<tr>
		<td>Praticien affecté</td>
		<td>Actions rapides</td>
	</tr>
	<tr id="operation_affectation">
		<p>Ajouter ou modifier une affectation à un praticien</p>
		<div>
		</div>
	</tr>
	<?php
		foreach ($affectations as $affectation){
			?>
				<tr>
					<td>
						<p><?php print($affectation["prenomPraticien"]." ".$affectation["nomPraticien"]); ?></p>
					</td>
					<td>
						<img src="images/modification.png" class="action_rapide" type="modification" alt="modifier cette affectation" nomPraticien="<?php print($affectation["nomPraticien"]); ?>" prenomPraticien="<?php print($affectation["prenomPraticien"]); ?>" />
					</td>
				</tr>
			<?php
		}
	?>
</table>
