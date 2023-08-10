<?php

$amount = "112334.33";
$amount_taxed = $amount * 6 / 100;
$price = $amount - $amount_taxed;

$new_price = round($price, 2);

echo $new_price;
