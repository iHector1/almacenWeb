<?php
class UserModel extends Model {
  private $username;
  private $password;

  public function __construct() {
    parent::__construct();
    $this->username = '';
    $this->password = '';
  }

  public function save() {
    try {
      $query = $this->prepare('INSERT INTO users (username, password) VALUES(:username, :password)');
      $query->execute([
        'username'  => $this->username, 
        'password'  => $this->password,
      ]);
      return true;
    } catch(PDOException $e){
      echo $e;
      return false;
    }
  }

  public function setUsername($username) {
    $this->username = $username;
  }
  public function setPassword($password) {
    $this->password = $password;
  }
  // HASH
  /* public function setPassword($password, $hash = true){ */ 
  /*     if($hash){ */
  /*         $this->password = $this->getHashedPassword($password); */
  /*     }else{ */
  /*         $this->password = $password; */
  /*     } */
  /* } */
}
?>
