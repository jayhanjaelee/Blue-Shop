<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth {
  private $user_id;
  private $password;
  private $re_password;
  private $hash_password;

  public function __construct($params) {
    $this->user_id = $params['user_id'];
    $this->password = $params['password'];
    $this->re_password = $params['re_password'];
  }

  public function check_password() {
    return $this->password === $this->re_password;
  }

  public function hash_password() {
    $this->hash_password = password_hash($this->password, PASSWORD_BCRYPT);
    return $this->hash_password;
  }

  public function verify_password() {
    return password_verify($this->password, $this->hash_password);
  }
}
