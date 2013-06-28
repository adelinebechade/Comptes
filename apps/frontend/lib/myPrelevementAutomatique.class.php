<?php

class myPrelevementAutomatique
{
	/**
	 * 
	 * Ajouter les prochains prélèvements automatiques du compte
	 * 
	 * @param $integer
	 */
	public function ajoutPrelevementAutomatique($compte_id)
	{
	   	//Parcourir les prélevements automatiques du compte
		$mouvement_automatique = Doctrine_Core::getTable('MouvementAutomatique')->find($compte_id);

		//var_dump($mouvement_automatique);exit();
		if($mouvement_automatique != FALSE)
		{

			if($mouvement_automatique->getMouvementAutomatiqueCompte())
			{
				foreach ($mouvement_automatique->getMouvementAutomatiqueCompte() as $mvt_auto)
				{
					//Si le mouvement automatique est actif			
					if ($mvt_auto->getActif() == true)
					{
						$mouvement = new Mouvement();
						
						//Si on est à moins de 10 jours du mois suivant, on ajoute les prochains prelevements automatiques
						if(date('t',mktime(0, 0, 0, date('m'), 1, date('Y'))) - date('d') <= 9)
						{
							
							//Si on est au mois de décembre on prend le mois de janvier sinon m+1
							if(date('m') == 12)
							{
								$mois_suivant = "01";
							}
							else 
							{
								$mois_suivant = date('m')+1;
							}

							//Si le mouvement automatique n'est pas ajouté au compte pour le mois suivant, on l'ajoute
							if ($mouvement->getMouvementCompte($mvt_auto->getCompteId(), $mvt_auto->getLibelle(), $mvt_auto->getNumeroJour(), $mvt_auto->getDebit(), $mois_suivant, TRUE) == FALSE)
							{
								$mouvement->setCompteId($mvt_auto->getCompteId());
								$mouvement->setTraite(0);
								$mouvement->setLibelle($mvt_auto->getLibelle());
								//Si on est au mois de décembre on prend l'année suivante et le mois de janvier pour la date du prélevement auto
								if(date('m') == 12)
								{
									$mouvement->setDate((date('Y')+1).'-'.('01').'-'.$mvt_auto->getNumeroJour());
								}
								else 
								{
									$mouvement->setDate(date('Y').'-'.(date('m')+1).'-'.$mvt_auto->getNumeroJour());
								}
								$mouvement->setCredit($mvt_auto->getCredit());
								$mouvement->setDebit($mvt_auto->getDebit());
				
								$mouvement->save();
							}
						}
						else
						{
							//Si le mouvement automatique n'est pas ajouté au compte pour le mois en cours, on l'ajoute
							if ($mouvement->getMouvementCompte($mvt_auto->getCompteId(), $mvt_auto->getLibelle(), $mvt_auto->getNumeroJour(), $mvt_auto->getDebit(), date('m'), FALSE) == FALSE)
							{
								$mouvement->setCompteId($mvt_auto->getCompteId());
								$mouvement->setTraite(0);
								$mouvement->setLibelle($mvt_auto->getLibelle());
								$mouvement->setDate(date('Y').'-'.date('m').'-'.$mvt_auto->getNumeroJour());
								$mouvement->setCredit($mvt_auto->getCredit());
								$mouvement->setDebit($mvt_auto->getDebit());
				
								$mouvement->save();
							}
						
						}
						
					}
				}
			}
		}
	}
}