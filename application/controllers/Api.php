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
    $is_valid_category = in_array($_GET['category'], array_keys(categories), true);
    if (!$is_valid_category) {
      return $this->response(
        res['invalid_category']['res'],
        res['invalid_category']['code']
      );
    }

    $cid = categories[$_GET['category']];
    $limit = 6;
    $offset = ($page - 1) * $limit;

    $products = $this->product_model->get_products($cid, $limit, $offset);
    $count = $this->product_model->get_products_count(array('cid' => $cid));

    if ($products === null) {
      return $this->response(
        res['no_more_products']['res'],
        res['no_more_products']['code']
      );
    }

    $data = array(
      'products' => $products,
      'count' => $count->products_count
    );

    return $this->response($data, 200);
  }

  public function products_search_get($page = 1) {
    $query = '';
    if (isset($_GET['query'])) {
      $query = $_GET['query'];
    }

    $limit = 6;
    $offset = ($page - 1) * $limit;
    $query = urldecode($query); // %20 -> whitespace

    $products = $this->product_model->get_products_by_search($query, $limit, $offset);
    $count = $this->product_model->get_products_count(array("query" => $query));

    $data = array(
      'products' => $products,
      'count' => $count->products_count
    );

    return $this->response($data, 200);
  }

  public function product_get($product_id) {
    $product = $this->product_model->get($product_id);

    if ($product === null) {
      return $this->response(
        res['not_exists_product']['res'],
        res['not_exists_product']['code'],
      );
    }
    return $this->response($product, 200);
  }
  // products end

  public function product_buy_post($product_id) {
    $input_data = $this->_get_user_input();
    $data = $input_data;
    $product_price = $data['price'];

    // get user info
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
