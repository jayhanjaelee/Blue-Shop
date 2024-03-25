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

### 기술 스택 : php 7.4.33, mysql 8, javascript, css

---

# 기능 구현 목록

1. 스타일
2. 로그인 & 로그아웃
3. 회원가입
4. 상품 목록 조회
5. 상품 목록 페이지네이션
6. 단일 상품 조회
7. 상품 구매
8. 상품 검색

---

# 스타일

폴더 구조

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

![figma](/imgs/figma.png)


---

# 로그인 & 로그아웃

```php

```