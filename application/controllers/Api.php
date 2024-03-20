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

  public function user_post() {
    // request body 읽는 부분
    $jsonArray = json_decode(file_get_contents('php://input'), true);
    $auth = new Auth($jsonArray);

    // check password
    if (!$auth->check_password()) {
      return $this->response(array(
        'status' => 'failed',
        'message' => '입력한 비밀번호가 서로 다릅니다.',
      ), 400);
    }

    // call register()
    $jsonArray['password'] = $auth->hash_password();
    $this->user_model->register($jsonArray);

    return $this->response(array(
      'status' => 'success',
      'message' => '회원명: ' . $jsonArray['user_id'] . "\n회원가입되었습니다."
    ), 200);
  }

  public function user_get() {
    echo 'hello, user get<br>';
    $r = $this->user_model->getUsers();
  }
}
