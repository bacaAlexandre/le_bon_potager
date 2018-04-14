<?php
/**
 * Created by PhpStorm.
 * User: Lucien
 * Date: 15/04/2018
 * Time: 01:27
 */

class ProduitModel extends Model
{

    public function findProduitCategorie()
    {
        $sql = "SELECT * FROM $this->table 
                INNER JOIN T_CATEGORIE ON proCategorie_id = id_categorie 
                ORDER BY catNom";

        return $this->db->query($sql);
    }
}