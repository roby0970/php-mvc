<?php

class User extends Model {

    public function findAll() {
        $this->db->query('SELECT users.username as username, users.email as email, roles.name as roleName FROM users LEFT JOIN roles on users.role_id = roles.id');

        $row = $this->db->resultSet();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
    //Find user by email or username
    public function findUserByEmailOrUsername($email, $username){
        $this->db->query('SELECT * FROM users, roles WHERE username = :username OR email = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->password;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

    public function setRole($userId, $role){
        $this->db->query('UPDATE users SET role_id = :role_id WHERE id = :id' );
        $this->db->bind(':role_id', $role);
        $this->db->bind(':id', $userId);
        $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function unsetRole($role){
        $this->db->query('UPDATE users SET role_id = NULL WHERE role_id = :role_id' );
        $this->db->bind(':role_id', $role);
        $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

}