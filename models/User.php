<?php

class User extends Model {

    public function findAll() {
        $this->db->query('SELECT * FROM users');

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
        $this->db->query('SELECT * FROM users WHERE username = :username OR email = :email');
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

    // //Register User
    // public function register($data){
    //     $this->db->query('INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) 
    //     VALUES (:name, :email, :Uid, :password)');
    //     //Bind values
    //     $this->db->bind(':name', $data['usersName']);
    //     $this->db->bind(':email', $data['usersEmail']);
    //     $this->db->bind(':Uid', $data['usersUid']);
    //     $this->db->bind(':password', $data['usersPwd']);

    //     //Execute
    //     if($this->db->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    //Login user
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

    // //Reset Password
    // public function resetPassword($newPwdHash, $tokenEmail){
    //     $this->db->query('UPDATE users SET usersPwd=:pwd WHERE usersEmail=:email');
    //     $this->db->bind(':pwd', $newPwdHash);
    //     $this->db->bind(':email', $tokenEmail);

    //     //Execute
    //     if($this->db->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}