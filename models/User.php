<?php
class User{

  private $db;
  public $stmt;

/*
  public function __construct() {
    $this->db = new Database();
  }
*/

  public function checkLoginExist($email): int {
    $this->db = new Database();
    $this->db->query("SELECT COUNT(*) AS number FROM users WHERE email = :email");
    $this->db->bind(':email', $email);
    $result = $this->db->single();
    return $result->number;
  }

  public function checkPasswordMatch($email, $password) {
    $this->db = new Database();
    $this->db->query("SELECT password FROM users WHERE email = :email");
    $this->db->bind(':email', $email);
    $result = $this->db->single();
    $password_verify = password_verify($password, $result->password);
    return $password_verify;
   }

  public function login($email) {
    $this->db = new Database();
    $this->db->query("SELECT name, fingerprint FROM users WHERE email = :email");
    $this->db->bind(':email', $email);
    $result = $this->db->single();

    $_SESSION["name"] = $result->name;
    $_SESSION["id"] = $result->fingerprint;
  }

  public function isLoggedIn($sessionID, $sessionName): bool {
    if (isset($sessionID) && isset($sessionName)) {
      return true;
    }
    else {
      return false;
    }
  }

  public function logout() {
    // Unset all of the session variables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
    echo '<meta http-equiv="refresh" content="0;url=index.php?page=login" />';
  }

}
?>
