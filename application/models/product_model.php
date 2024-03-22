<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model {
  private $table = 'products';
  function __construct() {
    parent::__construct();
  }

  function getProducts($cid = 1, $limit = 6, $offset = 0) {
    $sql = "SELECT * FROM {$this->table} WHERE category_id = {$cid} LIMIT {$limit} OFFSET {$offset};";

    $products = $this->db->query($sql)->result();

    return $products;
  }

  function getProductsCount($cid = 1) {
    $sql = "SELECT count(*) as products_count FROM {$this->table} WHERE category_id = {$cid};";

    $count = $this->db->query($sql)->row();
    return $count;
  }

  function get($product_id) {
    $sql = "SELECT * FROM {$this->table} WHERE id = {$product_id};";

    $product = $this->db->query($sql)->row();
    return $product;
  }
}
