<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller {

  public function __construct() {
    $page = 'login';
    parent::__construct($page);
  }

  public function index() {
    $this->render();
  }
}