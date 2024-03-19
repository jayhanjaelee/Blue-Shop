<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller {

  public function __construct() {
    $pageTitle = 'login';
    parent::__construct($pageTitle);
  }

  public function index() {
    $this->render();
  }
}