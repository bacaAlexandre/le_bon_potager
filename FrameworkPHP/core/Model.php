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
        }
    }

    public function insert($data)
    {
        $fields = '';
        $values = '';
        foreach ($data as $key => $val) {
            if (in_array($key, $this->fields)) {
                $fields .= "`".$key."`" . ',';
                $values .= $val . ',';
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

    public function update($conditions, $values)
    {
        $where = '';
        $fields = '';
        foreach ($conditions as $key => $val) {
            if (in_array($key, $this->fields)) {
                $where .= "`$key`=$val,";
            }
        }
        foreach ($values as $key => $val) {
            if (in_array($key, $this->fields)) {
                $fields .= "`$key`=$val,";
            }
        }
        $where = rtrim($where, ',');
        $fields = rtrim($fields,',');
        $sql = "UPDATE `$this->table` SET $fields WHERE $where";
        return $this->db->execute($sql);
    }

    public function delete($conditions)
    {
        $where = '';
        foreach ($conditions as $key => $val) {
            if (in_array($key, $this->fields)) {
                $where .= "`$key`=$val,";
            }
        }
        $where = rtrim($where, ',');
        $sql = "DELETE FROM `$this->table` WHERE $where";
        return $this->db->execute($sql);
    }

    public function select($conditions)
    {
        $where = '';
        foreach ($conditions as $key => $val) {
            if (in_array($key, $this->fields)) {
                $where .= "`$key`=$val,";
            }
        }
        $where = rtrim($where, ',');
        $sql = "SELECT * FROM `$this->table` WHERE $where";
        return $this->db->query($sql);
    }

    public function find($conditions)
    {
        $where = '';
        foreach ($conditions as $key => $val) {
            if (in_array($key, $this->fields)) {
                $where .= "`$key`=$val,";
            }
        }
        $where = rtrim($where, ',');
        $sql = "SELECT * FROM `$this->table` WHERE $where";
        return $this->db->getFirst($sql);
    }

    public function findAll()
    {
        $sql = "select * from $this->table";
        return $this->db->query($sql);
    }

    public function count()
    {
        $sql = "select count(*) AS total from $this->table";
        return $this->db->getFirst($sql)->total;
    }
}