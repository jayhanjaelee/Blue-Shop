<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends BS_Controller {

  public function __construct() {
    $pageTitle = 'Product';
    parent::__construct($pageTitle);
  }

  public function index() {
    $this->render();
  }

  public function getProduct($id) {
    $params = ['id' => $id];
    $this->render($params);
  }
}
