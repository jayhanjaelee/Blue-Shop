<?php
$categories = array(
  1 => "fashion",
  2 => "food",
  3 => "digital",
);
?>

<?php $this->view('components/carousel'); ?>
<div class="new-products-container m0auto">
  <h1 class="new-products__header">신상품</h1>
  <div class="new-products-sub-container">
    <?php
    foreach ($data as $product) {
    ?>
    <div class="new-products">
      <a href=<?= "/product/{$product->id}?category={$categories[$product->category_id]}" ?>><img
          style="object-fit: scale-down;" class="new-products__image"
          src=<?= "/static/imgs/products/{$categories[$product->category_id]}/{$product->image}" ?> alt=""></a>
      <button class="new-products__button" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" fill="currentColor"
          class="header-middle__order-item-icon bi bi-cart" viewBox="0 0 16 16">
          <path
            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.207 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
        </svg>
        담기
      </button>
      <h3 class="new-products__name"><?= $product->name ?></h3>
      <span class="new-products__price"><?= $product->price ?>원</span>
    </div>
    <?php
    }
    ?>
  </div>
</div>