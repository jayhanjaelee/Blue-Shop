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
          <li class="header-top__register"><a href="/register">회원가입</a></li>
          <li class="header-top__login"><a href="/login">로그인</a></li>
        </ul>
      </div>

      <div class="header-middle">
        <div class="header-middle__logo">
          <a href="/"><img src="/static/imgs/logo-dark.png" alt="BLUE-SHOP"></a>
        </div>
        <div class="header-middle__search-form-container">
          <form action="/search" method="GET">
            <input type="text" placeholder="검색어를 입력해주세요">
            <button type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" width="2.2rem" height="2.2rem" fill="currentColor"
                class="bi bi-search" viewBox="0 0 16 16">
                <path
                  d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
              </svg>
            </button>
          </form>
        </div>
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
                  <!-- <svg class="header-bottom__category-icon" xmlns="http://www.w3.org/2000/svg" height="14"
                      width="17.5" viewBox="0 0 640 512">
                      <path
                        d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z" />
                    </svg> -->
                  <a href="/products?category=fashion">
                    <span>패션</span>
                  </a>
                </li>
                <li class="header-bottom__category-item">
                  <a href="/products?category=food">
                    <!-- <svg class="header-bottom__category-icon" xmlns="http://www.w3.org/2000/svg" height="14"
                      width="12.25" viewBox="0 0 448 512">
                      <path
                        d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                    </svg> -->
                    <span>식품</span>
                  </a>
                </li>
                <li class="header-bottom__category-item">
                  <a href="/products?category=digital">
                    <!-- <svg class="header-bottom__category-icon" xmlns="http://www.w3.org/2000/svg" height="14"
                      width="17.5" viewBox="0 0 640 512">
                      <path
                        d="M128 32C92.7 32 64 60.7 64 96V352h64V96H512V352h64V96c0-35.3-28.7-64-64-64H128zM19.2 384C8.6 384 0 392.6 0 403.2C0 445.6 34.4 480 76.8 480H563.2c42.4 0 76.8-34.4 76.8-76.8c0-10.6-8.6-19.2-19.2-19.2H19.2z" />
                    </svg> -->
                    <span>가전디지털</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li><a href="/new_products">신상품</a></li>
          <li><a href="#">베스트</a></li>
          <li><a href="#">알뜰쇼핑</a></li>
          <li><a href="#">특가/혜택</a></li>
        </ul>
      </nav>
    </header>
  </div>
  <!-- header end -->