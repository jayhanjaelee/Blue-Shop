<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller {

  public function __construct() {
    $page = 'home';
    parent::__construct($page);
  }

  public function index() {
    $this->render();
  }
}