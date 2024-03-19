<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends My_Controller {

  public function __construct() {
    $page = 'Register';
    parent::__construct($page);
  }

  public function index() {
    $this->render();
  }
}