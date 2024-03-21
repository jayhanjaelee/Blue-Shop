<?php
defined('BASEPATH') or exit('No direct script access allowed');

$success = 'success';
$fail = 'fail';

define('res', array(
  // success
  'success_register' => create_reseponse($success, '회원가입 되었습니다.', 200),
  'success_login' => create_reseponse($success, '로그인 되었습니다.', 200),
  'success_logout' => create_reseponse($success, '로그아웃 되었습니다.', 200),
  'success_get_insensitive_info' => create_reseponse($success, '유저정보 요청 성공.', 200),
  'user_already_exists' => create_reseponse($success, "이미 존재하는 유저입니다.\n다른 아이디를 사용해주세요.", 409),

  // fail
  'fail_password_check' => create_reseponse($fail, '비밀번호가 일치하지 않습니다.', 400),
  'fail_register' => create_reseponse($fail, '회원가입 실패하였습니다.', 400),
  'user_not_exists' => create_reseponse($fail, '존재하지 않는 사용자입니다.', 400),
  'invalid_password' => create_reseponse($fail, '패스워드가 일치하지 않습니다.', 401)
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
