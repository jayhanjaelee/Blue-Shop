<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends BS_Controller {

  public function __construct() {
    $pageTitle = 'Product';
    parent::__construct($pageTitle);
    $this->load->helper('url');
  }

  public function index() {
    $this->render();
  }

  public function getProduct($pid) {
    $url = $this->_getBaseURL() . "api/product/{$pid}";
    $product = $this->_request($url);
    $params = array(
      'id' => $pid,
      'product' => json_decode($product, true),
    );

    $this->render($params);
  }

  private function _getBaseURL() {
    return 'http://' . $_SERVER['SERVER_NAME'] . '/';
  }
}
