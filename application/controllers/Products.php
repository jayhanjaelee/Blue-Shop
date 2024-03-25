<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends BS_Controller {

  public function __construct() {
    $pageTitle = 'Products';
    parent::__construct($pageTitle);
    $this->load->helper('url');
    $this->load->model('product_model');
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
    $params['query'] = $_GET['query'];
    $this->pageTitle = 'products_by_search';

    $limit = 6;
    $offset = ($page - 1) * $limit;

    $products = $this->product_model->get_products_by_search($params['query'], $limit, $offset);
    $count = $this->product_model->get_products_count($params, $limit, $offset);
    $params['data'] = $products;
    $params['count'] = $count;

    $this->render($params);
  }

  private function _getRedirectURL($page, $category) {
    return "http://" . $_SERVER["SERVER_NAME"] . "/products/{$page}?category={$category}";
  }
}