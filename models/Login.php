<?php
class User{

   private $db;
   public $stmt;
   public function __construct(){
       $this->db = new Database();
   }

   public function checkLoginExist($email){
       $this->db->query("SELECT COUNT(*) FROM users WHERE email = :email");
       $this->db->bind(':email', $email);
       $count = $this->db->single();
       $result = $count['COUNT(*)'];
       return $result;

   }

/*
   public function checkLoginExist($email){
       $this->db->query('SELECT * FROM users WHERE email =:email');
       $this->db->bind(':email', $email);
       $results = $this->db->single();
       return $results;
   }
*/

   public function checkPasswordMatch($password){


   }

}
?>