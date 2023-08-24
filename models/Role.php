<?php

class Role extends Model {

    public function findAll() {
        $this->db->query('SELECT * FROM roles');

        $row = $this->db->resultSet();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
}