<?php
defined('BASEPATH') or exit('No direct script access allowed');

// custom status code
$success = 'success';
$success_then_redirect = 'success_then_redirect';
$success_then_reload = 'success_then_reload';
$fail = 'fail';

define('res', array(
  // success
  'success_register' => create_reseponse($success_then_redirect, '회원가입 되었습니다.', 200),
  'success_login' => create_reseponse($success_then_redirect, '로그인 되었습니다.', 200),
  'success_logout' => create_reseponse($success_then_redirect, '로그아웃 되었습니다.', 200),
  'success_get_insensitive_info' => create_reseponse($success, '유저정보 요청 성공.', 200),
  'user_already_exists' => create_reseponse($success, "이미 존재하는 유저입니다.\n다른 아이디를 사용해주세요.", 409),
  'user_id_available' => create_reseponse($success, "사용가능한 아이디 입니다.", 200),
  'success_get_user_info' => create_reseponse($success, '유저 정보 요청에 성공했습니다.', 200),
  'success_buy_product' => create_reseponse($success_then_reload, '상품 구매가 완료되었습니다.', 200),
  'success' => create_reseponse($success, '요청 성공.', 200),

  // fail
  'fail_password_check' => create_reseponse($fail, '비밀번호가 일치하지 않습니다.', 400),
  'fail_register' => create_reseponse($fail, '회원가입 실패하였습니다.', 400),
  'user_not_exists' => create_reseponse($fail, '존재하지 않는 사용자입니다.', 400),
  'invalid_password' => create_reseponse($fail, '패스워드가 일치하지 않습니다.', 401),
  'fail_get_user_info' => create_reseponse($fail, '유저 정보 조회에 실패하였습니다.', 400),
  'invalid_category' => create_reseponse($fail, '존재하지 않는 카테고리 입니다.', 400),
  'no_more_products' => create_reseponse($fail, '상품이 더이상 존재하지 않습니다.', 400),
  'no_more_stock' => create_reseponse($fail, "상품 재고가 부족하여 구매가 불가능합니다.", 400),
  'not_enough_point' => create_reseponse($fail, '잔여 포인트가 부족합니다.', 400),
  'not_exists_product' => create_reseponse($fail, '존재하지 않는 상품아이디 입니다.', 400)
));

function create_reseponse(string $status, string $message, int $code) {
  $response = array(
    'res' => array(
      'status' => $status,
      'message' => $message
    ),
    'code' => $code
  );

  return $response;
}
