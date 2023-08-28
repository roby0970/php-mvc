<?php

class Permission extends Model {

    public function findAll() {
        $this->db->query('SELECT * FROM permissions');

        $row = $this->db->resultSet();

        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
}