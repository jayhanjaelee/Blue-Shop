<?php defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

if (PHP_OS == 'Darwin') {
  include_once APPPATH . '/libraries/response.php';
} else {
  include_once APPPATH . '\libraries\response.php';
}

class Api extends RestController {
  public function __construct() {
    parent::__construct();
    header('Content-Type: application/json; charset=utf-8');
    $this->load->model('user_model');
    $this->load->model('product_model');
    $this->load->helper('auth_helper');
  }

  public function index() {
  }

  // user start
  public function check_duplicate_post() {
    // 유저 조회
    $input_data = $this->_get_user_input();
    $user = $this->user_model->get_insensitive_info($input_data['user_id']);

    // 유저가 존재하지 않을 경우 사용가능한 아이디
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

    // 유저 정보 조회 후 존재하면 에러 리턴
    if ($user !== null) {
      return $this->response(
        res['user_already_exists']['res'],
        res['user_already_exists']['code'],
      );
    }

    // input 비밀번호, 비밀번호 확인 검사
    if (!check_password($input_data['password'], $input_data['re_password'])) {
      return $this->response(
        res['fail_password_check']['res'],
        res['fail_password_check']['code'],
      );
    }

    // 비밀번호 일치하면 회원가입 성공
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

    // session 발급해서 리턴으로 주어야함 
    $payload = array(
      'user_id' => $user->user_id,
      'name' => $user->name,
      'point' => $user->point,
      'logged_in' => true
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
  // user end

  private function _get_user_input() {
    // request body 읽는 부분
    $data = json_decode(file_get_contents('php://input'), true);
    return $data;
  }

  // products start
  public function products_get($page = 1) {
    // 카테고리 유효성 검사
    $is_valid_category = in_array($_GET['category'], array_keys(categories), true);
    if (!$is_valid_category) {
      return $this->response(
        res['invalid_category']['res'],
        res['invalid_category']['code']
      );
    }

    // 기본 property 설정 (카테고리 id, limit, offset)
    $cid = categories[$_GET['category']];
    $limit = 6;
    $offset = ($page - 1) * $limit;

    // db products 테이블 에서 products, counts 조회
    $products = $this->product_model->get_products($cid, $limit, $offset);
    $count = $this->product_model->get_products_count(array('cid' => $cid));

    // 페이지가 더이상 없을 경우 에러리턴
    if ($products === null) {
      return $this->response(
        res['no_more_products']['res'],
        res['no_more_products']['code']
      );
    }

    // 성공시 producst 배열에 저장하여 리턴
    $data = array(
      'products' => $products,
      'count' => $count->products_count
    );

    return $this->response($data, 200);
  }

  public function products_search_get($page = 1) {
    // query 설정
    $query = '';
    if (isset($_GET['query'])) {
      $query = $_GET['query'];
    }

    // limit, offset, query 공백 디코딩.
    $limit = 6;
    $offset = ($page - 1) * $limit;
    $query = urldecode($query); // %20 -> whitespace

    // producst db 에서 조회
    $products = $this->product_model->get_products_by_search($query, $limit, $offset);
    $count = $this->product_model->get_products_count(array("query" => $query));

    // 성공시 producst, count 반환
    $data = array(
      'products' => $products,
      'count' => $count->products_count
    );

    return $this->response($data, 200);
  }

  public function product_get($product_id) {
    // db products 테이블에서 id 로 상품 조회
    $product = $this->product_model->get($product_id);

    // 상품 존재하지 않을 경우 에러 리턴
    if ($product === null) {
      return $this->response(
        res['not_exists_product']['res'],
        res['not_exists_product']['code'],
      );
    }
    // 성공시 상품 리턴
    return $this->response($product, 200);
  }
  // products end

  public function product_buy_post($product_id) {
    // 유저 입력 설정
    $input_data = $this->_get_user_input();
    $data = $input_data;

    // 상품 구매가 가능한 포인트가 있는 유저인지 확인하기 위해 users 테이블에서 유저정보 조회
    $user_info = $this->user_model->get_insensitive_info($this->session->userdata['user_id']);
    $data['user_id'] = $user_info->user_id;
    $data['name'] = $user_info->name;
    $data['point'] = intval($user_info->point);

    // 상품 재고 에러
    $result = $this->product_model->update_stock($product_id, $data['product_count']);
    if (!$result) {
      $this->response(
        res['no_more_stock']['res'],
        res['no_more_stock']['code'],
      );
    }

    // 유저 포인트 에러
    $result = $this->user_model->update_point($data['user_id'], $data['price']);
    if (!$result) {
      $this->response(
        res['not_enough_point']['res'],
        res['not_enough_point']['code'],
      );
    }

    // success
    return $this->response(
      $this->response(
        res['success_buy_product']['res'],
        res['success_buy_product']['code'],
      )
    );
  }
}
