<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends BS_Controller {

  public function __construct() {
    $pageTitle = 'Login';
    parent::__construct($pageTitle);
  }

  public function index() {
    $this->render();
  }
}
