<?php
error_reporting(0);
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$rawdata = file_get_contents('https://www.caltex.com/my/motorists/products-and-services/fuel-prices.html');
preg_match('/Last updated:.+M/', $rawdata, $lastupdate);
preg_match_all('/RM \d.\d\d/', $rawdata, $prices);

echo json_encode(
    array(
        "lastupdate" => $lastupdate[0],
        "prices" => $prices[0]
    )
);