<?php
$page_count_at_once = 9;
$products_count_at_once = 6;
$category = $_GET["category"];
$current_page = $this->uri->segment(2);

$max_page = ceil($data['count'] / $products_count_at_once);
$page_group = ceil($current_page / $page_count_at_once);
$first_page = (($page_group - 1) * $page_count_at_once) + 1;
$last_page = $page_group * $page_count_at_once;
?>
<!-- pagination start -->
<ul class="pagination" role="menubar" aria-label="Pagination">
  <?php
  if ($first_page != 1) {
  ?>
  <li><a href="/products/<?= $first_page - 1 ?>?category=<?= $category ?>"><i
        class="fa-solid fa-angle-left fa-sm"></i></a></li>
  <?php
  }
  ?>
  <?php
  for ($i = $first_page; $i < $last_page + 1; $i++) {
    if ($i > $max_page) break;
    $str_i = number_format($i, 0);
    if ($str_i === $current_page) {
  ?>
  <li class="current"><a href="/products/<?= $i ?>?category=<?= $category ?>"><?= $i ?></a></li>
  <?php
    } else {
    ?>
  <li><a href="/products/<?= $i ?>?category=<?= $category ?>"><?= $i ?></a></li>
  <?php
    }
    ?>
  <?php
  }
  ?>
  <?php
  if ($last_page < $max_page) {
  ?>
  <li><a href="/products/<?= $last_page + 1 ?>?category=<?= $category ?>"><i
        class="fa-solid fa-angle-right fa-sm"></i></a></li>
  <?php
  }
  ?>
</ul>
<!-- pagination end -->