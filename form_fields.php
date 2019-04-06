<?php
$acode = isset($_POST["code"]) ? $_POST["code"] : '';
function randomKey($length) {
    $pool = array_merge(range(0,9),range('A', 'Z'));

    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}



$orderno_value2 = "";
switch ($form) {
    case "adidas":
        $orderno_value = "AD012" . rand(111111, 999999);
        break;
    case "balenciaga":
        $orderno_value = rand(611111, 699999);
        $expiry_value  = rand(01, 12) . "/" . rand(19, 28);
        break;
    case "barneys":
        $orderno_value = "B0118" . rand(011111111, 199999999);
        break;
    case "end":
        $orderno_value = rand(7400111111, 7400999999);
        break;
    
    case "farfetch":
        
        $orderno_value = randomKey(6);
        break;
    
    case "goat":
        $orderno_value = rand(92111111, 99999999);
        break;
    
    case "grailed":
        $orderno_value = "";
        break;
    case "gucci":
        $orderno_value = rand(111111, 999999);
        break;
    
    case "kith":
        $orderno_value = rand(11111, 99999);
        break;
    case "lv":
        $orderno_value = rand(112311111, 999912399);
        break;
    case "nike":
        $orderno_value = "C000" . rand(12311111, 99992399);;
        break;
    case "offwhite":
        $orderno_value = "R136" . rand(1111111, 9999999);
        break;
    case "snkrs":
        $orderno_value = "";
        break;
    case "socialstatus":
        $orderno_value = rand(11111, 99999);
        break;
    case "ssense":
        $orderno_value = rand(274440111111, 274440999999);
        break;
    case "stadiumgoods":
        $orderno_value = rand(211111199, 999099999);
        break;
    
    case "clockx":
        $orderno_value = rand(811111, 999999) . "-" . rand(111111, 999999);
        break;
    case "supreme":
        $orderno_value = rand(8191111, 9999999);
        break;
    case "supremep":
        $orderno_value  = rand(8191111, 9999999);
        $orderno_value2 = rand(8191111, 9999999);
        break;
    case "yeezysupply":
        $orderno_value = "YZYWR" . rand(111111, 999999);
        break;
}



$form_header = <<<WWW

    <div class="md-form form-group"><label>Email Address</label> <input class="form-control" name="email" value="{$_SESSION["email"]}" type="text" ></div>
<div class="row">
    <div class="column">
    <div class="md-form form-group"><label>Product Name</label> <input class="form-control" name="itemname" value="{$v_itemname}" value="{$v_itemname}" type="text"></div>
    </div>
    <div class="column">
    <div class="md-form form-group"><label>Order Number</label> <input class="form-control" name="orderno" type="text" value="{$orderno_value}"></div>    
    </div>
</div>

<div class="row">
    <div class="column">
    <div class="md-form form-group"><label>Price</label> <input class="form-control" name="purchaseprice" value="{$v_purchaseprice}" placeholder="168" type="number"></div>    
    </div>
    <div class="column">
    
<select class="mdb-select md-form" name="currency" value="{$v_currency}" >
<option value="USD_$" selected>US dollar (USD)</option>
<option value="EUR_€">Euro (EUR)</option>
<option value="JPY_¥">Japanese yen (JPY)</option>
<option value="GBP_£">Pound sterling (GBP)</option>
<option value="AUD_$">Australian dollar (AUD)</option>
<option value="CAD_$">Canadian dollar (CAD)</option>
<option value="CHF_Fr">Swiss franc (CHF)</option>
<option value="CNY_¥">Chinese Yuan</option>
<option value="SEK_kr">Swedish krona (SEK)</option>
<option value="NZD_$">New Zealand dollar (NZD)</option>
</select>
    </div>
</div>

WWW;

$form_button = <<<WWW
<input class="kind" id="kind" name="kind" type="hidden" value="{$kind}">
<input name="generate" type="hidden" value="1">
<input class="brand" id="brand" name="brand" type="hidden" value="{$form}">
<div class="field is-grouped"><button class="btn btn-success btn-md" type="submit"><i class="fas fa-share" style="margin-right: 10px;"></i>Generate  Receipt</button></div>
WWW;

