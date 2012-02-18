<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DateUtils {


	function datefr($timestamp,$modejour,$modemois,$modeheure){
		/****************************************************************************
		 *   Date Fr - Powered by Internet Galaxie  - http://iGalaxie.com           *
		 ****************************************************************************/
		
		/* Utilisation :
		    Fonction possède 4 paramètres :
		        - timestamp : date/heure (au format UNIX)
		        - modejour : l:long (lundi 23) ; c:court (lun 23) ; n:chiffre du jour (23) ; h:pas de jour
		          -> l ou c en majucule met la premier lettre du mot en maj (ex C : Lun)
		        - modemois : l:long (septembre) ; c:court (sept) ; n:chiffre (09) ; h:pas de mois
		          -> idem pour les maj
		        - heure       : l:long (7 heures 35) ; c:court (7h35) ; n:pas d'heure
		    Exemples :  echo datefr(325689845,C,L,n); retourne        Dim 27 Avril 1980
		                 echo datefr(325689845,n,c,n);                  27 avr 1980
		                 echo datefr(325689845,l,n,l);                dimanche 27/04/1980 7 heures 35
		                 echo datefr(325689845,h,h,l);                7 heures 35
		*/


    	if (!isset($timestamp)||!isset($modejour)||!isset($modemois)||!isset($modeheure))
    	{
    	    echo  "Fonction datefr() : Erreur, param&egrave;tres incorrects.";
    	    exit();
    	}
		
    	 /* On formate notre date */
    	$jour=date( "d",$timestamp);      // jour
    	$mois=date( "m",$timestamp);      // mois
    	$annee=date( "Y",$timestamp);      // annee
    	$num_jour=date( "w",$timestamp);     // numero du jour de la semaine
    	$hour=date( "H",$timestamp);         // heure
    	$minute=date( "i",$timestamp);     // minute
		
    	 /* Initialisation*/
    	$heure= '';
    	$aff_heure= ' heures ';
    	if ($hour==0 || $hour==1)
    	    $aff_heure= ' heure ';
		
    	 /* On definit numero du mois */
    	$zero  =  substr($mois,0,1);
    	if  ($zero  ==   "0")  {
    	        $num_mois  =  substr($mois,1,1);  // On supprime le premier zero
    	    }
    	    else { $num_mois = $mois ; }
		
    	 /* Nom long des jours */
    	$noml_jour[0]  =   "dimanche";
    	$noml_jour[1]  =   "lundi";
    	$noml_jour[2]  =   "mardi";
    	$noml_jour[3]  =   "mercredi";
    	$noml_jour[4]  =   "jeudi";
    	$noml_jour[5]  =   "vendredi";
    	$noml_jour[6]  =   "samedi";
    	 /* Nom court des jours */
    	$nomc_jour[0]  =   "dim";
    	$nomc_jour[1]  =   "lun";
    	$nomc_jour[2]  =   "mar";
    	$nomc_jour[3]  =   "mer";
    	$nomc_jour[4]  =   "jeu";
    	$nomc_jour[5]  =   "ven";
    	$nomc_jour[6]  =   "sam";
		
    	 /* Nom long des mois */
    	$noml_mois[1]    =   "janvier";
    	$noml_mois[2]    =   "f&eacute;vrier";
    	$noml_mois[3]    =   "mars";
    	$noml_mois[4]    =   "avril";
    	$noml_mois[5]    =   "mai";
    	$noml_mois[6]    =   "juin";
    	$noml_mois[7]    =   "juillet";
    	$noml_mois[8]    =   "ao&ucirc;t";
    	$noml_mois[9]    =   "septembre";
    	$noml_mois[10]   =   "octobre";
    	$noml_mois[11]   =   "novembre";
    	$noml_mois[12]   =   "d&eacute;cembre";
    	 /* Nom court des mois */
    	$nomc_mois[1]    =   "jan";
    	$nomc_mois[2]    =   "f&eacute;v";
    	$nomc_mois[3]    =   "mars";
    	$nomc_mois[4]    =   "avr";
    	$nomc_mois[5]    =   "mai";
    	$nomc_mois[6]    =   "juin";
    	$nomc_mois[7]    =   "juil";
    	$nomc_mois[8]    =   "ao&ucirc;t";
    	$nomc_mois[9]    =   "sept";
    	$nomc_mois[10]   =   "oct";
    	$nomc_mois[11]   =   "nov";
    	$nomc_mois[12]   =   "d&eacute;c";
		
    	 /* Affichage du jour */
    	switch ($modejour) {
    	    case  "l":
    	    $jour = $noml_jour[$num_jour]. ' '.$jour;                 // samedi 23
    	    break;
    	    case  "L":
    	    $jour = ucfirst($noml_jour[$num_jour]). ' '.$jour;         // Samedi 23
    	    break;
    	    case  "c":
    	    $jour = $nomc_jour[$num_jour]. ' '.$jour;                 // sam 23
    	    break;
    	    case  "C":
    	    $jour = ucfirst($nomc_jour[$num_jour]). ' '.$jour;         // Sam 23
    	    break;
    	    case  "h":
    	    $jour =  '';
    	    break;
    	}                                                             // default : 23
    	 /* Affichage du mois */
    	switch ($modemois) {
    	    case  "l":
    	    $mois =  ' '.$noml_mois[$num_mois]. ' '.$annee;              // janvier 1999
    	    break;
    	    case  "L":
    	    $mois =  ' '.ucfirst($noml_mois[$num_mois]). ' '.$annee;     // Janvier 1999
    	    break;
    	    case  "c":
    	    $mois =  ' '.$nomc_mois[$num_mois]. ' '.$annee;              // jan 1999
    	    break;
    	    case  "C":
    	    $mois =  ' '.ucfirst($nomc_mois[$num_mois]). ' '.$annee;     // Jan 1999
    	    break;
    	    case  "h":
    	    $mois =  '';
    	    break;
    	    default:
    	    $mois =  '/'.$mois. '/'.$annee;                             // /08/1999
    	    break;
    	}
    	 /* Affichage de l'heure */
    	switch ($modeheure) {
    	    case  "l":
    	    $heure =  ' '.$hour.$aff_heure.$minute;                     // 23 heures 54
    	    break;
    	    case  "c":
    	    $heure =  ' '.$hour. 'h'.$minute;                             // 23h54
    	    break;
    	}
		
    	 /* Valeur retournée */
    	return $jour.$mois.$heure;
	}		


}

?>