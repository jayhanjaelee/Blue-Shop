<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller {

  public function __construct() {
    $page = 'product';
    parent::__construct($page);
  }

  public function index() {
    $this->render();
  }

  public function get($id) {
    $params = ['id' => $id];
    $this->render($params);
  }
}