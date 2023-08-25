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

    public function findSingle($id) {
        $this->db->query('SELECT * FROM roles WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->query('DELETE FROM roles WHERE id = :id');
        $this->db->bind(':id', $id);

        $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}