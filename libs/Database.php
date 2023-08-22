<?php

class Database {

    const server = "localhost";
    const user = "root";
    const password = "";
    const database = "seminar";
    
 /*
    const server = "localhost";
    const user = "root";
    const password = "";
    const database = "seminar";
   */  
    
    private $connection = null;
    private $errorMessage = '';

    function connect() {
        $this->connection = new mysqli(self::server, self::user, self::password, self::database);
        if ($this->connection->connect_errno) {
            echo "Connection to database failed " . $this->connection->connect_errno . ", " .
            $this->connection->connect_error;
            $this->errorMessage = $this->connection->connect_error;
        }
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_errno) {
            echo "Neuspješno postavljanje znakova za bazu: " . $this->connection->connect_errno . ", " .
            $this->connection->connect_error;
            $this->errorMessage = $this->connection->connect_error;
        }
        
        return $this->connection;
    }

    function disconnect() {
        $this->connection->close();
    }

    function query($query) {
        $rezultat = $this->connection->query($query);
        if ($this->connection->connect_errno) {
            echo "Greška kod upita: {$query} - " . $this->connection->connect_errno . ", " .
            $this->connection->connect_error;
            $this->errorMessage = $this->connection->connect_error;
        }
        if (!$rezultat) {
            $rezultat = null;
        }
        return $rezultat;
    }
}

