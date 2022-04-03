 <?php
class Product{

    private $db;
    public $stmt;
    public function __construct(){
        $this->db = new Database();
    }

    public function getProductsWithLowestPrice($wholesaler = null){
          $this->db->query('SELECT p.id, p.sku, p.name, p.rec_price, min(u.cur_price) AS min_cur_price, u.update_date FROM products p JOIN urls u ON p.id = u.product GROUP BY p.id');
          $results = $this->db->resultSet();
          return $results;
    }

    public function getProductRivalsURLs($product_id){
        $this->db->query('SELECT u.id, u.product, u.rival, u.cur_price, u.url, u.update_date, r.name FROM urls AS u INNER JOIN rivals AS r ON u.rival = r.id WHERE u.product = :product_id');
        $this->db->bind(':product_id', $product_id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getProductRivalsLowestPrice($product_id){
      $rivalURLs = $this->getProductRivalsURLs($product_id);
      //array_column works with array of object
      $numbers = array_column($rivalURLs, 'cur_price');
      $min_price = min($numbers);
      return $min_price;
    }

    public function addProduct($sku, $name, $rec_price){
        $this->db->query('INSERT INTO products (sku, name, rec_price) VALUES (:sku, :name, :rec_price)');
        $this->db->bind(':sku', $sku);
        $this->db->bind(':name', $name);
        $this->db->bind(':rec_price', $rec_price);
        $this->db->execute();
    }

    public function getProduct($product_id){
      $this->db->query('SELECT sku, name, rec_price, url FROM products WHERE id =:id');
      $this->db->bind(':id', $product_id);
      $results = $this->db->single();
      return $results;

    }

    public function getURL($url_ID){
      $this->db->query('SELECT u.product, u.rival, u.url, u.cur_price, r.name AS rival_name, p.name AS product_name FROM urls AS u INNER JOIN rivals AS r ON u.rival = r.id INNER JOIN products AS p ON u.product = p.id WHERE u.id =:id');
      $this->db->bind(':id', $url_ID);
      $results = $this->db->single();
      return $results;

    }

    public function getSimpleURL($url_ID){
      $this->db->query('SELECT id, url FROM urls WHERE product =:id');
      $this->db->bind(':id', $url_ID);
      $results = $this->db->resultSet();
      return $results;

    }

    public function getSimpleURLfromProduct($id){
      $this->db->query('SELECT url FROM products WHERE id =:id');
      $this->db->bind(':id', $id);
      $results = $this->db->single();
      return $results;

    }



    public function updateRivalPrice($id, $clean_item2){
        $this->db->query('UPDATE urls SET cur_price = :clean_item2, update_date = CURRENT_DATE WHERE id =:id');
        $this->db->bind(':clean_item2', $clean_item2);
        $this->db->bind(':id', $id);
        $this->db->execute();
      }

      public function addUpdateDate($id){
          $this->db->query('UPDATE urls SET update_date = CURRENT_DATE WHERE id =:id');
          $this->db->bind(':id', $id);
          $this->db->execute();
        }

      public function updateRivalURL($id, $product, $rival, $cur_price, $url, $rival_product_option = null, $rival_product_id = null){
        $this->db->query('UPDATE urls SET product = :product, rival = :rival, cur_price = :cur_price, url = :url, rival_product_option = :rival_product_option, rival_product_id = :rival_product_id WHERE id =:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':product', $product);
        $this->db->bind(':rival', $rival);
        $this->db->bind(':cur_price', $cur_price);
        $this->db->bind(':url', $url);
        $this->db->bind(':rival_product_option', $rival_product_option);
        $this->db->bind(':rival_product_id', $rival_product_id);
        $this->db->execute();
      }

      public function updateProduct($id, $sku, $name, $rec_price, $url){
        $this->db->query('UPDATE products SET sku = :sku, name = :name, rec_price = :rec_price, url = :url WHERE id =:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':sku', $sku);
        $this->db->bind(':name', $name);
        $this->db->bind(':rec_price', $rec_price);
        $this->db->bind(':url', $url);
        $this->db->execute();
      }

      public function updateOurProductPrice($id, $rec_price){
        $this->db->query('UPDATE products SET rec_price = :rec_price WHERE id =:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':rec_price', $rec_price);
        $this->db->execute();
      }

      public function removeProduct($id){
        $this->db->query('DELETE FROM urls WHERE product =:id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        $this->db->query('DELETE FROM products WHERE id =:id');
        $this->db->bind(':id', $id);
        $this->db->execute();
      }

      public function getURLsForAutoScrape(){
          $this->db->query("SELECT id, url FROM urls WHERE update_date < date('now') OR update_date IS NULL AND url NOT LIKE '%allegro%'");
          $result = $this->db->resultSet();
          return $result;
      }


}
?>
