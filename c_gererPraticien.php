<?php
	if (isset($_POST["connexionAjax"])){
		session_start();
		require_once("../include/class.pdogsb.inc.php");
	}
	else{
		if ($_SESSION["responsable"] == "non")
			require_once("vues/v_sommaire.php");
		else
			require_once("vues/v_responsable.php");
	}
	if (isset($_REQUEST["action"])){
		switch ($_REQUEST["action"]){
			case "recherchePersonnes":
				require_once("vues/v_recherche.php");
				?>
					<script type="text/javascript" src="recherche_personnes.js"></script>
				<?php
			break;
			case "lancementRecherche":
				if (isset($_POST["personneRecherchee"]) && !empty($_POST["personneRecherchee"])){
					$pdoGsb = PdoGsb::getPdogsb();
					$personneRecherchees = $pdoGsb->recherchePersonne($_POST["personneRecherchee"]);
					foreach ($personneRecherchees as $personneRecherchee){
						require("../vues/v_personne_recherchee.php");
					}
				}
			break;
			case "afficheVisites":
				if (isset($_POST["nom"]) && isset($_POST["prenom"])){
					$pdoGsb = PdoGsb::getPdogsb();
					$visites = $pdoGsb->retourneVisites($_POST["nom"], $_POST["prenom"]);
					$nbVisites = count($visites) > 0 ? count($visites)." visite(s) affectée(s) à cette personne" : "Pas de visites affectées à cette personne";
						require_once("../vues/v_visites.php");
					if ($_SESSION["responsable"] == "non"){
						$visiteursSusceptibles = $pdoGsb->donneVisiteursPossibles($_POST["nom"], $_POST["prenom"]);
						require_once("../vues/v_visiteurs_susceptibles.php");
					}
				}
			break;
			case "modificationAffectations":
				$options = $_SESSION["responsable"] == "non" ? array(array("ajout", "Ajouter une affectation"), array("modification", "modifier une affectation"), array("voirVisites", "voir les visites d'un praticien")) : array(array("ajout", "Ajouter une affectation"), array("modification", "modifier une affectation"), array("suppression", "Supprimer une affectation"));
				$affectations = $pdo->donneAffectations($_SESSION["responsable"], $_SESSION["idVisiteur"]);
				if ($_SESSION["responsable"] == "non"){
					require_once("vues/v_gerer_affectations_visiteur.php");
					?>
						<script type="text/javascript" src="gestion_affectations_visiteur.js"></script>
					<?php
				}
				else{
					require_once("vues/v_gerer_affectations_responsable.php");
					?>
						<script type="text/javascript" src="gestion_affectations_responsable.js"></script>
					<?php
				}
			break;
			case "modificationPraticiens":
				require_once("vues/v_suppression_praticiens.php");
				?>
					<script type="text/javascript" src="suppression_praticiens.js"></script>
				<?php
			break;
			case "suppressionPraticien":
				$pdoGsb = PdoGsb::getPdoGsb();
				$pdoGsb->supprimePraticien($_POST["nom"], $_POST["prenom"]);
			break;
			default:
				require_once("vues/v_erreur_404.php");
			break;
		}
	}
?>
