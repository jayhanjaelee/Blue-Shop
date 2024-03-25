<?php
$category = $_GET['category'];
$image = "/static/imgs/products/{$category}/{$product['image']}";

$session = $this->session->userdata;
$is_login = isset($session['logged_in']) ? $session['logged_in'] : false;
?>
<div class="product-container m0auto">
  <div class="product-image-container">
    <?php
    if ($category === "digital") {
    ?>
      <img style="object-fit: scale-down;" src="<?= $image ?>" alt="<?= $product['name'] ?>">
    <?php
    } else {
    ?>
      <img src="<?= $image ?>" alt="<?= $product['name'] ?>">
    <?php
    }
    ?>
  </div>
  <div class="product-info-container">
    <div class="product-info__title">
      <h1><?= $product['name'] ?></h1>
    </div>
    <div class="product-info__price">
      <h1><?= number_format($product['price']) ?>원</h1>
    </div>
    <form class="product-info__form" action="/views/index.html" method="GET">
      <div class="product-count-container">
        <label for="product__count">상품개수 : </label>
        <input type="number" id="product_count" name="product_count" value="1" min="0">
      </div>
      <div class="product-info__price-description">
        <span class="product-info__price-label">총 상품금액 : </span>
        <h1 class="product__price" value="<?= $product['price'] ?>">
          <span class="product__price-value"><?= number_format($product['price']) ?></span>
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
        <script type="text/javascript">
          const productButton = document.querySelector('.product__buy-btn');
          productButton.addEventListener('click', (e) => {
            <?php
            if (!$is_login) {
            ?>
              alert("로그인이 필요합니다.\n로그인후 구매를 진행해주세요.\n로그인 페이지로 이동합니다.");
              location.href = "http://<?= $_SERVER['SERVER_NAME'] ?>/login";
              return;
            <?php
            }
            ?>
          });
        </script>
      </div>
    </form>
  </div>
</div>