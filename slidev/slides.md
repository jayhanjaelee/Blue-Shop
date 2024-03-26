---
# try also 'default' to start simple
theme: seriph
# random image from a curated Unsplash collection by Anthony
# like them? see https://unsplash.com/collections/94734566/slidev
# background: https://cover.sli.dev
background: /imgs/theme.avif
# some information about your slides, markdown enabled
title: Blue Shop
class: text-center
# https://sli.dev/custom/highlighters.html
highlighter: shiki
# https://sli.dev/guide/drawing
drawings:
  persist: false
# slide transition: https://sli.dev/guide/animations#slide-transitions
transition: slide-left
# enable MDC Syntax: https://sli.dev/guide/syntax#mdc-syntax
mdc: true
lineNumbers: true

---

# Blue Shop

<div class="pt-12">
  <span @click="$slidev.nav.next" class="px-2 py-1 rounded cursor-pointer" hover="bg-white bg-opacity-10">
    Press Space for next page <carbon:arrow-right class="inline"/>
  </span>
</div>

<div class="abs-br m-6 flex gap-2">
  <button @click="$slidev.nav.openInEditor()" title="Open in Editor" class="text-xl slidev-icon-btn opacity-50 !border-none !hover:text-white">
    <carbon:edit />
  </button>
  <a href="https://github.com/jayhanjaelee/blue-shop" target="_blank" alt="GitHub" title="Open in GitHub"
    class="text-xl slidev-icon-btn opacity-50 !border-none !hover:text-white">
    <carbon-logo-github />
  </a>
</div>

<!-- 안녕하세요 코멘트 테스트입니다. -->

---

# Blue-Shop

개발 : 이한재

쇼핑몰 웹서비스 개인 프로젝트

<br>

### 기간 : 3/17 ~ 3/25 (약 7일 소요)

<br>

### 기술 스택 

<br>

- php 7.4.33 
- code igniter 3
- mysql 8 
- javascript, css

---

# 발표 순서

1. 프로젝트 설정
2. 기능 시연
3. 기능 구현

<br>

# 기능 구현 목록

1. 스타일
2. 회원가입 & 중복 검사
3. 로그인 & 로그아웃
4. 상품 목록 조회
5. 상품 목록 Pagination
6. 단일 상품 조회
7. 상품 구매
8. 상품 검색

---

<div style="display: flex; min-height: 50vh; justify-content: center; align-items: center;">
  <h1>프로젝트 설정</h1>
</div>

---

# apache 설정

### vhosts.conf

```
<VirtualHost 127.0.0.1:80>
    ServerName localhost
    DocumentRoot "/Users/jay/Desktop/Blue-Shop"
    <Directory "/Users/jay/Desktop/Blue-Shop">
    Options Indexes FollowSymLinks
    AllowOverride all
    Require local
    </Directory>
</VirtualHost>
```

<br>

### .htaccess

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

---

<div style="display: flex; min-height: 50vh; justify-content: center; align-items: center;">
  <h1>기능 구현</h1>
</div>

---

# 1. 스타일

### 폴더 구조

<br>

```
static/css
├── layout
│   ├── carousel.css
│   ├── footer.css
│   ├── header.css
│   ├── layout.css
│   ├── login.css
│   ├── new_products_section.css
│   ├── product.css
│   ├── products.css
│   └── register.css
├── reset.css
├── style.css
├── typpograph.css
├── utils.css
└── vars.css

2 directories, 14 files
```

---

# style.css

```css {all}{maxHeight:'400px'}
@layer reset, typograph, utils;
@layer layout;
@layer layout.header, layout.carousel, layout.new_products_section, layout.footer;
@layer layout.login;
@layer layout.register;
@layer layout.products;
@layer layout.product;

@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap');
@import url(./vars.css);
@import url(./reset.css);
@import url(./typpograph.css);
@import url(./utils.css);
@import url(./layout/layout.css);

/* Index Page */
@import url(./layout/header.css);
@import url(./layout/carousel.css);
@import url(./layout/new_products_section.css);
@import url(./layout/footer.css);

/* Login Page */
@import url(./layout/login.css);

/* Register Page */
@import url(./layout/register.css);

/* Products Page */
@import url(./layout/products.css);

/* Product Page */
@import url(./layout/product.css);
```

---

# vars.css

### 필요한 색상 변수로 관리

<br>

