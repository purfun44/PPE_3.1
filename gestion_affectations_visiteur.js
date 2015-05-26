function envoieCommande(typeCommande, parametres, succes, fail){
	$.post("controleurs/c_gererPraticien.php", {"connexionAjax" : "", "modificationAffectations" : typeCommande, "parametres" : parametres}).done(function(datas){
		if (datas == "OK")
			$("#infosStatutAction").text(succes);
		else
			$("#infosStatutAction").text(fail);
	});
}

function appelleEnvoieCommande(champApplicationBouton, avertissement, typeCommande, parametres, succes, fail){
	if ($("#nouveauNomPraticien").val() != "" && $("#nouveauPrenomPraticien").val() != ""){
		$(champApplicationBouton).append("<button type=button id=envoieModification>Ajouter l'affectation</button>");
		$("#envoieModification").click(function(){
			if (confirm(avertissement))
				appelleEnvoieCommande(typeCommande, parametres, succes, fail);
		});
	}
	else{
		if ($(champApplicationBouton).last().is("button"))
			$(champApplicationBouton).remove($(champApplicationBouton).last());
	}
}

$("#ajout_affectation").mouseover(function(){
	$(this).last().html("<label for=nouveauNomPraticien>Nom du praticien : </label><input type=text id=nouveauNomPraticien /><label for=nouveauPrenomPraticien>Prénom du praticien : </label><input type=text id=nouveauPrenomPraticien />");
	$("#nouveauNomPraticien").keyup(function(){
		apelleEnvoieCommandePourAjout($("#ajout_affectation").last(), "Etes vous sur de vouloir ajouter ce praticien dans la liste de vos affectations ?", "ajout", $("#nouveauNomPraticien").val() + "|" + $("#nouveauPrenomPraticien").val(), "ajout de votre affectation réalisée avec succès", "impossible d'ajouter cette affectation à votre liste");
	});
	$("#nouveauPrenomPraticien").keyup(function(){
		apelleEnvoieCommandePourAjout($("#ajout_affectation").last(), "Etes vous sur de vouloir ajouter ce praticien dans la liste de vos affectations ?", "ajout", $("#nouveauNomPraticien").val() + "|" + $("#nouveauPrenomPraticien").val(), "ajout de votre affectation réalisée avec succès", "impossible d'ajouter cette affectation à votre liste");
	});
});

$("#ajout_affectation").mouseout(function(){
	$(this).last().html("");
});

$("#action_rapide").click(function(){
	$(this).parent().first().last().html("<label for=nouveauNomPraticien>Nom du praticien : </label><input type=text id=nouveauNomPraticien /><label for=nouveauPrenomPraticien>Prénom du praticien : </label><input type=text id=nouveauPrenomPraticien />");
	appelleEnvoieCommande()
});
