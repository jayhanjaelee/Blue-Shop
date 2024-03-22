<?php defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

include_once APPPATH . '\libraries\response.php';

class Api extends RestController {
  public function __construct() {
    parent::__construct();
    header('Content-Type: application/json; charset=utf-8');
    $this->load->model('user_model');
    $this->load->helper('auth_helper');
  }

  public function index() {
  }

  public function check_duplicate_post() {
    $input_data = $this->_get_user_input();
    $user = $this->user_model->get_insensitive_info($input_data['user_id']);

    // 사용가능한 아이디
    if (!$user) {
      return $this->response(
        res['user_id_available']['res'],
        res['user_id_available']['code'],
      );
    }

    // 중복 아이디
    return $this->response(
      res['user_already_exists']['res'],
      res['user_already_exists']['code'],
    );
  }

  public function register_post() {
    $input_data = $this->_get_user_input();
    $user = $this->user_model->get($input_data['user_id']);
    if ($user !== null) {
      return $this->response(
        res['user_already_exists']['res'],
        res['user_already_exists']['code'],
      );
    }

    // check password
    if (!check_password($input_data['password'], $input_data['re_password'])) {
      return $this->response(
        res['fail_password_check']['res'],
        res['fail_password_check']['code'],
      );
    }

    // call register()
    $input_data['password'] = hash_password($input_data['password']);
    $result = $this->user_model->register($input_data);

    if (!$result) {
      return $this->response(
        res['fail_register']['res'],
        res['fail_register']['code']
      );
    }

    return $this->response(
      res['success_register']['res'],
      res['success_register']['code']
    );
  }

  public function login_post() {
    $input_data = $this->_get_user_input();

    $user = $this->user_model->get($input_data['user_id']);

    // user id does not exists.
    if ($user === null) {
      return $this->response(
        res['user_not_exists']['res'],
        res['user_not_exists']['code'],
      );
    }

    if (!verify_password($input_data['password'], $user->password)) {
      return $this->response(
        res['invalid_password']['res'],
        res['invalid_password']['code']
      );
    }

    // session 발급해서 리턴으로 주어야함 혹은 jwt 사용
    $payload = array(
      'user_id' => $user->user_id,
      'name' => $user->name,
      'point' => $user->point
    );

    // 로그인 성공했을 때 session 설정.
    $this->session->set_userdata($payload);

    return $this->response(
      res['success_login']['res'],
      res['success_login']['code']
    );
  }

  public function logout_get() {
    $this->session->sess_destroy();
    return $this->response(
      res['success_logout']['res'],
      res['success_logout']['code'],
    );
  }

  private function _get_user_input() {
    // request body 읽는 부분
    $data = json_decode(file_get_contents('php://input'), true);
    return $data;
  }
}
