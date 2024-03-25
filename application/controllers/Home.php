<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends BS_Controller {

  public function __construct() {
    $pageTitle = 'Home';
    parent::__construct($pageTitle);
    $this->load->model('product_model');
  }

  public function index() {
    $products = $this->product_model->get_latest_products();
    $params = array('data' => $products);
    $this->render($params);
  }
}
