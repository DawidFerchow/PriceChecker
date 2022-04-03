<?php
class Rival{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function checkIsExist($value, $from, $where){

      $wheres  = ["name","sku"]; // the white list of allowed fierld names
      $key     = array_search($where, $wheres); // see if we have such a name
      $where = $wheres[$key]; //if not, first one will be set automatically. smart enuf :)

      $froms  = ["products","rivals"]; // the white list of allowed fierld names
      $key     = array_search($from, $froms); // see if we have such a name
      $from = $froms[$key]; //if not, first one will be set automatically. smart enuf :)

      $this->db->query("SELECT COUNT(*) as count FROM `$from` WHERE `$where` = :value");
      $this->db->bind(':value', $value);
      $count = $this->db->single();
      $result = $count->count;
      return $count;
    }

    public function addRival($rival){
      $this->db->query('INSERT INTO rivals (name) VALUES (:rival)');
      $this->db->bind(':rival', $rival);
      $this->db->execute();
    }

    public function addRivalURL($product, $rival, $cur_price, $url, $rival_product_option, $rival_product_id){
      $this->db->query('INSERT INTO urls (product, rival, cur_price, url, rival_product_option, rival_product_id) VALUES (:product, :rival, :cur_price, :url, :rival_product_option, :rival_product_id)');
      $this->db->bind(':product', $product);
      $this->db->bind(':rival', $rival);
      $this->db->bind(':cur_price', $cur_price);
      $this->db->bind(':url', $url);
      $this->db->bind(':rival_product_option', $rival_product_option);
      $this->db->bind(':rival_product_id', $rival_product_id);
      $this->db->execute();
    }

    public function getAllRivals(){
        $this->db->query("SELECT * FROM rivals");
        $results = $this->db->resultSet();
        return $results;

    }

    public function getRivalID($name){
        $this->db->query("SELECT id FROM rivals WHERE name = :name");
        $this->db->bind(':name', $name);
        $result = $this->db->single();
        return $result;

    }

    public function getRivalName($id){
        $this->db->query("SELECT name FROM rivals WHERE id=:id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;

    }

    public function getNumberOfRivalURLs($rival){
      $this->db->query("SELECT COUNT(*) AS number FROM urls WHERE rival = :value");
      $this->db->bind(':value', $rival);
      $result = $this->db->single();
      return $result->number;

    }

    public function getAllRivalURL($rivalID){
      $this->db->query("SELECT u.*, p.name AS product_name FROM urls AS u INNER JOIN products AS p ON u.product = p.id WHERE u.rival = :value");
      $this->db->bind(':value', $rivalID);
      $results = $this->db->resultSet();
      return $results;

    }

    public function getRivalURLs($rival){
      $this->db->query('SELECT id, url FROM urls WHERE rival =:rival');
      $this->db->bind(':rival', $rival);
      $results = $this->db->resultSet();
      return $results;
    }

    public function removeRival($id){
      $this->db->query('DELETE FROM urls WHERE rival =:id');
      $this->db->bind(':id', $id);
      $this->db->execute();
      $this->db->query('DELETE FROM rivals WHERE id =:id');
      $this->db->bind(':id', $id);
      $this->db->execute();
    }

    public function removeProduct($id){
      $this->db->query('DELETE FROM urlssss WHERE product =:id');
      $this->db->bind(':id', $id);
      $this->db->execute();
      $this->db->query('DELETE FROM productssss WHERE id =:id');
      $this->db->bind(':id', $id);
      $this->db->execute();
    }

    public function removeURL($id){
      $this->db->query('DELETE FROM urls WHERE id =:id');
      $this->db->bind(':id', $id);
      $this->db->execute();
    }

  }
?>