$form_goat = <<<WWW
<div class="md-form form-group"><label>Issues</label> <input class="form-control" name="issues" value="{$v_issues}" type="text"></div>
<div class="md-form form-group"><label>Shoe Condition</label> <input class="form-control" name="shoecondition" value="{$v_shoecondition}" type="text"></div>
<div class="md-form form-group"><label>Box Condition</label> <input class="form-control" name="boxcondition" value="{$v_boxcondition}" type="text"></div>
<div class="md-form form-group"><label>Seller Says</label> <input class="form-control" name="sellersays" value="{$v_sellersays}" type="text"></div>
WWW;

$form_code = <<<WWW
<div class="md-form form-group"><label style="{$style}">Auth code</label> <input class="form-control" name="code" value="{$v_code}" style="{$style}" type="text"></div>
WWW;

$form_email = <<<WWW
<div class="md-form form-group"><label>Email Address</label> <input class="form-control" name="email" value="{$v_email}" type="text"></div>
WWW;

$form_addy12 = <<<WWW
<div class="md-form form-group"><label>Address Line 1</label> <input class="form-control" name="addy1" value="{$v_addy1}" type="text"></div>
<div class="md-form form-group"><label>Address Line 2</label> <input class="form-control" name="addy2" value="{$v_addy2}" type="text"></div>
<div class="md-form form-group"><label>Google Maps URL</label> <input class="form-control" name="addressmaps" value="{$v_addressmaps}" type="text"></div>
WWW;

$form_addy = <<<WWW
<div class="md-form form-group"><label>Address</label> <input class="form-control" name="address" value="{$v_address}" type="text"></div>
<div class="md-form form-group"><label>Google Maps URL</label> <input class="form-control" name="addressmaps" value="{$v_addressmaps}" type="text"></div>
WWW;


$form_cardno = <<<WWW
<div class="md-form form-group"><label>Last 4 Digits of credit card</label> <input class="form-control" name="cardno"value="{$cardno_value}" type="text"></div>
WWW;


$form_category = <<<WWW
<div class="md-form form-group"><label>Category</label> <input class="form-control" name="category" value="{$v_category}" type="text"></div>
WWW;


$form_firstlastname = <<<WWW
<div class="md-form form-group"><label>First Name</label> <input class="form-control" name="fname" value="{$v_fname}" type="text"></div>
<div class="md-form form-group"><label>Last Name</label> <input class="form-control" name="lname" value="{$v_lname}" type="text"></div>
WWW;


$form_city = <<<WWW
<div class="md-form form-group"><label> City</label> <input class="form-control" name="city" value="{$v_city}" type="text"></div>
WWW;


$form_state = <<<WWW
<div class="md-form form-group"><label>State</label> <input class="form-control" name="state" value="{$v_state}" type="text"></div>
WWW;


$form_country = <<<WWW
<div class="md-form form-group"><label>Country</label> <input class="form-control" name="country" value="{$v_country}" type="text"></div>
WWW;

$form_styleid = <<<WWW
<div class="md-form form-group"><label>Style ID</label> <input class="form-control" name="styleid" value="{$v_styleid}" type="text"></div>
WWW;


$form_countrycode = <<<WWW
<div class="md-form form-group"><label>2 Letter Country Code</label> <input class="form-control" maxlength="2" name="countrycode" value="{$v_countrycode}" type="text"></div>
WWW;



$form_designer = <<<WWW
<div class="md-form form-group"><label>Designer</label> <input class="form-control" name="designer" value="{$v_designer}" type="text"></div>
WWW;

$form_image = <<<WWW
<div class="md-form form-group"><label>Image URL</label> <input class="form-control" placeholder="Right click source image and copy image address" name="image" value="{$v_image}" type="text"></div>
WWW;


$form_date     = <<<WWW
<div class="md-form">
  <input placeholder="Selected date" type="text" id="date-picker" class="form-control datepicker" name="date" value="{$v_date}" >
  <label for="date-picker">Date</label>
