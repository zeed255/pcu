<?php

include_once 'db.php';

class User extends DB{

    private $nombre;

    public function userExists($user,$pass){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE nick = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
			foreach ($query as $currentUser) {
				$_SESSION['ID'] = $currentUser['uID'];
			}
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE nick = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nick'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>
