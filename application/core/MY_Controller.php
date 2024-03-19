<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  public $page = 'home';

  public function __construct($_page) {
    parent::__construct();
    $this->page = $_page;
  }

  public function render($params = null) {
    $this->load->view('templates/header', array('title' => $this->page));
    if (!empty($params)) {
      $this->load->view($this->page, $params);
    } else {
      $this->load->view($this->page);
    }
    $this->load->view('templates/footer');
  }
}