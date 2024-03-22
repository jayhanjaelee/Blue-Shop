<?php

$min = 1;
$max = 12;

// generate_random_number(1, 12, 200);
generate_random_price(100);

function generate_random_number($min, $max, $iter_num) {
  for ($i = 0; $i < $iter_num; $i++) {
    echo rand($min, $max);
    echo "\n";
  }
}

function generate_random_price($iter_num) {
  for ($i = 0; $i < $iter_num; $i++) {
    $price = rand(1, 9) . rand(1, 9) . rand(1, 9) . '00';
    echo $price;
    echo "\n";
  }
}
