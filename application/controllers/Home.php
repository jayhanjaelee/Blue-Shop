<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller {

  public function __construct() {
    $pageTitle = 'Home';
    parent::__construct($pageTitle);
  }

  public function index() {
    $this->render();
  }
}