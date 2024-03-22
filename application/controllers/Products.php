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
    $category = $_GET['category'];
    $redirectURL = $this->_getRedirectURL($page, $category);
    redirect($redirectURL, 'redirect');
  }

  public function getProducts($page = 1) {
    $params = ['page' => $page];
    $category = $_GET['category'];
    $url = 'http://' . $_SERVER['SERVER_NAME'] . "/api/products/{$page}?categories={$category}";

    $response = $this->_request($url);
    $params['data'] = json_decode($response, true);

    $this->render($params);
  }

  private function _getRedirectURL($page, $category) {
    return "http://" . $_SERVER["SERVER_NAME"] . "/products/{$page}?category={$category}";
  }

  // private function _request($url) {
  //   $ch = curl_init();
  //   curl_setopt($ch, CURLOPT_URL, $url);
  //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
  //   $response = curl_exec($ch);
  //   curl_close($ch);
  //   return $response;
  // }
}
