<?php defined('BASEPATH') or exit('No direct script access allowed');
function check_password($password, $re_password) {
  return $password === $re_password;
}

function hash_password($password) {
  $hash_password = password_hash($password, PASSWORD_BCRYPT);
  return $hash_password;
}

function verify_password($password, $hash_password) {
  return password_verify($password, $hash_password);
}
