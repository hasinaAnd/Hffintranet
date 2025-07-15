<?php

namespace App\Model\dom;

use App\Model\Model;


class DomModel extends Model
{

    //TSY MAHAZO FAFANA
    /**
     * Chevauchement : recuperation la minimum de la date de mission et le maximum de la mission 
     */
    public function getInfoDOMMatrSelet($matricule)
    {
        $SqlDate = "SELECT  Date_Debut, Date_Fin
        FROM Demande_ordre_mission
        WHERE  Matricule = '" . $matricule . "'  
        AND ID_Statut_Demande NOT IN (9, 33, 34, 35, 44)";

        $execSqlDate = $this->connexion->query($SqlDate);

        $DateM = array();
        while ($tab_list = odbc_fetch_array($execSqlDate)) {
            $DateM[] = $tab_list;
        }

        return $DateM;
    }
}