</div>
WWW;
$form_time     = <<<WWW
<div class="md-form form-group"><label>Time</label> <input class="form-control" name="time" value="{$v_time}" type="text"></div>
WWW;
$form_datetime = <<<WWW
<div class="md-form form-group"><label>Time</label> <input class="form-control" name="time" value="{$v_time}" type="text"></div>
<div class="md-form form-group"><label>Date</label> <input class="form-control" name="date" value="{$v_date}" type="text"></div>
WWW;


$form_tax       = <<<WWW
<div class="md-form form-group"><label>Tax %</label> <input class="form-control" name="tax" value="{$v_tax}" type="number""></div>
WWW;
$form_itemcolor = <<<WWW
<div class="md-form form-group"><label>Item Color</label> <input class="form-control" name="itemcolor" value="{$v_itemcolor}" type="text"></div>
WWW;


$form_itemlink = <<<WWW
<div class="md-form form-group"><label>Item URL</label> <input class="form-control" name="itemlink" value="{$v_itemlink}" type="text"></div>
WWW;


$form_itemmaterial = <<<WWW
<div class="md-form form-group"><label>Material</label> <input class="form-control" name="itemmaterial" value="{$v_itemmaterial}" type="text"></div>
WWW;


$form_itemstyle = <<<WWW
<div class="md-form form-group"><label>Style</label> <input class="form-control" name="itemstyle" value="{$v_itemstyle}" type="text"></div>
WWW;


$form_listing = <<<WWW
<div class="md-form form-group"><label>Listibg</label> <input class="form-control" name="listing" value="{$v_listing}" type="text"></div>
WWW;

$form_name = <<<WWW
<div class="md-form form-group"><label>Your Name</label> <input class="form-control" name="name" value="{$v_name}" type="text"></div>
WWW;


$form_phone = <<<WWW
<div class="md-form form-group"><label>Phone Number</label> <input class="form-control" name="phone" value="{$v_phone}" type="text"></div>
WWW;


$form_postcode = <<<WWW
<div class="md-form form-group"><label>Postal Code</label> <input class="form-control" name="postcode" value="{$v_postcode}" type="text"></div>
WWW;


$form_productid = <<<WWW
<div class="md-form form-group"><label>Product ID</label> <input class="form-control" name="productid" value="{$v_productid}" type="text"></div>
WWW;

$form_seller = <<<WWW
<div class="md-form form-group"><label>Seller</label> <input class="form-control" name="seller" value="{$v_seller}" type="text"></div>
WWW;

$form_arrives = <<<WWW
<div class="md-form form-group"><label>Arrival Date</label> <input class="form-control" name="arrives" value="{$v_arrives}" type="text"></div>
WWW;

$supreme_print = <<<WWW
	<div class="md-form"> <input placeholder="Selected date" type="text" name="date" id="date" class="form-control datepicker"> <label for="date">Date</label> </div>
	<div class="md-form form-group"><label>Order Number</label> <input class="form-control" maxlength="7" name="orderno"  value="{$orderno_value}" type="text"></div>
	<div class="md-form form-group"><label>Item Name</label> <input class="form-control" name="itemname" value="{$v_itemname}" placeholder="Box Logo Hooded Sweatshirt" type="text"></div>
	<div class="md-form form-group"><label>Size</label> <input class="form-control" name="itemsize" value="{$v_itemsize}" placeholder="Medium" type="text"></div>
	<div class="md-form form-group"><label>Style</label> <input class="form-control" name="itemstyle" value="{$v_itemstyle}" placeholder="Heather Grey" type="text"></div>
	<div class="md-form form-group"><label>Image URL</label> <input class="form-control" name="image" value="{$v_image}" type="text"></div>
	<div class="md-form form-group"><label>Price</label> <input class="form-control" name="purchaseprice" value="{$v_purchaseprice}" placeholder="168" type="number"></div>
	<div class="md-form form-group"><label>Shipping</label> <input class="form-control" name="ship" value="{$v_ship}" type="number"></div>
	<div class="md-form form-group"><label>Name</label> <input class="form-control" name="name" value="{$v_name}" type="text"></div>
	<div class="md-form form-group"><label>Receipt Number</label> <input class="form-control" maxlength="7" value="{$orderno_value2}" name="receipt_num" type="text"></div>
	<div class="md-form form-group"><label>Address Line 1</label> <input class="form-control" name="addy1" value="{$v_addy1}" type="text"></div>
	<div class="md-form form-group"><label>Address Line 2</label> <input class="form-control" name="addy2" value="{$v_addy2}" type="text"></div>
	<div class="md-form form-group"><label>Email:</label> <input class="form-control" name="email" value="{$v_email}" type="email"></div>
	<div class="md-form form-group"><label>Telephone:</label> <input class="form-control" name="phone" value="{$v_phone}" type="tel"><br><br><b>Europe?</b><input class="r" name="Euro" value="{$v_Euro}" type="checkbox"><br></div>
	<div class="md-form form-group"><label>VAT (Only if in Europe)</label> <input class="form-control" name="VAT" value="{$v_VAT}" type="number"><br>
	<input class="kind" id="kind" name="kind" type="hidden" value="{$kind}">
