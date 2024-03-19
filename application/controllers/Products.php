<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller {

  public function __construct() {
    $page = 'products';
    parent::__construct($page);
  }

  public function index() {
    $this->render();
  }
}