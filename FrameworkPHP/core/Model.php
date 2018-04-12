<?php

class Model {

    protected $db;
    protected $table;
    protected $fields = array();

    public function __construct($table)
    {
        $this->db = new Database();
        $this->table = $table;
        $this->get_fields();
    }

    private function get_fields()
    {
        $sql = "DESC ". $this->table;
        $row = $this->db->query($sql);
        foreach ($row as $col) {
            $this->fields[] = $col->Field;
            if ($col->Key == 'PRI') $pk = $col->Field;
        }
        if (isset($pk)) {
            $this->fields['pk'] = $pk;
        }
    }

    public function insert($data)
    {
        $fields = '';
        $values = '';
        foreach ($data as $key => $val) {
            if (in_array($key, $this->fields)) {
                $fields .= "`".$key."`" . ',';
                $values .= "'".$val."'" . ',';
            }
        }
        $fields = rtrim($fields,',');
        $values = rtrim($values,',');
        $sql = "INSERT INTO `$this->table` ($fields) VALUES ($values)";
        if ($this->db->execute($sql)) {
            return $this->db->getLastInsertId();
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $fields = '';
        $where = 0;
        foreach ($data as $key => $val) {
            if (in_array($key, $this->fields)) {
                if ($key == $this->fields['pk']) {
                    $where = "`$key`=$val";
                } else {
                    $fields .= "`$key`='$val'".",";
                }
            }
        }
        $fields = rtrim($fields,',');
        $sql = "UPDATE `$this->table` SET $fields WHERE $where";
        return $this->db->execute($sql);
    }

    public function delete($primary_key)
    {
        if (is_array($primary_key)) {
            $where = "`{$this->fields['pk']}` in (".implode(',', $primary_key).")";
        } else {
            $where = "`{$this->fields['pk']}`=$primary_key";
        }
        $sql = "DELETE FROM `{$this->table}` WHERE $where";
        return $this->db->execute($sql);
    }

    public function find($primary_key)
    {
        $sql = "select * from `$this->table` where `$this->fields['pk']` = $primary_key";
        return $this->db->getFirst($sql);
    }

    public function findBy($datas)
    {
        $sql = "select * from `$this->table` where 1=1";
        foreach ($datas as $key =>$data){
            $sql .= " and $key = '$data'";
        }
        return $this->db->getFirst($sql);
    }

    public function count()
    {
        $sql = "select count(*) AS total from $this->table";
        return $this->db->getFirst($sql)->total;
    }

    public function findAll()
    {
        $sql = "select * from $this->table";
        return $this->db->query($sql);
    }
}