<input name="generate" type="hidden" value="2">
<input class="brand" id="brand" name="brand" type="hidden" value="{$form}">
<div class="field is-grouped"><button formaction="/receipts/pdfgen.php"class="btn btn-success btn-md" type="submit"><i class="fas fa-share" style="margin-right: 10px;"></i>Generate  Receipt</button></div>
WWW;



$form_ship     = <<<WWW
<div class="md-form form-group"><label>Shipping Fee</label> <input class="form-control" name="ship" value="{$v_ship}" type="text"></div>
WWW;
$form_itemname = <<<WWW
<div class="md-form form-group"><label>Item Name</label> <input class="form-control" name="itemname" value="{$v_itemname}" type="text"></div>
WWW;


$form_shipmethod = <<<WWW
<div class="md-form form-group"><label>Shipping method</label> <input class="form-control" name="shipmethod" value="{$v_shipmethod}" type="text"></div>
WWW;

$form_itemsize = <<<WWW
<div class="md-form form-group"><label>Item Size</label> <input class="form-control" name="itemsize" value="{$v_itemsize}" type="text"></div>
WWW;


$form_sku = <<<WWW
<div class="md-form form-group"><label>SKU</label> <input class="form-control" name="sku" value="{$v_sku}" type="text"></div>
WWW;

$stockx_category = <<<WWW
<select class="mdb-select md-form" name="category" value="{$v_category}"><option value="disabled selected">Category</option><option value="shoes">Shoes</option><option value="clothes">Clothes</option><option value="accessories">Accessories</option></select>
<select class="mdb-select md-form" name="country" value="{$v_country}"><option value="disabled selected">Country</option><option value="usa">United States</option><option value="other">Other</option></select>
<div class="md-form" >
  <input data-value="Apr_April_12" type="text" name="arrival" id="date-picker" class="form-control datepicker">
  <label for="date-picker">Arrival</label>
</div>
<div class="md-form form-group"><label>Product URL</label> <input class="form-control" name="itemlink" value="{$v_itemlink}" type="text"></div>
WWW;


$form_articleno = <<<WWW
<div class="md-form form-group"><label>Article NO</label> <input class="form-control" name="articleno" value="{$v_articleno}" type="text"></div>
WWW;


$form_category = <<<WWW
<div class="md-form form-group"><label>Category</label> <input class="form-control" name="category" value="{$v_category}" type="text"></div>
WWW;


$form_transactions = <<<WWW
<div class="md-form form-group"><label>Transactions</label> <input class="form-control" name="transactions" value="{$v_transactions}" type="text"></div>
WWW;

$form_expiry = <<<WWW
<div class="md-form form-group"><label>Expiry Date</label> <input class="form-control" name="expiry" type="text" value="{$expiry_value}"></div>
WWW;

$stylecolor       = $form_itemstyle . $form_itemcolor;
$stylesize        = $form_itemstyle . $form_itemsize;
$colorsize        = $form_itemcolor . $form_itemsize;
$color_size_style = $form_itemstyle . $form_itemcolor . $form_itemsize;

