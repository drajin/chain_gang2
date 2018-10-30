<?php

class Admin extends DatabaseObject {
    
   
  static protected $table_name = 'admins';  
  static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'username', 'hashed_password'];
 
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $username;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  
  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
   // Caution: allows private/protected properties to be set
    // foreach($args as $k => $v) {
    //   if(property_exists($this, $k)) {
    //     $this->$k = $v;
    //   }
    // }
  }

  public function name() {
      return $this->first_name . " " . $this->last_name . " - " . $this->username;
  }
  
  protected function validate() {
      $this->errors = [];
      if(is_blank($this->first_name)) {
            $this->errors[] = "Name cannot be blank.";
        }
      if($this->password === $this->confirm_password) {
        } else {
            $this->errors[] = "Password must match.";
        } 
        return $this->errors;
    }

}

?>
