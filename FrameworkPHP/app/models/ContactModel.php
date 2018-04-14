<?php


class ContactModel extends Model
{

    public function findAnnonce($id)
    {
        $sql = "SELECT * FROM $this->table INNER JOIN T_PRODUITS ON puProduit_id = id_produit INNER JOIN T_UNITE ON puUnite_id = id_unite INNER JOIN T_UTILISATEURS ON puVendeur_id = id_utilisateur INNER JOIN T_CODE_POSTAL ON utiCp_id = id_code_postal INNER JOIN T_VILLE ON cpVille_id = id_ville";

        $sql .= " WHERE  id_produit= $id";

        return $this->db->getFirst($sql);

    }

}