<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller {

  public function __construct() {
    $pageTitle = 'Products';
    parent::__construct($pageTitle);
  }

  public function index() {
    $this->getProducts(1);
  }

  public function getProducts($pageNum = 1) {
    $params = ['page' => $pageNum];
    $this->render($params);
  }
}