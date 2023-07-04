<?php
if($page_name != "admin"){
$dircheckPathad = "admin/";
}else{
  $dircheckPathad = "";
}

 ?>
<header class="main-header">
<div class="d-flex align-items-center logo-box justify-content-start">
  <a href="#" class="waves-effect waves-light nav-link rounded d-none d-md-inline-block push-btn" data-toggle="push-menu" role="button">
    <img src="<?php echo $dircheckPath; ?>images/svg-icon/collapse.svg" class="img-fluid svg-icon" alt="">
  </a>
  <!-- Logo -->
  <a href="index" class="logo">
    <div class="logo-lg">
      <span class="light-logo"><b style="font-size:30px;">قرايه</b></span>
      <span class="dark-logo"><b style="font-size:30px;">قرايه</b></span>
    </div>
  </a>
</div>
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
  <div class="app-menu">
  <ul class="header-megamenu nav">
    <li class="btn-group nav-item d-md-none">
      <a href="#" class="waves-effect waves-light nav-link push-btn btn-outline no-border" data-toggle="push-menu" role="button">
        <img src="<?php echo $dircheckPath; ?>images/svg-icon/collapse.svg" class="img-fluid svg-icon" alt="">
        </a>
    </li>
    <li class="btn-group nav-item">
      <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-outline no-border full-screen" title="Full Screen">
        <img src="<?php echo $dircheckPath; ?>images/svg-icon/fullscreen.svg" class="img-fluid svg-icon" alt="">
        </a>
    </li>
    <li class="btn-group nav-item">
      <a href="#" onclick="mode()" class="waves-effect waves-light nav-link btn-outline no-border full-screen" title="mode">
<i class="fa fa-adjust"></i>
 </a>
    </li>
  </ul>
  </div>
<?php if(isset($_SESSION['id'])){ ?>
  <div class="navbar-custom-menu r-side">
			<ul class="nav navbar-nav">

				<!-- User Account-->

        <li class="btn-group nav-item">
          <a href="<?php echo $dircheckPathad; ?>home" class="waves-effect waves-light nav-link btn-outline no-border full-screen" title="Home">
            <img src="<?php echo $dircheckPath; ?>images/svg-icon/flat-color-icons/SVG/home.svg" class="img-fluid svg-icon" alt="">
            </a>
        </li>

        <li class="btn-group nav-item">
          <a href="<?php echo $dircheckPathad; ?>add_class" class="waves-effect waves-light nav-link btn-outline no-border full-screen" title="Add class">
            <img src="<?php echo $dircheckPath; ?>images/svg-icon/pencil.svg" class="img-fluid svg-icon" alt="">
            </a>
        </li>

        <li class="btn-group nav-item">
          <a href="<?php echo $dircheckPathad; ?>add_user" class="waves-effect waves-light nav-link btn-outline no-border full-screen" title="Add user">
            <img src="<?php echo $dircheckPath; ?>images/svg-icon/user.svg" class="img-fluid svg-icon" alt="">
            </a>
        </li>

        <li class="btn-group nav-item">
          <a href="<?php echo $dircheckPathad; ?>logout.php" onclick="return confirm('Are you sure to logout?')" accesskey="l"  class="waves-effect waves-light nav-link btn-outline no-border full-screen" title="Logout">
            <img src="<?php echo $dircheckPath; ?>images/svg-icon/sidebar-menu/logout.svg" class="img-fluid svg-icon" alt="">
            </a>
        </li>

			</ul>
		</div>
<?php } ?>
  </nav>
</header>


<aside class="main-sidebar">
   <!-- sidebar-->
   <section class="sidebar position-relative">
    <div class="multinav">
    <div class="multinav-scroll" style="height: 100%;">
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
<li class="header">الفصل</li>

        <?php  $query = mysqli_query($conn,"select class_name, class_id from class") or die(mysqli_error());
          while ($row = mysqli_fetch_array($query)) {
            $class_name = $row['class_name'];
              $class_id = $row['class_id'];?>
                    <li><a href="<?php echo $dircheckPath; ?>subject?pid=<?php echo $class_id; ?>"><img src="<?php echo $dircheckPath; ?>images/svg-icon/sidebar-menu/dashboard.svg" class="svg-icon" alt=""><?php echo $class_name; ?></a></li>

<?php }?>


</ul>
    </div>
  </div>
   </section>
 </aside>
