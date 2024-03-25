<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blue Shop - <?= $title ?></title>
  <link rel="stylesheet" href="/static/css/style.css">
</head>

<body>
  <!-- header start -->
  <div class="header-container">
    <header class="m0auto">
      <div class="header-top">
        <ul class="header-top__user-auth">
          <?php
          if (!($this->session->userdata('user_id'))) {
          ?>
          <li class="header-top__register"><a href="/register">회원가입</a></li>
          <?php
          }
          ?>
          <?php
          if ($this->session->userdata('user_id')) {
          ?>
          <li class="header-top__logout"><a style="cursor: pointer;">로그아웃</a></li>
          <?php
          } else {
          ?>
          <li class="header-top__login"><a href="/login">로그인</a></li>
          <?php
          }
          ?>
        </ul>

      </div>

      <?php
      if ($this->session->userdata('user_id')) {
      ?>
      <div class="header-middle" style="grid-template-columns: 1fr 2fr 0.8fr 0.5fr;">
        <?php
      } else {
        ?>
        <div class="header-middle">
          <?php
        }
          ?>
          <div class="header-middle__logo">
            <a href="/"><img src="/static/imgs/logo-dark.png" alt="BLUE-SHOP"></a>
          </div>
          <div class="header-middle__search-form-container">
            <form action="/products/search/1" method="GET">
              <input type="text" name="query" placeholder="검색어를 입력해주세요">
              <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.2rem" height="2.2rem" fill="currentColor"
                  class="bi bi-search" viewBox="0 0 16 16">
                  <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
              </button>
            </form>
          </div>
          <?php
          if ($this->session->userdata('user_id')) {
          ?>
          <div class="header-user-info">
            <div class="user-info-name"><?= $this->session->userdata('name'); ?>님 안녕하세요.</div>
            <div class="user-info-point">포인트:
              <!-- <?= $this->session->userdata('point'); ?></div> -->
              <?= $user_info->point; ?>
            </div>
          </div>
          <?php
          }
          ?>
          <div class="header-middle__order">
            <div class="header-middle__order-list">
              <button type="button" class="header-middle__order-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.8rem" height="2.8rem" fill="currentColor"
                  class="header-middle__order-item-icon bi bi-heart" viewBox="0 0 16 16">
                  <path
                    d="m8 2.748-.717-.737C5.6.281 2.814.878 1.4 3.053c-.523 1.023-.641 2.8.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                </svg>
              </button>
              <button type="button" class="header-middle__order-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.8rem" height="2.8rem" fill="currentColor"
                  class="header-middle__order-item-icon bi bi-cart" viewBox="0 0 16 16">
                  <path
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.207 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
              </button>
            </div>
          </div>

        </div>

        <nav class="header-bottom">
          <ul class="header-bottom__list">
            <li>
              <div class="header-bottom__category-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.6rem" height="1.6rem" fill="currentColor"
                  class="bi bi-list" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
                <span>카테고리</span>
                <ul class="header-bottom__category-list">
                  <li class="header-bottom__category-item">
                    <a href="/products?category=fashion">
                      <span>패션</span>
                    </a>
                  </li>
                  <li class="header-bottom__category-item">
                    <a href="/products?category=food">
                      <span>식품</span>
                    </a>
                  </li>
                  <li class="header-bottom__category-item">
                    <a href="/products?category=digital">
                      <span>가전디지털</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li><a href="#">신상품</a></li>
            <li><a href="#">베스트</a></li>
            <li><a href="#">알뜰쇼핑</a></li>
            <li><a href="#">특가/혜택</a></li>
          </ul>
        </nav>
    </header>
  </div>
  <!-- header end -->