<?php defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

include_once APPPATH . "\utils\auth.php";

class Api extends RestController {
  public function __construct() {
    parent::__construct();
    header('Content-Type: application/json; charset=utf-8');
    $this->load->model('user_model');
  }

  public function index() {
  }

  public function register_post() {
    $auth = $this->_get_user_input();

    // check password
    if (!$auth->check_password()) {
      return $this->response(array(
        'status' => 'failed',
        'message' => '비밀번호가 일치하지 않습니다.',
      ), 400);
    }

    // call register()
    $jsonArray['password'] = $auth->hash_password();
    $this->user_model->register($jsonArray);

    return $this->response(array(
      'status' => 'success',
      'message' => '회원명: ' . $jsonArray['user_id'] . "\n회원가입 되었습니다."
    ), 200);
  }

  public function login_post() {
    // $auth = $this->_get_user_input();

    return $this->response(array(
      'status' => 'success',
      'message' => '로그인 성공'
    ));
  }

  private function _get_user_input() {
    // request body 읽는 부분
    $jsonArray = json_decode(file_get_contents('php://input'), true);
    $auth = new Auth($jsonArray);
    return $auth;
  }
}
