<?php

class RolePages extends Model {

    public function getRolePages($page_id) {
        $this->db->query('SELECT r.id, r.name FROM role_page rp JOIN roles r on rp.role_id = r.id WHERE rp.page_id = :page_id');
        $this->db->bind(':page_id', $page_id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function setRolesForPage($role_ids, $page_id) {
        $this->db->query('DELETE FROM role_page WHERE page_id = :page_id');
        $this->db->bind(':page_id', $page_id);
        $this->db->single();
        
        foreach($role_ids as $rol) {
            $this->db->query('INSERT INTO role_page (page_id, role_id) values (:page_id, :role_id)');
            $this->db->bind(':page_id', $page_id);
            $this->db->bind(':role_id', $rol->id);
            $this->db->single();
        }
        return true;
    }
}
