function verificationChamps(){
	if ($("#nom").val() != "" && $("#prenom").val() != "")
		return true;
	else
		return false;
}

$("#envoie").click(function(){
	if (verificationChamps()){
		if (confirm("Etes vous bien sur de vouloir valider ce choix et ainsi supprimer le praticien " + $("#prenom").val() + " " + $("#nom").val() + " de la base de donnees ainsi que tout ces affectations ?")){
			$.post("controleurs/c_gererPraticien.php", {"connexionAjax" : "", "action" : "suppressionPraticien", "nom" : $("#nom").val(), "prenom" : $("#prenom").val()}).done(function(){
				$("#informations").html("Le praticien " + $("#prenom").val() + " " + $("#nom").val() + " Ã  bien Ã©tÃ© supprimÃ© de la base de donnÃ©es");
			});
		}
	}
	else
		$("#informations").html("Vos champs ou un des deux est/sont vide(s)");
});
