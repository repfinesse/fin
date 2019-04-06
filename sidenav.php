
<!-- SideNav slide-out button -->
<a href="#" data-activates="slide-out" class="btn btn-success p-3 button-collapse"><i class="fas fa-bars"></i></a>

<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav fixed custom-scrollbar">
  <ul class="custom-scrollbar">
      <br><br><br>
      <li ><ul class="collapsible success-color"><li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> LOGOUT</a></li></ul></li>
  <?php
	foreach ($brand_array as $key => $value) {
        $key = strtoupper($key);
        $hi = $kind == "receipts" ? "singleuse" : "nolimit";
$li = <<<WWW

<li><ul class="collapsible success-color"><li><a href="/{$hi}/{$value}/" class="success-color">{$key}</a></li></ul></li>
WWW;
		echo $li;
	}
	
	?>
    
    <!-- Side navigation links -->
    
    <!--/. Side navigation links -->
  </ul>
  <div class="sidenav-bg rgba-white-light" style="z-index:-1;"></div>
</div>
<!--/. Sidebar navigation -->