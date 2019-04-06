<form  enctype="multipart/form-data" id="myform" method="post" name="myform">
	<div class="md-form form-group">
		<label>Order Number</label> <input class="form-control" name="orderno" type="text" value="GO5<?php echo rand(111111, 999999) ?>">
	</div>
	<div class="md-form form-group">
		<label>Style</label> <input class="form-control" name="style" type="text">
	</div>
	<div class="md-form form-group">
		<label>Product Image Link</label> <input class="form-control" name="image" type="text">
	</div>
	<div class="md-form form-group">
		<label>Product Name</label> <input class="form-control" name="itemname" type="text">
	</div>
	<div class="md-form form-group">
		<label>Order Date</label> <input class="form-control" name="orderdate" placeholder="17/04/2018" type="text">
	</div>
	<div class="md-form form-group">
		<label>Size</label> <input class="form-control" name="size" type="text">
	</div>
	<div class="md-form form-group">
		<label>Purchase Price</label> <input class="form-control" name="purchaseprice" type="number">
	</div>
	<div class="md-form form-group">
		<label>First Name</label> <input class="form-control" name="fname" type="text">
	</div>
	<div class="md-form form-group">
		<label>Last Name</label> <input class="form-control" name="lname" type="text">
	</div>
	<div class="md-form form-group">
		<label>Delivery Range(2 -6 days from order date)</label> <input class="form-control" name="deliveryrange" placeholder="19/04 - 23/04" type="text">
	</div>
	<div class="md-form form-group">
		<label>Address line 1</label> <input class="form-control" name="addy1" type="text">
	</div>
	<div class="md-form form-group">
		<label>Address line 2</label> <input class="form-control" name="addy2" type="text">
	</div>
	<div class="md-form form-group">
		<label>State</label> <input class="form-control" name="state" type="text">
	</div>
	<div class="md-form form-group">
		<label>Your e-mail address</label> <input class="form-control" name="email" type="text">
	</div>
	<div class="md-form form-group">
		<label>Access code</label> <input class="form-control" name="code" style="<?php echo $style?>" type="text">
	</div><input class="kind" id="kind" name="kind" type="hidden" value="<?php echo $kind ?>"> <input class="brand" id="brand" name="brand" type="hidden" value="<?php echo $form ?>">
	<div class="field is-grouped">
		<button class="btn btn-primary btn-md" target="_blank" type="submit"><i class="fas fa-share" style="margin-right: 10px;"></i> Generate Receipt</button>
	</div><input name="generate" type="hidden" value="1">
</form>