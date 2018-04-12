<?php


class AnnonceModel extends Model
{

    public function findProduitCategorie(){
        $sql = "select * from $this->table inner join T_CATEGORIE on proCategorie_id = id_categorie ORDER BY catNom";

        return $this->db->query($sql);
    }

}