switch ($form) {
    case "adidas":
        $orderno_v   = "AD012";
        $form_fields = ($form_header . $form_articleno . $form_image . $form_tax . $form_itemsize . $form_firstlastname . $form_itemcolor . $form_addy . $form_button);
        break;
    case "balenciaga":
        $form_fields = ($form_header . $colorsize . $form_image . $form_firstlastname . $form_addy12 . $form_country . $form_category . $form_cardno . $form_expiry . $form_button);
        break;
    case "barneys":
        $form_fields = ($form_header . $colorsize . $form_styleid . $form_image . $form_name . $form_addy12 . $form_state . $form_designer . $form_datetime . $form_button);
        break;
    
    case "end":
        $form_fields = ($form_header . $form_name . $color_size_style . $form_image . $form_phone . $form_ship . $form_tax . $form_addy12 . $form_country . $form_button);
        break;
    
    case "farfetch":
        $form_fields = ($form_header . $form_name . $form_ship . $form_addy . $form_city . $form_state . $form_postcode . $form_country . $form_image . $form_designer  . $form_button);
        break;
    
    case "goat":
        $form_fields = ($form_header . $form_goat . $form_name . $form_image . $form_ship . $form_itemsize . $form_cardno . $form_sku . $form_addy12 . $form_postcode . $form_country . $form_button);
        break;
    
    case "grailed":
        $form_fields = ($form_header . $form_seller . $form_listing . $form_name . $form_transactions . $form_designer . $form_addy12 . $form_image . $form_itemsize . $form_countrycode . $form_button);
        break;
    case "gucci":
        $form_fields = ($form_header . $form_image . $form_name . $color_size_style . $form_addy12 . $form_city . $form_country . $form_countrycode . $form_cardno . $form_phone . $form_button);
        break;
    
    case "kith":
        $form_fields = ($form_header . $form_date . $form_image . $form_name . $stylesize . $form_addy12 . $form_country . $form_ship . $form_cardno . $form_phone . $form_button);
        break;
    case "lv":
        $form_fields = ($form_header . $form_date . $form_image . $form_firstlastname . $colorsize . $form_itemmaterial . $form_productid . $form_addy12 . $form_tax . $form_countrycode . $form_ship . $form_cardno . $form_phone . $form_button);
        break;
    case "nike":
        $form_fields = ($form_header . $form_date . $form_arrives . $form_image . $form_firstlastname . $colorsize . $form_addy . $form_tax . $form_button);
        break;
    case "offwhite":
        $form_fields = ($form_header . $form_datetime . $form_image . $form_firstlastname . $colorsize . $form_category . $form_productid . $form_addy . $form_city . $form_state . $form_postcode . $form_tax . $form_country . $form_countrycode . $form_ship . $form_cardno . $form_phone . $form_button);
        break;
    
    case "snkrs":
        $form_fields = ($form_image . $form_itemname . $form_code . $form_email . $form_button);
        break;
    
    case "socialstatus":
        $form_fields = ($form_header . $form_itemlink . $form_name . $form_image . $form_ship . $form_date . $form_phone . $form_country . $form_itemsize . $form_addy12 . $form_cardno . $form_button);
        break;
    
    case "ssense":
        $form_fields = ($form_header . $form_date . $form_image . $form_sku . $form_name . $colorsize . $form_category . $form_productid . $form_addy12 . $form_postcode . $form_tax . $form_country . $form_countrycode . $form_cardno . $form_phone . $form_button);
        break;
    case "stadiumgoods":
        $form_fields = ($form_header . $form_datetime . $form_image . $form_sku . $form_name . $colorsize . $form_addy12 . $form_ship . $form_shipmethod . $form_country . $form_countrycode . $form_cardno . $form_phone . $form_button);
        break;
    
    case "clockx":
        $form_fields = ($form_header . $form_image . $form_ship . $stockx_category . $form_itemsize . $form_button);
        break;
    case "supreme":
        $form_fields = ($form_header . $form_name . $form_tax . $form_ship . $form_datetime . $stylesize . $form_addy . $form_button);
        break;
    case "supremep":
        $form_fields = ($supreme_print);
        break;
    case "yeezysupply":
        $form_fields = ($form_header . $form_image . $form_name . $form_itemsize . $form_addy12 . $form_cardno . $form_button);
        break;
}

?>
