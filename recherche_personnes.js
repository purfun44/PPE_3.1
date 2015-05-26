$("#champ_recherche").keyup(function(){
	if ($(this).val() != ""){
		$("#affichage_chaine_recherche").html("Résultat(s) de recherche pour " + $(this).val());
		$.post("controleurs/c_gererPraticien.php", {"connexionAjax" : "", "action" : "lancementRecherche", "personneRecherchee" : $(this).val()}).done(function(datas){
			$("#resultats_recherche").html(datas);
			$(".afficher_visites").click(function(e){
				$.post("controleurs/c_gererPraticien.php", {"connexionAjax" : "", "action" : "afficheVisites", "nom" : $(this).attr("nom"), "prenom" : $(this).attr("prenom")}).done(function(datas){
					$("#visites").html(datas);
				});
			});
		});
	}
	else{
		$("#affichage_chaine_recherche").html("");
		$("#resultats_recherche").html("Entrez une recherche pour afficher les résultats");
	}
});
