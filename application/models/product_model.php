<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model {
  private $table = 'products';
  function __construct() {
    parent::__construct();
  }

  function get_products($cid = 1, $limit = 6, $offset = 0) {
    $sql = "SELECT * FROM {$this->table} WHERE category_id = {$cid} LIMIT {$limit} OFFSET {$offset};";

    $products = $this->db->query($sql)->result();
    return $products;
  }

  function get_latest_products() {
    $sql = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 4;";

    $products = $this->db->query($sql)->result();
    return $products;
  }

  function get_products_by_search($query, $limit = 6, $offset = 0) {
    $sql = "SELECT * FROM {$this->table} WHERE name LIKE '%" .  $this->db->escape_like_str($query) . "%' LIMIT {$limit} OFFSET {$offset};";
    $products = $this->db->query($sql)->result();
    return $products;
  }

  // function get_products_count($cid = 1, $query) {
  function get_products_count($params) {
    if (isset($params['cid'])) {
      $sql = "SELECT count(*) as products_count FROM {$this->table} WHERE category_id = {$params['cid']};";
    }

    if (isset($params['query'])) {
      $sql = "SELECT count(*) as products_count FROM {$this->table} WHERE name LIKE '%" .  $this->db->escape_like_str($params['query']) . "%';";
    }

    $count = $this->db->query($sql)->row();
    return $count;
  }

  function get($product_id) {
    $sql = "SELECT * FROM {$this->table} WHERE id = {$product_id};";

    $product = $this->db->query($sql)->row();
    return $product;
  }

  function update_stock($pid, $product_count) {
    $sql = "UPDATE {$this->table} SET stock = stock - {$product_count} WHERE id = {$pid};";
    $result = $this->db->query($sql);
    if (!$result) {
      $this->db->error('stock update is failed.');
    }
    return $result;
  }
}
