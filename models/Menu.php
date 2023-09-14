<?php

class Menu extends Model {

    public function findAll() {
        $this->db->query('SELECT * FROM menu');

        $row = $this->db->resultSet();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function findByUserId($user_id) {
        $this->db->query('SELECT m.*, um.id as um_id FROM user_menu um inner join menu m on m.id = um.menu_id where um.user_id = :user_id order by um.id');
        $this->db->bind(':user_id', $user_id);

        $row = $this->db->resultSet();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function findSingle($id) {
        $this->db->query('SELECT * FROM menu WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function delete($id, $user_id) {
                    //
                    $text = $id . ' ' . $user_id;
                    $filePath = "file.txt";
                    file_put_contents($filePath, $text);
                    //

        $this->db->query('DELETE FROM user_menu WHERE menu_id = :id and user_id=:user_id limit 1');
        $this->db->bind(':id', $id);
        $this->db->bind(':user_id', $user_id);

        $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function setMenusForUser($role_ids, $user_id) {
        foreach($role_ids as $rol) {
            $this->db->query('INSERT INTO user_menu (user_id, menu_id) values (:user_id, :menu_id)');
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':menu_id', $rol->id);
            $this->db->single();
        }
        return true;
    }
}