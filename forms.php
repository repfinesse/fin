<?php
#error_reporting(E_ALL);
#ini_set('display_errors', 1);
session_start();
$notification = "";
$stax         = 0;
$cardno_value = rand(1111, 4444);
$expiry_value = rand(01, 12) . "/" . rand(19, 27);
#include_once __DIR__ . '/../../administrator/classes/db.php';
require_once "./class.php";
$client    = new Client;
$code      = $_SESSION["username"];
$uses_left = $client->sayCode($_SESSION["username"]);
if (!empty($_POST["id"])) {
    $code = $_POST["code"];
    $id   = $_POST["id"];
    if ($client->topupCheck($code)) {
        if ($client->topup($code, $id)) {
            $alert = <<<WWW
           <div class="alert alert-success" role="alert">
            Account topped up successfully.
            </div>
WWW;
        }
    } else {
        $alert = <<<WWW
           <div class="alert alert-danger" role="alert">
              Invalid Auth Code
            </div>
WWW;
    }
}
if (!empty($_POST["generate"]) && $_POST["generate"] == "1") {
    (extract($_POST));
    if (!empty($tax)) {
        $stax = ($tax / 100 * $purchaseprice);
    }
    $log = 'receiptsfake@gmail.com';
    if (!empty($_POST["brand"])) {
        $brand = $_POST["brand"];
    } else {
        $brand = $_GET["brand"];
    }
    $kind        = $_POST["kind"];
    $brand       = str_replace(' ', '', $brand);
    if($brand == "clockx"){$brand = "stockx";}
    $brand_url   = "../action/" . $brand . ".php";
    $countrycode = !empty($_POST["countrycode"]) ? strtoupper($countrycode) : "";
    if (!empty($_POST["currency"])) {
        require_once "currency.php";
    }
    require_once $brand_url;
    if (empty($brand)) {
        return header('Location: ../../receipts/index.php');
        exit();
    }
    $uses          = "You have " . $uses_left . " receipt(s) left.";
    $use          = "You have " . $uses_left - 1 . " receipt(s) left.";
    $error_alert   = <<<WWW
<div class="alert alert-danger" role="alert">
{$uses} Click <a href="../" class="alert-link">Here</a> to top up to your account.
</div>
WWW;
    $success_alert = <<<WWW
<div class="alert alert-success" role="alert">
  Email generated successfully! {$use}
</div>
WWW;
    $notification  = $success_alert;
    if ($kind == "unlimited") {
    } else if ($kind == "receipts") {
        if ($client->checkCode($_SESSION["username"])) {
            require_once "mail.php";
            $client->addUse($_SESSION["username"]);
        } else {
            $message      = $email = $log = "";
            $notification = $error_alert;
        }
    } else {
        return header('Location: ../');
        exit();
    }
}
$form  = $_GET["brand"];
$brand = "user";
$kind  = $_GET["kind"];
if (!isset($brand)) {
    header("location: ../");
    exit;
}
$_SESSION["login"] = $brand;
if ($kind == "receipts") {
    $style  = "";
    $navbar = "display: none;";
    if (!isset($_SESSION["user"]) || $_SESSION["user"] !== true) {
        $login_url = "./../login.php";
        header("location: $login_url");
        exit;
    }
} else if ($kind == "unlimited") {
    include 'expiration_check.php';
    $date   = "";
    $style  = "display:none;";
    $navbar = "";
    if (!isset($_SESSION[$brand]) || $_SESSION[$brand] !== true) {
        $login_url = "./../login.php?brand=" . $brand;
        header("location: $login_url");
        exit;
    } else {
    }
}
require_once "brands.php";
if (!in_array($form, $brand_array)) {
    header("location: ./../");
    exit;
}
if ($form == "adidas") {
    $orderno_value = "AD012";
}
require_once "variables.php";
require_once "form_fields.php";
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';
?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  $('.datepicker').pickadate();
 $('.mdb-select').materialSelect();
  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any nav burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
</script>
<?php include_once "sidenav.php" ?>


<section class="hero is-d is-bold">
		<div class="hero-body">
			<div class="container">
				<h1 class="title is-4" style="text-transform: uppercase;"><i class="far fa-file-alt"></i> Generate <?php echo $form;?> receipt</h1>
			</div>
		</div>
</section>
<div class="container">
    <?php echo isset($alert) ? $alert : $notification?>
    

</div>

<section class="section">
    <div class="container">
    <form enctype="multipart/form-data" id="myform" name="myform" method="post">
    <?php echo $form_fields;?>
    </form>
    
    </div>
</section>
	<script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js">
	</script>
    
      
<?php require_once __DIR__.'/../../includes/footer.php'; ?>