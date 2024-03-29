<?php
$category = isset($_GET["category"]) ? $_GET['category'] : null;
if ($category) {
  $img_dir = "/static/imgs/products/{$category}/";
}

$ko_categories = array(
  "fashion" => "패션",
  "food" => "식품",
  "digital" => "가전디지털",
);
?>
<div class="products-container m0auto">
  <h1 class="products__header">
    <?php
    if (!$category) {
    ?>
    전체
    <?php
    } else {
    ?>
    <?= $ko_categories[$category] ?>
    <?php
    }
    ?>
  </h1>
  <div class="products__filter-container">
    <span class="products__count">총 <?= $data['count'] ?>건</span>
    <ul class="products__filter">
      <li><a href="#">낮은 가격순</a></li>
      <li><a href="#">높은 가격순</a></li>
    </ul>
  </div>

  <div class="products-list-container">
    <?php
    foreach ($data['products'] as $product) {
    ?>
    <div class="products-item">
      <a href="/product/<?= $product['id'] ?>?category=<?= $category ?>">
        <?php
          if ($category === 'digital') {
          ?>
        <img style="object-fit: scale-down;" class="products-item__image" src="<?= $img_dir . $product['image'] ?>"
          alt="<?= $product['name'] ?>">
        <?php
          } else {
          ?>
        <img class="products-item__image" src="<?= $img_dir . $product['image'] ?>" alt="<?= $product['name'] ?>">
        <?php
          }
          ?>
      </a>
      <button class="products-item__button" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" fill="currentColor"
          class="header-middle__order-item-icon bi bi-cart" viewBox="0 0 16 16">
          <path
            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.207 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
        </svg>
        담기
      </button>
      <h3 class="products-item__name"><?= $product['name'] ?></h3>
      <span class="products-item__price"><?= $product['price'] ?>원</span>
    </div>
    <?php
    }
    ?>
  </div>
</div>

<?php $this->load->view('components/pagination'); ?>