```css {all}{maxHeight:'400px'}
:root {
  --orange: #FA6230;
  --lightblue: #D1E8F7;
  --blue57: #5780E2;
  --blue31: #3168AD;
  --blue33: #3361E0;
  --lightgray: #eaeaea;
  --lightgray2: #efeaea;
  --graycd: #cdcbcb;
  --gray9b: #9B9B9B;
  --gray55: #555555;
  --grayb5: #B5B5B5;
  --graya9: #A9A9A9;
  --white: #F7F7F7;
  --darkwhite: #f7f7f7d9;
  --black33: #333333;
}
```

---

# layout

#### 마켓컬리 레이아웃 참고

![figma](/imgs/figma.png)

---

# 프로젝트 전체 폴더 구조

controllers, views, models

```sh {all}{maxHeight:'400px'}
./application/controllers
├── Api.php
├── Home.php
├── Login.php
├── Product.php
├── Products.php
└── Register.php

1 directory, 6 files

./application/views
├── components
│   ├── carousel.php
│   ├── pagination.php
│   └── search_pagination.php
├── home.php
├── login.php
├── product.php
├── products.php
├── products_by_search.php
├── register.php
└── templates
    ├── footer.php
    └── header.php

6 directories, 24 files

./application/models
├── product_model.php
└── user_model.php

1 directory, 2 files
```

---

# javascript

```sh
static/js
├── constants.js
├── pagination.js
├── product.js
├── user
│   ├── login.js
│   ├── logout.js
│   └── register.js
└── utils.js

2 directories, 7 files
```

---

# DB Schema

```sql {1-11|13-21|23-29|31-35|37-44|all}{maxHeight:'400px'}
-- users
CREATE TABLE `users` (
	`id`	integer	NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`user_id`	varchar(12)	UNIQUE NOT NULL,
	`password`	varchar(255)	NOT NULL,
	`name`	varchar(6)	NOT NULL,
	`email`	varchar(255)	UNIQUE NULL,
	`mobile_phone`	varchar(255)	UNIQUE NULL,
	`address`	varchar(255) NULL,
	`point`	INT UNSIGNED	NULL DEFAULT 200000
);

-- products
CREATE TABLE `products` (
	`id`	integer	NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name`	varchar(255)	NULL,
	`price`	decimal(7,0)	NULL,
	`stock`	integer	NULL	DEFAULT 99,
	`image`	varchar(255)	NULL,
	`category_id`	integer	NOT NULL
);

-- product foreign key
ALTER TABLE `products` ADD CONSTRAINT `FK_categories_TO_products_1` FOREIGN KEY (
	`category_id`
)
REFERENCES `categories` (
	`id`
);

