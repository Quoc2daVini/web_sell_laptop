<?php
include 'inc/header.php';
 $pd_feature = $pd->get_product_featured();

$result = $pd_feature->fetch_assoc();
print_r($result);


?> 