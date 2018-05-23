<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 23/05/2018
 * Time: 15:55
 */

class AdminStatistiqueModel extends Model
{
    public function findAllAnnonce()
    {
        $sql = "SELECT  proNom AS produit, count(puProduit_id) AS nombre FROM $this->table 
                INNER JOIN T_PRODUITS ON `puProduit_id` = id_produit
                WHERE puDesactive = 0
                GROUP BY puProduit_id
                ORDER BY proNom";

        return $this->db->query($sql);
    }
}