-- 카테고리
CREATE TABLE `categories` (
	`id`	integer	NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name`	varchar(255)	NULL
);

-- 세션 테이블
CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);
```

---

# Router

```php {all}{maxHeight:'400px'}
// Custom Routing
$route['/'] = 'home';

$route['register'] = 'register';

$route['login'] = 'login';

$route['products'] = 'products';
$route['products/(:num)'] = 'products/getProducts/$1';

$route['product'] = 'product';
$route['product/(:num)'] = 'product/getProduct/$1';

// search results
$route['products/search'] = 'products/getProductsBySearch/$1';
$route['products/search/(:num)'] = 'products/getProductsBySearch/$1';

// API
$route['api/user/register'] = 'api/register';
$route['api/user/login'] = 'api/login';
$route['api/user/logout'] = 'api/logout';
$route['api/user/check/duplicate'] = 'api/check_duplicate';

$route['api/prouducts'] = 'api/products';
$route['api/prouducts/(:num)'] = 'api/products/$1';

$route['api/products/search'] = 'api/products_search';
$route['api/products/search/(:num)'] = 'api/products_search/$1';

$route['api/product'] = 'api/product';
$route['api/product/(:num)'] = 'api/product/$1';
$route['api/product/buy/(:num)'] = 'api/product_buy/$1';
```
---

# BS_Controller

```php {1|2|4-8|10-30|32-41|all}{maxHeight:'400px'}
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

    // user 정보 session 에서 가져와서 header 에 로그인 정보 보여줌
    $this->load->view(
      'templates/header',
      array('title' => $this->pageTitle, 'user_info' => $user_info)
    );

    // params 있으면 view 로드할 때 data binding.
    if (!empty($params)) {
      $this->load->view($this->pageTitle, $params);
    } else {
      $this->load->view($this->pageTitle);
    }

    $this->load->view('templates/footer');
  }

  // view controller 단에서 api 요청하기 위한 메서드 _request($url)
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
```

---

<div style="display: flex; min-height: 50vh; justify-content: center; align-items: center;">
  <h1>기능 시연</h1>
</div>

---

# 2. 회원가입

### API: http://localhost/api/user/register POST

### request body

```json {monaco}
{
    "user_id": "hanjaelee",
    "password": "1234",
    "re_password": "1234",
    "address" : "my address",
    "email": "jay@hanjaelee.com",
    "mobile_phone": "01099769307"
}
```

### response

```json {1-5|7-14|all}{maxHeight:'400px'}
// 회원가입 성공 200 OK
{
    "status": "success_then_redirect",
    "message": "회원가입 되었습니다."
}

// 이미 존재하는 유저 409 conflict
{
    "status": "success",
    "message": "이미 존재하는 유저입니다.\n다른 아이디를 사용해주세요."
}
```
---

# controllers/api.php

### register_post() method

```php {all}{maxHeight:'400px'}
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
```

---

# 중복검사

### API: http://localhost/api/user/check/duplicate POST

### request body

```json {monaco}{maxHeight:'400px'}
{
    "user_id": "hanjaelee"
}
```

### response

```json {1-5|7-11|all}{maxHeight:'400px'}
// 200 ok
{
    "status": "success",
    "message": "사용가능한 아이디 입니다."
}

// 409 conflict
{
    "status": "success",
    "message": "이미 존재하는 유저입니다.\n다른 아이디를 사용해주세요."
}
```

---

# controllers/api.php

### check_duplicate_post()

```php {2-4|6-12|14-18|all}{maxHeight:'400px'}
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
```

---

# 3. 로그인 & 로그아웃

### API: http://localhost/api/user/login GET

### request body

```json {monaco}{maxHeight:'400px'}
{
    "user_id": "hanjaelee",
    "password": "1234"
}
```

### response

```json {1-5|6-10|12-17|all}{maxHeight:'400px'}
// 로그인 성공 200 OK
{
    "status": "success_then_redirect",
    "message": "로그인 되었습니다."
}

// 존재하지 않는 사용자 400 Bad Request
{
  "status": "fail",
  "message": "존재하지 않는 사용자입니다."
}

// 비밀번호 불일치 401 Unauthorized
{
    "status": "fail",
    "message": "패스워드가 일치하지 않습니다."
}
```

---

# controllers/api.php

### login_post() method

```php {1-5|7-10|12-18|20-25|27-41|all}{maxHeight:'400px'}
private function _get_user_input() {
  // request body 읽는 부분
  $data = json_decode(file_get_contents('php://input'), true);
  return $data;
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

```

---

# 로그아웃

### API: http://localhost/api/user/logout GET

### response

```json {all}
{
    "status": "success_then_redirect",
    "message": "로그아웃 되었습니다."
}
```

### controllers/api.php

```php {2|3-6}{maxHeight:'400px'}
public function logout_get() {
  $this->session->sess_destroy();
  return $this->response(
    res['success_logout']['res'],
    res['success_logout']['code'],
  );
}
```

---

# 4. 상품 목록 조회

### API: localhost/api/products/{page}?category=fashion GET

### request
```txt {monaco}{maxHeight:'400px'}
Query Params

?category=fashion
?category=food
?category=digital
```

---

# 상품 목록 조회 response 

```json {all}{maxHeight:'450px'}
{
    "products": [
        {
            "id": "1",
            "name": "fashion item 01",
            "price": "43700",
            "stock": "92",
            "image": "1.avif",
            "category_id": "1"
        },
        {
            "id": "2",
            "name": "fashion item 02",
            "price": "72700",
            "stock": "99",
            "image": "10.avif",
            "category_id": "1"
        },
        {
            "id": "3",
            "name": "fashion item 03",
            "price": "73500",
            "stock": "99",
            "image": "1.avif",
            "category_id": "1"
        },
        {
            "id": "4",
            "name": "fashion item 04",
            "price": "97400",
            "stock": "99",
            "image": "3.avif",
            "category_id": "1"
        },
        {
            "id": "5",
            "name": "유니클로 데님자켓",
            "price": "25100",
            "stock": "99",
            "image": "6.avif",
            "category_id": "1"
        },
        {
            "id": "6",
            "name": "fashion item 06",
            "price": "98700",
            "stock": "99",
            "image": "10.avif",
            "category_id": "1"
        }
    ],
    "count": "300"
}

```

---

# controllers/api.php

### 상품목록 조회 

### categories 상수

```php {all}
define('categories', array(
  'fashion' => 1,
  'food' => 2,
  'digital' => 3,
));
```

```php {2-9|11-14|16-18|20-26|28-34|all}{maxHeight:'400px'}
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
```
---

# 5. 상품 목록 Pagination

### views/components/pagination.php

```php {2-4|6|8-12|14-18|20-25|all}{maxHeight:'450px'}
<?php
$page_count_at_once = 9; // 한 화면에 보여질 페이지 수
$products_count_at_once = 6; // 한 화면에 보여질 상품 수
$current_page = $this->uri->segment(2); // 현재 페이지

$max_page = ceil($data['count'] / $products_count_at_once); // 최대 페이지 개수

// page_group 어떤 페이지 번호가 속한 그룹의 값
// 1 page group -> 1,2,3,4,5,6,7,8,9
// 2 page group -> 10,11,12,13,14,15,16,17,18,19
// 3 page group -> 20,21,22,23,24,25,26,27,28,29
$page_group = ceil($current_page / $page_count_at_once); // 현재 페이지 그룹

// 한 화면에 보여지는 페이지 중 첫번째 페이지 
// 1 page group -> 1
// 2 page group -> 10
// 3 page group -> 20
$first_page = (($page_group - 1) * $page_count_at_once) + 1;

// 한 화면에 보여지는 페이지 중 마지막 페이지
// 1 page group -> 9
// 2 page group -> 19
// 3 page group -> 29
$last_page = $page_group * $page_count_at_once;
?>
```

---

# 6. 단일 상품 조회

### API: http://localhost/api/product/{id} GET

### request url

```txt {monaco}
http://localhost/api/product/1
```

### response

```json {all}{maxHeight:'400px'}
// 200 ok
{
    "id": "1",
    "name": "fashion item 01",
    "price": "43700",
    "stock": "94",
    "image": "1.avif",
    "category_id": "1"
}
```

---

# controllers/api.php

### product_get() method

```php {2-3|5-11|13-14|all}{maxHeight:'400px'}
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
```

---

# 7. 상품 구매

### API: http://localhost/api/product/buy/1

### cookie

```txt
ci_session=5b4ltd1e01021rs7km0cu120j49nc31m; Path=/; HttpOnly;
```

### request body

```json {monaco}{maxHeight:'400px'}
{
    "product_count": 1,
    "price": 43700
}

```

### response

```json {1-5|7-11|all}{maxHeight:'400px'}
// 200 ok
{
  "status": "success_then_reload",
  "message": "상품 구매가 완료되었습니다."
}

// 400 bad request (포인트 부족)
{
    "status": "fail",
    "message": "잔여 포인트가 부족합니다."
}
```

---

# controllers/api.php

### product_buy_post($product_id) method

```php {2-4|6-10|12-19|21-27|30-36|all}{maxHeight:'400px'}
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
```

---

# 8. 상품 검색

### API: http://localhost/api/products/search/{page}?query={query}

```txt
Query Params
?query=item 1
?query=키보드
?query=갤럭시탭
```

### response

```json {all}{maxHeight:'400px'}
{
    "products": [
        {
            "id": "102",
            "name": "fashion item 102",
            "price": "18400",
            "stock": "99",
            "image": "8.avif",
            "category_id": "1"
        },
        {
            "id": "103",
            "name": "fashion item 103",
            "price": "11800",
            "stock": "99",
            "image": "8.avif",
            "category_id": "1"
        },
        {
            "id": "104",
            "name": "fashion item 104",
            "price": "92400",
            "stock": "99",
            "image": "9.avif",
            "category_id": "1"
        },
        {
            "id": "105",
            "name": "fashion item 105",
            "price": "87700",
            "stock": "99",
            "image": "8.avif",
            "category_id": "1"
        },
        {
            "id": "106",
            "name": "fashion item 106",
            "price": "13900",
            "stock": "99",
            "image": "6.avif",
            "category_id": "1"
        },
        {
            "id": "107",
            "name": "fashion item 107",
            "price": "67200",
            "stock": "99",
            "image": "10.avif",
            "category_id": "1"
        }
    ],
    "count": "131"
}
```

---

# controllers/api.php

### producst_search_get($page) method

```php {2-6|8-11|13-15|17-23|all}{maxHeight:'400px'}
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
```

---

<div style="display: flex; min-height: 50vh; justify-content: center; align-items: center;">
  <h1>감사합니다.</h1>
</div>

---
