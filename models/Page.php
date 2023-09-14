<?php

class Page extends Model {

    public function findAll($role_id) {
        $this->db->query('SELECT p.* FROM pages p inner join role_page rp on p.id = rp.page_id where rp.role_id = :role_id');
        $this->db->bind(':role_id', $role_id);

        $row = $this->db->resultSet();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function findSingle($id) {
        $this->db->query('SELECT * FROM pages WHERE id = :id');
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
        $this->db->query('DELETE FROM pages WHERE id = :id');
        $this->db->bind(':id', $id);

        $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function update($id, $newName, $description, $picture_path) {
        $this->db->query('UPDATE pages SET name = :newName, description = :description, picture_path = :picture_path WHERE id = :id');
        $this->db->bind(':newName', $newName);
        $this->db->bind(':description', $description);
        $this->db->bind(':picture_path', $picture_path);
        $this->db->bind(':id', $id);
        $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function insert($name, $description, $picture_path) {
        $this->db->query('INSERT into pages (name, description, picture_path) values (:name, :description, :picture_path)');
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':picture_path', $picture_path);
        $result = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $this->db->getLastInsertedId();
        }else{
            return -1;
        }
    }
}