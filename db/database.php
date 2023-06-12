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

    public function getUserDataByID($userID){
        $query = "SELECT username, email FROM users WHERE active=1 AND ID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->num_rows;
        
        $res = array();
        if($rows == 0){
            return $res;
        } else {
            $tmp = $result->fetch_all(MYSQLI_ASSOC)[0];
        }

        $res['username'] = $tmp['username'];
        $res['email'] = $tmp['email'];
        $res['img'] = $this->getUserImgByUserID($userID);
        return $res;
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

    public function newNotification($SrcUserId, $DstUserId, $type, $content){
        $query = "INSERT INTO notifications (content, `type`, dateTimeCreated, userSrc, userDest) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $content, $type, date('Y-m-d H:i:s'), $SrcUserId, $DstUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }

    
    public function NotificationsToRead($DstUserId){
        $query = "SELECT notifications.*, users.username, profile_images.`path`, profile_images.altText, profile_images.longdesc 
            FROM notifications JOIN users ON notifications.userSrc = users.ID JOIN profile_images ON users.userImg = profile_images.ID 
            WHERE notifications.userDest = ? AND notifications.viewed = FALSE";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $DstUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        return  $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function readNotification($notificationID){
        $query = "UPDATE notifications SET viewed = TRUE, dateTimeViewed = ? WHERE ID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', date('Y-m-d H:i:s'), $notificationID);
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
        $query = "SELECT userFollowing FROM follow JOIN users ON users.ID = follow.userFollowing 
            WHERE follow.userFollowed = ? AND users.active=1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userIdFollowed);
        $stmt->execute();
        $result = $stmt->get_result();
        return  $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getFollowed($userIdFollowing){
        $query = "SELECT userFollowed FROM follow JOIN users ON users.ID = follow.userFollowed
            WHERE follow.userFollowing = ? AND users.active=1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userIdFollowing);
        $stmt->execute();
        $result = $stmt->get_result();
        return  $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFollowersList($userIdFollowed){
        $followers = $this->getFollowers($userIdFollowed);
        $IDsfollowers = array(); //lista di ID dei followers
        for ($i=0; $i < count($followers); $i++) { 
            $IDsfollowers[$i] = $followers[$i]['userFollowing'];
        }
        $res = array();
        foreach ($IDsfollowers as $key => $userID) {
            $query = "SELECT username, `path`, `altText` FROM users JOIN `profile_images` ON users.userImg = `profile_images`.ID 
                WHERE users.ID = ? AND users.active = 1";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $userID);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            $res[$result['username']] = array('path' => $result['path'], 'altText' => $result['altText']);
        }
        return $res;
    }

    public function getFollowedList($userIdFollowing){
        $followed = $this->getFollowed($userIdFollowing);
        $IDsfollowed = array(); //lista di ID dei followed
        for ($i=0; $i < count($followed); $i++) { 
            $IDsfollowed[$i] = $followed[$i]['userFollowed'];
        }
        $res = array();
        foreach ($IDsfollowed as $key => $userID) {
            $query = "SELECT username, `path`, `altText` FROM users JOIN `profile_images` ON users.userImg = `profile_images`.ID 
                WHERE users.ID = ? AND users.active = 1";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $userID);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            $res[$result['username']] = array('path' => $result['path'], 'altText' => $result['altText']);
        }
        return  $res;
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
        $query = "SELECT `path`, `altText` FROM profile_images WHERE ID = (SELECT userImg FROM users WHERE active=1 AND username = ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }   

    public function getUserImgByUserID($userID){
        $query = "SELECT `path`, `altText` FROM profile_images WHERE ID = (SELECT userImg FROM users WHERE active=1 AND ID = ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $res = array();
        if(count($result) == 1){
            $res['path'] = $result[0]['path'];
            $res['altText'] = $result[0]['altText'];
        }
        return $res;
    }   
    
    public function setDefaultUserImg($username){
        $query = "UPDATE users SET userImg = 1 WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }

    public function updateUserImg($username, $imgID){
        $query = "UPDATE users SET userImg = ? WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $imgID, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $stmt->errno;
    }   

    public function addImg($altText, $longdesc, $imgPath){
        $query = "INSERT INTO profile_images (`path`, altText, longdesc) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $imgPath, $altText, $longdesc);
        $stmt->execute();
        $result = $stmt->get_result();
        if($stmt->errno == 0){
            $query = "SELECT ID FROM profile_images WHERE `path` = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $imgPath);
            $stmt->execute();
            $result = $stmt->get_result();
            
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return FALSE;
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
    
    public function setDefaultNotificationSettings($userId){
        $query = "INSERT INTO preferences VALUES (?, ?, ?)";

        $settings = array("NFOLLOWER" => TRUE, "NCOMMENT" => TRUE, "NPOSTFEED" => FALSE, "NLIKEPOST" => FALSE, 
                    "NLIKECOMMENT" => FALSE);
        
        $ok = TRUE;
        foreach ($settings as $type => $value) {
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sss', $type, $userId, $value);
            $stmt->execute();
            $result = $stmt->get_result()->errno;
            if($result != 0){
                $ok = FALSE;
            }
        }
        return $ok;
    }

    public function modifyNotificationSettings($nFollower, $nComment, $nPostFeed, $nLikePost, $nLikeComment ,$userId){
        $query = "UPDATE preferences SET `value` = ? WHERE `type` = ? AND userID = ?";

        $settings = array("NFOLLOWER" => $nFollower, "NCOMMENT" => $nComment, "NPOSTFEED" => $nPostFeed, "NLIKEPOST" => $nLikePost, 
                    "NLIKECOMMENT" => $nLikeComment);
        
        $ok = TRUE;
        foreach ($settings as $type => $value) {
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssi', $value, $type, $userId);
            $stmt->execute();
            $result = $stmt->get_result()->errno;
            if($result != 0){
                $ok = FALSE;
            }
        }
        return $ok;
    }

    public function getNotificationSettings($userId){
        $settings = array("NFOLLOWER" => FALSE, "NCOMMENT" => FALSE, "NPOSTFEED" => FALSE, "NLIKEPOST" => FALSE, 
                    "NLIKECOMMENT" => FALSE);
        
        $query = "SELECT `type`, `value` FROM preferences WHERE userID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if($stmt->errno == 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return FALSE;
        }
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