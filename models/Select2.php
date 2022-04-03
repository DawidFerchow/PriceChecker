<?php
class Select2{

   private $db;
   public $stmt;
   public function __construct(){
       $this->db = new Database();
   }

   public function getSuggestions($search, $from, $where, $numberofrecords){
       $this->db->query("SELECT * FROM $from WHERE $where like :name ORDER BY name LIMIT :limit");
       $this->db->bind(':name', '%'.$search.'%');
       $this->db->bind(':limit', $numberofrecords);
       $results = $this->db->resultSet();
       return $results;
   }

}