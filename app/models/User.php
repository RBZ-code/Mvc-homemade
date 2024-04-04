<?php 

class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function findUserByEmail($userMail){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $userMail,PDO::PARAM_STR );
        $res = $this->db->findOne();

        if(empty($res)){
            return false;
        } else {
            return $res;
        }
    }

    public function register($arr){
        $this->db->query('INSERT INTO users(nom, email, password) VALUES (:nom, :email, :password )');
        
        $this->db->bind('nom', $arr['name'],PDO::PARAM_STR);
        $this->db->bind('email', $arr['email'],PDO::PARAM_STR);
        $this->db->bind('password', $arr['password'],PDO::PARAM_STR);

        $res = $this->db->execute();

        if($res){
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
{
    // Récup User depuis la bdd
    $user = $this->findUserByEmail($email);
    
    // Vérif User et Mdp
    if ($user && password_verify($password, $user->password)) {
        // return User
        //dd($user);
        return $user;
    } else {
        //dd('erreur match password');
        return false;
    }
}
}

