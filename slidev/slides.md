---
# try also 'default' to start simple
theme: seriph
# random image from a curated Unsplash collection by Anthony
# like them? see https://unsplash.com/collections/94734566/slidev
background: https://cover.sli.dev
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
transition: fade-out
---

# Blue-Shop

개발 : 이한재

쇼핑몰 웹서비스 개인 프로젝트

기간 : 3/17 ~ 3/25 (7일 소요)

기술 스택 : php 7.4.33, mysql 8, javascript, css

---
transition: fade-out
---

# 기능 구현 목록

1. 로그인 & 로그아웃
2. 회원가입
3. 상품 목록 조회
4. 상품 목록 페이지네이션
5. 단일 상품 조회
6. 상품 구매
7. 상품 검색

---

# 로그인 & 로그아웃

```php

```