<?php
echo strlen($product['price']);
echo '<br>';
echo $product['price'];
echo '<br>';
echo $product['price'][-3];
echo '<br>';
echo $product['price'][0];
echo '<br>';
?>
<div class="product-container m0auto">
  <div class="product-image-container"><img src="/static/imgs/products/fashion/AIRism코튼스트라이프T(5부).avif" alt=""></div>
  <div class="product-info-container">
    <div class="product-info__title">
      <h1><?= $product['name'] ?></h1>
    </div>
    <div class="product-info__price">
      <h1>16,900원</h1>
    </div>
    <form class="product-info__form" action="/views/index.html" method="GET">
      <div class="product-count-container">
        <label for="product__count">상품개수 : </label>
        <input type="number" id="product_count" name="product_count" value="1">
      </div>
      <div class="product-info__price-description">
        <span class="product-info__price-label">총 상품금액 : </span>
        <h1 class="product__price">16,900
          <span class="product__price-unit">원</span>
        </h1>
      </div>
      <div class="product__buy-container">
        <button class="product__favorite-btn btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="3.0rem" height="3.0rem" fill="currentColor" class="header-middle__order-item-icon bi bi-heart" viewBox="0 0 16 16">
            <path d="m8 2.748-.717-.737C5.6.281 2.814.878 1.4 3.053c-.523 1.023-.641 2.8.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
          </svg>
        </button>
        <button class="product__buy-btn btn" type="submit">바로구매</button>
      </div>
    </form>
  </div>
</div>