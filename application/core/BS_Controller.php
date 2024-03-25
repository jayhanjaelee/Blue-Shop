<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BS_Controller extends CI_Controller {
  public $pageTitle = 'Home';

  public function __construct($_pageTitle) {
    parent::__construct();
    $this->pageTitle = $_pageTitle;
    $this->load->model('user_model');
  }

  public function render($params = null) {
    $user_info = null;
    if ($this->session->userdata('user_id')) {
      $user_info = $this->user_model->get_insensitive_info($this->session->userdata['user_id']);
    }
    $this->load->view(
      'templates/header',
      array('title' => $this->pageTitle, 'user_info' => $user_info)
    );
    if (!empty($params)) {
      $this->load->view($this->pageTitle, $params);
    } else {
      $this->load->view($this->pageTitle);
    }
    $this->load->view('templates/footer');
  }

  protected function _request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
  }
}