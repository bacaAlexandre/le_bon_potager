<?php

class UserModel extends Model {

    public function findRole($user_id)
    {
        $sql = "SELECT * FROM $this->table 
                INNER JOIN T_ROLES ON utiRole_id = id_role WHERE id_utilisateur=$user_id";
        return $this->db->getFirst($sql);
    }

    public function findUtilisateur($user_id)
    {
        $sql = "SELECT * FROM $this->table 
                WHERE id_utilisateur=$user_id";
        return $this->db->getFirst($sql);
    }

    public function findCodePostal($user_id) {
        $sql = "SELECT * FROM $this->table 
                INNER JOIN T_CODE_POSTAL ON utiCp_id = id_code_postal WHERE id_utilisateur=$user_id";
        return $this->db->getFirst($sql);
    }

}