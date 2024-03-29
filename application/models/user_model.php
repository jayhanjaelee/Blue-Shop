<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {
  private $table = 'users';

  function __construct() {
    parent::__construct();
  }

  function get_users() {
    return $this->db->query("SELECT * FROM {$this->table}")->result();
  }

  function get($user_id) {
    $sql = "SELECT * FROM users WHERE user_id = ?;";
    $user = $this->db->query($sql, array($user_id))->row();
    return $user;
  }

  function update_point($user_id, $product_price) {
    $this->db->db_debug = FALSE;
    $sql = "UPDATE {$this->table} SET point = point - {$product_price} WHERE user_id = '{$user_id}';";
    $result = $this->db->query($sql);
    if (!$result) {
      $this->db->error('user point is out of point.');
    }
    return $result;
  }

  function get_insensitive_info($user_id) {
    $columns = implode(',', ['user_id', 'name', 'point']);
    $sql = "SELECT {$columns} FROM {$this->table} WHERE user_id = ?;";
    $user = $this->db->query($sql, array($user_id))->row();
    if (!$user) {
      return null;
    }
    return $user;
  }

  function register($params) {
    $res = $this->_build_insert_query($params);
    $result = $this->db->query($res['sql'], $res['vals']);
    return $result;
  }

  private function _build_insert_query($params) {
    unset($params['re_password']);

    $keys = [];
    $vals = [];
    $marks = [];

    foreach ($params as $key => $val) {
      array_push($keys, $key);
      array_push($vals, $val);
      array_push($marks, '?');
    }

    $keys = implode(',', $keys);
    $marks = implode(',', $marks);

    $sql = "INSERT INTO users ({$keys}) VALUES ({$marks});";

    $res = array('sql' => $sql, 'vals' => $vals);
    return $res;
  }
}
