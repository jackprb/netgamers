<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }   

    public function getUserId($username, $password){
        $query = "SELECT id FROM users WHERE active=1 AND username = ? AND psw = ?";
        $stmt = $this->db->prepare($query);
        //
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }   
    
    public function getCurrentUserPsw($username){
        $query = "SELECT psw FROM users WHERE active=1 AND username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function setNewUserPsw($username, $newPsw){
        $query = "UPDATE users SET `password` = ? WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $newPsw, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registerNewUser($username, $psw, $email){
        // check if already exists an user with this username
        $query = "SELECT username FROM users WHERE active=1 AND username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $resultCheckUser = $stmt->get_result()->num_rows;

        //check if already exists an user with this email
        $query = "SELECT email FROM users WHERE active=1 AND email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $resultCheckEmail = $stmt->get_result()->num_rows;

        // if previous checks are satisfied, register the new user
        if($resultCheckEmail !== FALSE && $resultCheckUser !== FALSE){
            $query = "INSERT INTO users (`username`, `psw`, `email`, `registrationDate`) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $registrationDate = date('Y-m-d');
            $stmt->bind_param('ssss', $username, $psw, $email, $registrationDate);
            $stmt->execute();
            $result = $stmt->get_result();
            return TRUE;
        } 
        if($resultCheckUser !== 0){ // if another user registered with this email
            return "usernameExist";
        }
        if($resultCheckEmail !== 0){ // if this username is already taken
            return "emailExist";
        }
    }
}
?>