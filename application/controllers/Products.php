<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends BS_Controller {

  public function __construct() {
    $pageTitle = 'Products';
    parent::__construct($pageTitle);
    $this->load->helper('url');
  }

  public function index() {
    $page = 1;
    $category = null;
    $category = $_GET['category'];
    $redirectURL = $this->_getRedirectURL($page, $category);
    redirect($redirectURL, 'redirect');
  }

  public function getProducts($page = 1) {
    $params = ['page' => $page];
    $category = $_GET['category'];
    $url = 'http://' . $_SERVER['SERVER_NAME'] . "/api/products/{$page}?category={$category}";

    $response = $this->_request($url);
    $params['data'] = json_decode($response, true);

    $this->render($params);
  }

  public function getProductsBySearch($page = 1) {
    $params = ['page' => $page];
    $query = $_GET['query'];
    $this->pageTitle = 'products_by_search';

    $url = 'http://' . $_SERVER['SERVER_NAME'] . "/api/products/search/{$page}?query={$query}";
    var_dump($url);
    $response = $this->_request($url);
    var_dump($response);
    // json decode 하면 데이터가 유실됨
    $params['data'] = json_decode($response, true);

    $this->render($params);
  }

  private function _getRedirectURL($page, $category) {
    return "http://" . $_SERVER["SERVER_NAME"] . "/products/{$page}?category={$category}";
  }
}
