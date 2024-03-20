<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getUsers() {
    return $this->db->query("SELECT * FROM users")->result();
  }

  function get($user_id) {
    return $this->db->get_where('user', array('id' => $user_id))->row();
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
