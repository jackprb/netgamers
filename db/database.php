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

    public function getUserEmail($username){
        $query = "SELECT email FROM users WHERE active=1 AND username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }  

    public function insertNewPost($userId, $img, $title, $text){
        $query = "INSERT INTO posts(img, title, `text`, dateTimePublished, userID) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $img = 'helloooo';
        $stmt->bind_param('sssss', $img, $title, $text, date('Y-m-d H:i:s'), $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }

    public function newComment($userId, $postId, $img, $text){
        $query = "INSERT INTO comments VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $img = 'helloooo';
        $stmt->bind_param('sssss', $img, $text, date('Y-m-d H:i:s'), $userId, $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }
    
    public function modifyComment($userId, $postId, $img, $text){
        $query = "UPDATE comments SET img = ?, text = ?, dateTime = ? WHERE userID = ? AND postID = ?";
        $stmt = $this->db->prepare($query);
        $img = 'helloooo';
        $stmt->bind_param('sssss', $img, $text, date('Y-m-d H:i:s'), $userId, $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }

    public function newFollow($userIdFollowing, $userIdFollowed){
        $query = "INSERT INTO follow VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $userIdFollowing, $userIdFollowed);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }

    public function removeFollow($userIdFollowing, $userIdFollowed){
        $query = "DELETE FROM follow WHERE userFollowing = ? AND userFollowed = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $userIdFollowing, $userIdFollowed);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }

    public function getFollowers($userIdFollowed){
        $query = "SELECT userFollowing FROM follow WHERE userFollowed = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userIdFollowed);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }

    public function getFollowed($userIdFollowing){
        $query = "SELECT userFollowed FROM follow WHERE userFollowing = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userIdFollowing);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }

    public function updatePost($postId, $userId, $img, $title, $text){
        $query = "UPDATE posts SET img = ?, title = ?, `text` = ?, dateTimePublished = ? WHERE ID = ?";
        $stmt = $this->db->prepare($query);
        $img = 'helloooo';
        $stmt->bind_param('sssss', $img, $title, $text, date('Y-m-d H:i:s'), $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    } 

    public function updateUserEmail($username, $email){
        $query = "UPDATE users SET email = ? WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $email, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }   

    public function standbyAccount($username){
        $query = "UPDATE users SET active = 0 WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }   

    public function getUserImg($username){
        $query = "SELECT userImg FROM users WHERE active=1 AND username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }   
    
    public function updateUserImg($username, $imgPath){
        $query = "UPDATE users SET userImg = ? WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $imgPath, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
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
        $query = "UPDATE users SET `psw` = ? WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $newPsw, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno; // 0 -> no errors
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
        if($resultCheckEmail == 0 && $resultCheckUser == 0){
            $query = "INSERT INTO users (`username`, `psw`, `email`, `registrationDate`) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $registrationDate = date('Y-m-d');
            $stmt->bind_param('ssss', $username, $psw, $email, $registrationDate);
            $stmt->execute();
            $result = $stmt->get_result();
            return TRUE;
        } 
        if($resultCheckUser != 0){ // if another user registered with this email
            return "usernameExist";
        }
        if($resultCheckEmail != 0){ // if this username is already taken
            return "emailExist";
        }
    }
}
?>