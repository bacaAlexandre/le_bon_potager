<?php


class AnnonceModel extends Model
{

    public function findAll() {
        $sql = "SELECT * FROM $this->table INNER JOIN T_PRODUITS ON puProduit_id = id_produit INNER JOIN T_UNITE ON puUnite_id = id_unite INNER JOIN T_UTILISATEURS ON puVendeur_id = id_utilisateur INNER JOIN T_CODE_POSTAL ON utiCp_id = id_code_postal INNER JOIN T_VILLE ON cpVille_id = id_ville ORDER BY id_produit_utilisateur";
        return $this->db->query($sql);
    }


    public function findAllByDep($dep, $pro = null)
    {
        $sql = "SELECT * FROM $this->table INNER JOIN T_PRODUITS ON puProduit_id = id_produit INNER JOIN T_UNITE ON puUnite_id = id_unite INNER JOIN T_UTILISATEURS ON puVendeur_id = id_utilisateur INNER JOIN T_CODE_POSTAL ON utiCp_id = id_code_postal INNER JOIN T_VILLE ON cpVille_id = id_ville";
        $sql .= " WHERE puDesative = 0";
        $sql .= " AND vilDepartement_id = $dep";

        if ($pro != null) $sql .= " AND puProduit_id = $pro";

        return $this->db->query($sql);

    }
}