<?php

date_default_timezone_set('UTC');

function check_expiration($key) {
	$kea = $key . '_expires_at';

/*  if (!isset($_SESSION[$key]) || $_SESSION[$key] !== true) {
    echo 'not logged in';
    exit;
  }
*/
	if (!isset($_SESSION[$kea])) {
		return;
	}

	if ($_SESSION[$kea] == '0000-00-00 00:00:00') {
		return;
	}

	if (strtotime($_SESSION[$kea]) > time()) {
		return;
	}

	echo '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Subscription Expired</title>
  </head>
  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Subscription Expired</h5>
              <p class="card-text">Sorry, your subscription to this generator expired.</p>
              <a href="../" class="btn btn-primary">Go back</a>
            </div>
          </div>
        </div>
      </div>
   	</div>
  </body>
</html>
	';
	$_SESSION[$key] = false;
	exit;
}
