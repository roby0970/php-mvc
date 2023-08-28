<?php

class RolePermission extends Model {

    public function getRolePermissions($role_id) {
        $this->db->query('SELECT permissions.id, permissions.name FROM role_permissions JOIN permissions on role_permissions.permission_id = permissions.id WHERE role_permissions.role_id = :role_id');
        $this->db->bind(':role_id', $role_id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function setPermissionsForRole($permission_ids, $role_id) {
        $this->db->query('DELETE FROM role_permissions WHERE role_id = :role_id');
        $this->db->bind(':role_id', $role_id);
        $this->db->single();
        
        foreach($permission_ids as $perm) {
            
            $this->db->query('INSERT INTO role_permissions (role_id, permission_id) values (:role_id, :permission_id)');
            $this->db->bind(':role_id', $role_id);
            $this->db->bind(':permission_id', $perm->id);
            $this->db->single();
        }
        return true;
    }
}
