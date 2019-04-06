<?php 
$currency = isset($_POST["currency"]) ? $_POST["currency"] : 'dollars';
$currency = explode('_', $currency);
$currency_code = $currency[0];
$currency_sign = $currency[1];
if($currency_sign == "€"){
$currency_sign = "&euro;";
}
if($currency_sign == "£"){
$currency_sign = "&#163;";
}

?>