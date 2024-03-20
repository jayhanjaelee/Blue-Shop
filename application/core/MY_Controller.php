<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  public $pageTitle = 'Home';

  public function __construct($_pageTitle) {
    parent::__construct();
    $this->_connectDB();
    $this->pageTitle = $_pageTitle;
  }

  public function render($params = null) {
    $this->load->view('templates/header', array('title' => $this->pageTitle));
    if (!empty($params)) {
      $this->load->view($this->pageTitle, $params);
    } else {
      $this->load->view($this->pageTitle);
    }
    $this->load->view('templates/footer');
  }

  private function _connectDB() {
    if ($this->db->initialize() === FALSE) {
      die('not connected');
    }
  }
}
