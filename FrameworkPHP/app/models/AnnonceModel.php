<?php


class AnnonceModel extends Model
{

    public function findProduitCategorie()
    {
        $sql = "SELECT * FROM $this->table 
                INNER JOIN T_CATEGORIE ON proCategorie_id = id_categorie 
                ORDER BY catNom";

        return $this->db->query($sql);
    }


    public function findListeProduitDep($pro = null, $dep)
    {
        $sql = "SELECT id_produit,utipseudo, proNom, puQuantite, uniLibelle, puCommentaire, proImg FROM $this->table INNER JOIN T_PRODUITS ON puProduit_id = id_produit INNER JOIN T_UNITE ON puUnite_id = id_unite INNER JOIN T_UTILISATEURS ON puVendeur_id = id_utilisateur INNER JOIN T_CODE_POSTAL ON utiCp_id = id_code_postal INNER JOIN T_VILLE ON cpVille_id = id_ville";

        $sql .= " WHERE vilDepartement_id = $dep";

        if ($pro != null) $sql .= " AND puProduit_id = $pro";

        return $this->db->query($sql);

    }
}